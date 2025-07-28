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
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 */
class ViewCartsController extends AppController {

    private $_cart_id, $_total_price, $_order_id;
   
    public function initialize(): void {
        parent::initialize();

        $this->_cart_id = NULL;
        $this->_total_price = NULL;
        $this->_order_id = NULL;

        $this->Auth->allow(['index', 'addtocart']);
        $this->Auth->deny(['checkout', 'buynow','getDataCart']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        
        $this->_display_cart=FALSE;

        $updatedetails = [];
        $prefix = "";
        if ($this->Auth->user('id')) {

            $updatedetails = true;

            $prefix = "Temp";
            $data = $this->request->getSession()->read('Product');

            if ($this->request->getSession()->read('Product')) {
                foreach ($data as $d) {
                    $this->addcart($d->slug, $d->quentity);
                }
            }
            $this->request->getSession()->write('Product', []);
        }

        $this->set('updatedetails', $updatedetails);
        $this->set('prefix', $prefix);

        //$this->set(compact('userdetails'));
    }
    
            public function getCart() {
            
            
            
        if ($this->Auth->user('id')) {
            
            

            $Carts = TableRegistry::getTableLocator()->get('Carts');

          

            $CartItems = TableRegistry::getTableLocator()->get('CartItems');

            $cart = $Carts->find('all')->contain(['CartItems','CartItems.Examinations','CartItems.Products'])->where(['Carts.user_id' => $this->Auth->user('id')]);
                       



            if ($cart->count() > 0) {

                
                
                //echo json_encode(['success' => 1, 'data' => $cart], ENT_QUOTES);
				
				 //$json= json_encode(['success' => 1, 'data' => $cart]);
                
                $this->set([
                    'success' => true,
                    'data' => ['cart_details'=>$cart
                    
                    ],
                    
                    'message'=>"cart Details",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
				
            } else {
                 $this->set([
                    'success' => false,
                    'data' => [],
                    
                    'message'=>"No Records Found",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
            }
        } else {

            
                $this->set([
                    'success' => false,
                    'data' => [],
                    
                    'message'=>"Please Login",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
            
        }

        
    }
    
        public function getDataCart() {
            
            
            
        if ($this->Auth->user('id')) {
            
            

            $Carts = TableRegistry::getTableLocator()->get('Carts');

          

            $CartItems = TableRegistry::getTableLocator()->get('CartItems');

            $cart = $Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])
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



            if ($cart->count() > 0) {

                
                
                //echo json_encode(['success' => 1, 'data' => $cart], ENT_QUOTES);
				
				 //$json= json_encode(['success' => 1, 'data' => $cart]);
                
                $this->set([
                    'success' => true,
                    'data' => ['cart_details'=>$cart
                    
                    ],
                    
                    'message'=>"cart Details",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
				
            } else {
                 $this->set([
                    'success' => false,
                    'data' => [],
                    
                    'message'=>"No Records Found",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
            }
        } else {

            
                $this->set([
                    'success' => false,
                    'data' => [],
                    
                    'message'=>"Please Login",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
            
        }

        
    }
    
     public function addDelivaryAddress(){
		$this->_jsonVars = $this->request->input('json_decode');
		
		$delivaryAddObj = TableRegistry::getTableLocator()->get('UserDeliveryDetails');

		if($this->_jsonVars->id>0){
			$delivary=$delivaryAddObj->get($this->_jsonVars->id);
			
			}else{
				$delivary = $delivaryAddObj->newEmptyEntity();
				
				}
				$delivary =$delivaryAddObj-> patchEntity($delivary, $this->request->getData());
				$delivary->user_id=$this->Auth->user('id');
				$delivary->name=$this->_jsonVars->name;
				$delivary->email=$this->_jsonVars->email;
				$delivary->mobile=$this->_jsonVars->mobile;
				$delivary->gst=$this->_jsonVars->gst;
			
				$delivary->state=$this->_jsonVars->state;
				$delivary->city=$this->_jsonVars->city;
				$delivary->pin=$this->_jsonVars->pin;
				$delivary->address=$this->_jsonVars->address;
				
				$delivaryAddObj->save($delivary);
			$this->set([
                    'success' => true,
                    'data' => ['address'=>$delivary],
                    
                    'message'=>"Data is Submitted.",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
				 
		}
		
		public function getDelivaryAdd(){
			$delivaryAddObj = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
			$delivary=$delivaryAddObj->find()->where(['user_id'=>$this->Auth->user('id')]);
				
				
				$this->set([
                    'success' => true,
                    'data' => ['address'=>$delivary],
                    
                    'message'=>"Address List",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
			
			}
			
		public function setDelivaryadd(){
						$this->_jsonVars = $this->request->input('json_decode'); 
						$tbl_cart_obj = TableRegistry::getTableLocator()->get('Carts');
						
						$instance=$tbl_cart_obj->get($this->_jsonVars->info_id);
						$instance->user_delivery_detail_id=$this->_jsonVars->delivery_id;
						$tbl_cart_obj->save($instance);

						
					
            $this->set([
                    'success' => true,
                    'data' => [],
                    
                    'message'=>"Selected Delivery Address",
                    'code'=>200,
                  
                    '_serialize' => ['success', 'data','message','code']
                ]);
								
						
						}

    public function checkout() {
        
        $this->_display_cart=FALSE;
        
    }

    public function wishlistdelete($id = null)
    {
		$Wishlists = TableRegistry::getTableLocator()->get('Wishlists');
        //$this->request->allowMethod(['post', 'delete']);
        $wish = $Wishlists->get($id);
        if ($Wishlists->delete($wish)) {
            //$this->Flash->success(__('This Product is removed from Wishlist'));
        } else {
            //$this->Flash->error(__('This Product is Not removed from Wishlist, try again.'));
        }

        return $this->redirect(['controller' => 'ViewCarts', 'action' => 'wishlist1']);
    }

 

}
