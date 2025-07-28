<?php
declare(strict_types = 1);

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PaymentsController extends AppController {

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    private $_cart_id;
    private $_total_price;
    private $_jsonVars;

    public function initialize() : void
    {
        parent::initialize();
        //$this->Auth->deny("paymentsuccess");
        //$this->Auth->allow(['paymentsuccess']);
    }

    public function razorpay() {

        $this->_jsonVars = $this->request->input('json_decode');
        $sub_id = $this->request->getData('slug');
        
        //var_dump($this->request->data["id"]);
        $this->_getCartInfo($sub_id);

        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $returnUrl = \Cake\Routing\Router::url(['controller' => "Payments", 'action' => 'razorpayOrderSuccess'], TRUE);
       
        $data = $this->Razorpay->send_payment($this->_cart_id, $this->_total_price, $returnUrl);
       
        echo json_encode($data);
        $this->autoRender = FALSE;
    }

    private function _getCartInfo($slug) {

        if ($this->Auth->user('id')) {
            $cartObj = TableRegistry::getTableLocator()->get('Carts');
            $cart = $cartObj->get($slug);
            $this->_cart_id = $cart->id;
            $this->_total_price = $cart->net_amount+$cart->tax_amount;
            $this->_order_id = $cart->order_no;
        }
    }
  
    public function razorpayOrderSuccess() {

//        \Cake\Log\Log::write('info', "razor");
//        \Cake\Log\Log::write('info', $_POST);
        // die;
        $generated_signature = hash_hmac('sha256', $_POST["razorpay_order_id"] . "|" . $_POST["razorpay_payment_id"], RAZORPAY_KEY_SECRET);

        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $data = $this->Razorpay->verifyPayment($_POST["razorpay_order_id"]);

        if ($generated_signature == $_POST["razorpay_signature"] && $data->items[0]->id == $_POST["razorpay_payment_id"]) {
            //$this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);
            $cartTbl = TableRegistry::getTableLocator()->get('Carts');

            $cart = $cartTbl->find()->where(["order_no" => $_POST["razorpay_order_id"]])->first();
           
            $this->paymentsuccess($cart->id, 3, $_POST["razorpay_payment_id"]);
        }

        $this->autoRender = FALSE;
    }
 public function donationRazorpayOrderSuccess() {

        \Cake\Log\Log::write('info', "razor");
        \Cake\Log\Log::write('info', $_POST);
        // die;
        $generated_signature = hash_hmac('sha256', $_POST["razorpay_order_id"] . "|" . $_POST["razorpay_payment_id"], RAZORPAY_KEY_SECRET);

        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $data = $this->Razorpay->verifyPayment($_POST["razorpay_order_id"]);

        if ($generated_signature == $_POST["razorpay_signature"] && $data->items[0]->id == $_POST["razorpay_payment_id"]) {
            //$this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);
            $cartTbl = TableRegistry::getTableLocator()->get('Carts');

            $cart = $cartTbl->find()->where(["order_no" => $_POST["razorpay_order_id"]])->first();
            $this->paymentsuccess($cart->id, 3, $_POST["razorpay_payment_id"]);
        }

        $this->autoRender = FALSE;
    }
    public function paymentsuccess() {
        
         $this->_jsonVars = $this->request->input('json_decode');
         $cartId=$this->_jsonVars->cartId;
         $txn_id=$this->_jsonVars->txn_id;
         

         
         //echo $user_id=$this->Auth->user("id");die;
        
        $orderData = [];
        if ($cartId > 0) {
            $Carts = TableRegistry::getTableLocator()->get('Carts');
            $Invoices = TableRegistry::getTableLocator()->get('Invoices');
            $user = TableRegistry::getTableLocator()->get('Users');
            $InvoiceItems = TableRegistry::getTableLocator()->get('InvoiceItems');



            $cart = $Carts->find('all')->where(['Carts.id' => $cartId])
                            ->join([
                                'CartItems' => [
                                    'table' => 'cart_items',
                                    'type' => 'INNER',
                                    'conditions' => ['CartItems.cart_id = Carts.id', 'CartItems.is_deleted=0']
                                ],
                                'Examinations' => [
                                    'table' => 'examinations',
                                    'type' => 'LEFT',
                                    'conditions' => ['Examinations.id = CartItems.examination_id']
                                ],
                                'Products' => [
                                    'table' => 'products',
                                    'type' => 'LEFT',
                                    'conditions' => ['Products.id = CartItems.product_id']
                                ]
                            ])->select(['Carts.id',  'Carts.user_id', 'Carts.user_delivery_detail_id', 'Carts.order_no',  'Carts.gross_amount', "Carts.invoice_no", 'Carts.discount_amount', 'Carts.tax_amount', 'Carts.net_amount',  'Carts.create_date', 'CartItems.id', 'CartItems.cart_id', 'CartItems.examination_id', 'CartItems.gross_amount','CartItems.tax_amount',  'CartItems.discount', 'CartItems.net_amount',  'CartItems.product_id',  'Examinations.id', 'Examinations.name','Products.id', 'Products.name', 'Products.valid_days']);
        }

        if ($cart->count() > 0) {


          
            $all_invoice_items = [];
            $i = 0;
            $gross = 0;

            $author_ids = [];
            foreach ($cart as $carts):
                if ($i == 0) {
                    $invoice = $Invoices->newEmptyEntity();
                    $invoice->user_id = $carts->user_id;
                    $invoice->gross_amount = $carts->gross_amount;
                    $invoice->user_delivery_detail_id = $carts->user_delivery_detail_id;
                    //$invoice->name = $carts->name;
                    //$invoice->email = $carts->email;
                    $invoice->discount_amount = $carts->discount_amount;
                    $invoice->tax_amount = $carts->tax_amount;
                    $invoice->net_amount = $carts->net_amount;
                    $invoice->create_date = date("Y-m-d H:i:s");
                    $invoice->txn_id = $txn_id;
                    //$invoice->purchase_type = $carts->purchase_type;
                    $invoice->invoice_no = $carts->invoice_no;
                    $invoice->create_date = date('Y-m-d H:i:s');
                    $invoice->order_no = $carts->invoice_no;
                    //$invoice->is_subscription = $carts->is_subscription;;
                    $invoice->is_active = 1;


                   if ($Invoices->save($invoice)) {
                        $invoiceId = $invoice->id;
                        $deliverydetails = $Invoices->UserDeliveryDetails->get($invoice->user_delivery_detail_id);
                    } else {
                        break;
                    }
                }
                $invoiceitem = $InvoiceItems->newEmptyEntity();

                if (!empty($carts->CartItems)) {
                   
                    $invoiceitem->invoice_id = $invoiceId;
                    $invoiceitem->examination_id = $carts->CartItems['examination_id'];
                    $invoiceitem->product_id = $carts->CartItems['product_id'];
                    $invoiceitem->gross_amount = $carts->CartItems['gross_amount'];
                    $invoiceitem->tax_amount = $carts->CartItems['tax_amount'];
                    $invoiceitem->discount_amount = $carts->CartItems['discount'];
                    $invoiceitem->item_net_amount = $carts->CartItems['net_amount'];




                    if ($InvoiceItems->save($invoiceitem)) {
                        $parentId = $invoiceitem->id;

                        $all_invoice_items[$i] = $invoiceitem;
                    } else {
                        break;
                    }
                }




                $i++;

                //for products

            endforeach;
            $this->addTest();

            $Carts->deleteAll(['Carts.id' => $carts->id], true);






        $name=$this->Auth->user('name');
		$email=$this->Auth->user('email');
        $this->loadComponent('SendMail');
        $this->SendMail->sendMail(10, $email, ['name' => $name]);








            //return $this->redirect(['controller' => 'Home', 'action' => 'thankyou']);
        } else {
            
        }
      
    }
 public function addTest(){
		   
		  $tblcartObj = TableRegistry::getTableLocator()->get('Carts');
		  $user_id=$this->Auth->user("id");
		  $cart_details=$tblcartObj->find('all')->contain(['CartItems'])->where(['Carts.user_id'=>$user_id ])->first();
		  
		
		
          $tblUserProductsObj = TableRegistry::getTableLocator()->get('UserProducts');
	      
			foreach($cart_details->cart_items as $c)
			{
				$tblProductsObj = TableRegistry::getTableLocator()->get('Products');
				
				$package=$tblProductsObj->find('all')->where(['id'=>$c->product_id ])->first();
				
				 
				 $NewDate=Date('Y-m-d', strtotime("+".$package->valid_days." days"));
			
				$ex=$tblUserProductsObj->newEmptyEntity();
                $ex->product_id = $c->product_id;
                $ex->user_id = $user_id;
				$ex->exam_id = $c->examination_id;
                $ex->create_date = date("Y-m-d H:i:s");
				$ex->start_date = date("Y-m-d");
				$ex->end_date = $NewDate;
                $tblUserProductsObj->save($ex);
                $this->AddTestInUpserProfile($ex->id,$c->examination_id,$c->product_id);
			}
			
			$tblcartObj->deleteAll(['user_id' => $user_id]);
			$tblcartObj->CartItems->deleteAll(['cart_id' => $cart_details->id]);
		//return $this->redirect(['controller' => 'Home','action' => 'myorders','prefix' => false]);
		
		$this->set([
                        'success' => true,
                        'data' => [],
                        'message'=>"Your order is successfully placed",
                        'code'=>"200",
                      
                        '_serialize' => ['success', 'data','message','code']
                    ]);
		}
                private function AddTestInUpserProfile($id,$test_id,$packageId){
                     $tblProductsObj = TableRegistry::getTableLocator()->get('Products');
                      $tblTestObj = TableRegistry::getTableLocator()->get('UserProductDetails');
                      $tblMockTestObj = TableRegistry::getTableLocator()->get('MockTests');
                      $getProduct = $tblProductsObj->get($packageId);
                      $test = $tblMockTestObj->find()->orderAsc("id")->where(['is_demo'=>0])->limit($getProduct->no_mock_test);
                      $user_id=$this->Auth->user('id');
                      foreach($test as $mg){
                           $ex=$tblTestObj->newEmptyEntity();
                           $ex->user_product_id=$id;
                           $ex->examination_id = $test_id;
                            $ex->user_id = $user_id;
                             $ex->mock_test_id = $mg->id;
                            $ex->create_date = date("Y-m-d H:i:s");
                            $tblTestObj->save($ex);
                      }
                     
                }
		
}
