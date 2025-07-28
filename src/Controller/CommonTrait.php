<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;

/**
 * Description of CommonTrait
 * Common functions trait
 * @author Biswajit
 */
Trait CommonTrait {

    //put your code here
    protected function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $Users = \Cake\ORM\TableRegistry::getTableLocator()->get('Users');
        $Users = $Users->find('all')->where(['email_verification_code' => $key]);
        if ($Users->count() > 0) {
            $this->random_string($length);
            return true;
        }

        return $key;
    }

    protected function getRecordId($data, $condition, $model) {
        $obj = \Cake\ORM\TableRegistry::getTableLocator()->get($model);
        $objData = $obj->find('all')->where($condition);
        $id = 0;

        if ($objData->count() > 0) {
            $dataReturn = $objData->first();
            $id = $dataReturn->id;
        } else {
            $inserData = $obj->newEntity();
            $inserData = $obj->patchEntity($inserData, $data);
            $obj->save($inserData);

            $id = $inserData->id;
        }
        return $id;
    }

    protected function addPayment($data) {

        $obj = \Cake\ORM\TableRegistry::getTableLocator()->get('Invoices');
        $invoice = $obj->newEntity();


        $invoice = $obj->patchEntity($invoice, $data);
        $invoice->paid_date = $data['paid_date'];
        $obj->save($invoice);
    }

    protected function updateTotalFees($data) {
        $obj = \Cake\ORM\TableRegistry::getTableLocator()->get('StudentRegistrations');
        $update = $obj->get($data->id);
        $update->total_tuition_fees = $update->total_tuition_fees + $data->fees;
        $obj->save($update);
    }

    protected function deleteTotalFees($data) {
        $obj = \Cake\ORM\TableRegistry::getTableLocator()->get('StudentRegistrations');
        $update = $obj->get($data->id);
        $update->total_tuition_fees = $update->total_tuition_fees - $data->fees;
        $obj->save($update);
    }

    /*     * ****************************************** */

    public function test() {
        $Products = \Cake\ORM\TableRegistry::getTableLocator()->get('Carts');
        $data = $Products->find()->where(["id = 105"]);
        //print_r($data->toArray());
        die;
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
				
				 $json= json_encode(['success' => 1, 'data' => $cart]);
                
                $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
				
            } else {
                 $json= json_encode(['success' => 2, 'data' => []]);
                
                $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
            }
        } else {

            
                $json= json_encode(['success' => 2, 'data' => []]);
                
                $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
            
        }

        $this->autoRender = FALSE;
    }

    public function addtocart($friendlyUrl = null, $quentity1 = 1) {
        $this->_display_cart = FALSE;
        $this->autoRender = false;
        $CartItems = TableRegistry::getTableLocator()->get('CartItems');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $this->Carts = TableRegistry::getTableLocator()->get('Carts');
        $product = $Products->findBySlug($friendlyUrl)->contain(['Items', 'UserProducts'])->first();

        $product->quentity = $product->minimum_order;
        $quentity = $product->minimum_order;
        //$this->request->getSession()->read('SesionDataId')
        
        if ($this->Auth->user('id')) {
            $query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
            if ($this->request->getSession()->read('Product')) {
                $data = $this->request->getSession()->read('Product');
                foreach ($data as $d) {
                    $this->addcart($d->slug, $d->quentity);
                }
                $this->request->getSession()->write('Product', []);
            }
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $this->Carts->newEmptyEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();

                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $this->Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($product->item->offer_price) ? $product->item->offer_price : 0);
                $this->Carts->save($cart);
                $cartitem = $CartItems->newEmptyEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
                $cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
                $cartitem->item_gross_amount = $cartitem->item_gross_amount * $quentity;
                $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = $product->user_products[0]->offer_price ;
                $cartitem->item_net_amount = $cartitem->item_net_amount * $quentity;
                $cartitem->delivery_charge = !empty($product->user_products[0]->delivery_charge) ? $product->user_products[0]->delivery_charge : 0;
                $CartItems->save($cartitem);

                /* send to leadsqured */


                $this->Flash->success(__('The cart has been saved.'));
                //return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Already in your cart'));
                //return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
            }
        } else {



            if (!$this->request->getSession()->read('Product')) {

                $data = [];
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            } else {
                $this->request->getSession()->write('Product', []);
                $data = $this->request->getSession()->read('Product');
                $data[] = $product;

                $this->request->getSession()->write('Product', $data);
            }
            $this->addtempcart($friendlyUrl, 1);

            $this->Flash->error(__('Your Product has been added to cart'));
            // return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
        }
    }

    private function addcart($friendlyUrl = null, $quentity = 1) {


        //$price_tag=$this->Cookie->read('pricetag');
        $this->Carts = TableRegistry::getTableLocator()->get('Carts');
        $Currency = TableRegistry::getTableLocator()->get('CurrencyRates');
        $CartItems = $this->Carts->CartItems;
        $Products = $this->Carts->CartItems->Products;
        $product = $Products->findBySlug($friendlyUrl)->contain(['Items', 'UserProducts'])->first();
        if ($this->Auth->user('id')) {
            $query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
            if (!$this->request->getSession()->read('Product')) {
                $data = [];
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            } else {
                $data = $this->request->getSession()->read('Product');
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            }
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $this->Carts->newEmptyEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();

                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $this->Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($actual) ? $actual : 0);
                $this->Carts->save($cart);
                $cartitem = $CartItems->newEmptyEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
                $cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
                $cartitem->item_gross_amount = $cartitem->item_gross_amount * $quentity;
                $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
                $cartitem->item_net_amount = $cartitem->item_net_amount * $quentity;
                $cartitem->delivery_charge = $product->user_products[0]->delivery_charge * $quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */


                // $this->Flash->success(__('The cart has been saved.'));
                // return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                //$this->Flash->error(__('Already in your cart'));
                //  return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        }
    }

    private function __checkpin($id, $dvid) {
        $this->autoRender = false;
        $tbl_cart_obj = TableRegistry::getTableLocator()->get('CartItems');
        $tbl_delevery_obj = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $instance = $tbl_delevery_obj->get($dvid);

        if (strlen($instance->home_address) < 2 || empty($instance->state) || empty($instance->city) || empty($instance->pin) || strlen($instance->pin) != 6) {
            $status = false;
        } else {
            $status = true;
        }
        return $status;
    }

    public function checkcouponcode() {
        $input = $this->request->input('json_decode');
        $coupon_code = $input->coupon_code;
        $user_id = $this->Auth->user('id');
        $this->loadComponent('Coupon');
        $json= json_encode($this->Coupon->checkCouponCode($coupon_code, $user_id), ENT_QUOTES);
        $this->response = $this->response
        ->withType('application/json')
        ->withStringBody($json);

        return $this->response;
        $this->autoRender = FALSE;
    }

    public function deletecouponcode() {
        if ($this->Auth->user('id') > 0) {
            $input = $this->request->input('json_decode');
            $coupon_id = $input->coupon_id;
            $Carts = TableRegistry::getTableLocator()->get('Carts');
            $CartItems = TableRegistry::getTableLocator()->get('CartItems');
            $cart = $Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])->first();
            if ($cart->coupon_id == $coupon_id) {
                $cartitem = $CartItems->find('all')->where(['cart_id' => $cart->id, "parent_id IS NULL"]);
                if ($cartitem->count() > 0) {
                    foreach ($cartitem as $cartitems) {
                        $cartitems->coupon_id = 0;
                        $cartitems->discount_amt = 0;
                        $cartitems->item_net_amount = $cartitems->item_gross_amount;
                        $CartItems->save($cartitems);
                    }
                }
                $cart->coupon_id = 0;
                $Carts->save($cart);
                $success = 1;
                $msg = 'remove coupon from  cart';
            } else {
                $success = 0;
                $msg = 'invalid request';
            }
        } else {
            $success = 0;
            $msg = 'Please login';
        }

        echo json_encode(['success' => $success, 'msg' => $msg], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    public function ccavenuePayment() {
        $this->loadComponent('Ccavenue', ['sandbox' => CCAVENUE_SANDBOX]);
        $this->_getCartInfo(1);
        $this->Ccavenue->send_payment($this->_order_id, $this->_total_price);
        $this->autoRender = FALSE;
    }

    private function resetAuth($cart_id) {
        \Cake\Log\Log::write("info", "cart");
        \Cake\Log\Log::write("info", $cart_id);
        $Users = TableRegistry::getTableLocator()->get('Users');
        $Carts = TableRegistry::getTableLocator()->get('Carts');
        $cart = $Carts->get($cart_id);
        $user = $Users->get($cart->user_id);
        \Cake\Log\Log::write("info", $user);
        $this->Auth->setUser($user->toArray());
        \Cake\Log\Log::write("info", $this->Auth->user("id"));
    }

    private function _getCartInfo($payment_mode) {
        if ($this->Auth->user('id')) {
            $Carts = TableRegistry::getTableLocator()->get('Carts');
            $cart = $Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])->contain(['CartItems'])->toArray();
        }


        if (!empty($cart)) {

            $Carts = TableRegistry::getTableLocator()->get('Carts');
            $this->_total_price = $this->calculateTotal($cart);
            $this->_cart_id = $cart[0]['id'];

            $cartdata = $Carts->get($cart[0]['id']);
            $cartdata->order_id = (empty($cartdata->order_id) || $cartdata->order_id == null) ? time() . '-' . $cart[0]['id'] : $cart[0]['order_id'];
            $cartdata->payment_mode = $payment_mode;
            $cartdata->payment_status = 1;
            $cartdata->payment_request_date = date('Y-m-d');
            $Carts->save($cartdata);
            $this->_order_id = $cartdata->order_id;
        } else {
            return true;
        }
    }

    public function freePayment() {

        $this->_getCartInfo(2);
        // echo  $this->_total_price;
        //echo  $this->_total_price;
        $this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);


        $this->autoRender = FALSE;
    }

    private function paymentsuccess($cartId = 0, $paymentmethod = '', $txn_id = '123456') {
        $orderData = [];
        if ($cartId > 0) {
            $Carts = TableRegistry::getTableLocator()->get('Carts');
            $Invoices = TableRegistry::getTableLocator()->get('Invoices');
            $InvoiceItems = TableRegistry::getTableLocator()->get('InvoiceItems');

            $CartItems = TableRegistry::getTableLocator()->get('CartItems');
            $user = TableRegistry::getTableLocator()->get('Users');



            $cart = $Carts->find('all')->where(['Carts.id' => $cartId])
                            ->join([
                                'CartItems' => [
                                    'table' => 'cart_items',
                                    'type' => 'INNER',
                                    'conditions' => ['CartItems.cart_id = Carts.id', 'CartItems.is_deleted=0', 'CartItems.parent_id IS NULL']
                                ],
                                'Items' => [
                                    'table' => 'items',
                                    'type' => 'LEFT',
                                    'conditions' => ['Items.id = CartItems.item_id', 'Items.is_deleted=0']
                                ],
                                'Products' => [
                                    'table' => 'products',
                                    'type' => 'LEFT',
                                    'conditions' => ['Products.id = CartItems.product_id', 'Products.is_deleted=0']
                                ]
                            ])->select(['Carts.id', 'Carts.payment_mode', 'Carts.cod_amt', 'Carts.user_id', 'Carts.user_delivery_detail_id', 'Carts.order_id', 'Carts.ipaddress', 'Carts.gross_amt', 'Carts.coupon_id', 'Carts.discount_amt', 'Carts.tax_amt', 'Carts.net_amt', 'Carts.total_delivery_charge', 'Carts.create_date', 'CartItems.id', 'CartItems.cart_id', 'CartItems.parent_id', 'CartItems.item_id', 'CartItems.item_gross_amount', 'CartItems.coupon_id', 'CartItems.discount_amt', 'CartItems.quantity', 'CartItems.item_net_amount', 'CartItems.delivery_charge', 'CartItems.product_id', 'CartItems.vendor_id', 'Items.id', 'Items.type', 'Items.name', 'Products.name', 'Products.photo']);
        }

        if ($cart->count() > 0) {


            //pr($cart);

            $all_invoice_items = [];
            $i = 0;
            $gross = 0;

            $author_ids = [];
            foreach ($cart as $carts):
                if ($i == 0) {
                    $invoice = $Invoices->newEmptyEntity();
                    $invoice->user_id = $carts->user_id;
                    $invoice->user_delivery_detail_id = $carts->user_delivery_detail_id;
                    $invoice->ipaddress = $carts->ipaddress;
                    $invoice->cod_amt = $carts->cod_amt;
                    $invoice->gross_amt = $carts->gross_amt;
                    $invoice->coupon_id = $carts->coupon_id;
                    $invoice->discount_amt = $carts->discount_amt;
                    $invoice->tax_amt = $carts->tax_amt;
                    $invoice->net_amt = $carts->net_amt;
                    $invoice->total_delivery_charge = $carts->total_delivery_charge;
                    $invoice->create_date = $carts->create_date;
                    $invoice->pay_txn_id = $txn_id;
                    $invoice->pay_mode = $paymentmethod;
                    $invoice->order_id = $carts->order_id;
                    //$invoice->price_tag = $this->Cookie->read('pricetag');
                    $invoice->creation_date = date('Y-m-d');

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
                    $invoiceitem->item_id = $carts->Items['id'];
                    $invoiceitem->product_id = $carts->CartItems['product_id'];
                    $invoiceitem->vendor_id = $carts->CartItems['vendor_id'];
                    $invoiceitem->type = $carts->Items['type'];
                    $invoiceitem->item_gross_amount = $carts->CartItems['item_gross_amount'];
                    $invoiceitem->quantity = $carts->CartItems['quantity'];
                    $invoiceitem->delivery_charge = $carts->CartItems['delivery_charge'];

                    $invoiceitem->coupon_id = $carts->CartItems['coupon_id'];
                    $invoiceitem->discount_amount = $carts->CartItems['discount_amt'];
                    $invoiceitem->item_net_amount = $carts->CartItems['item_net_amount'];




                    if ($InvoiceItems->save($invoiceitem)) {
                        $parentId = $invoiceitem->id;

                        $all_invoice_items[$i] = $invoiceitem;
                    } else {
                        break;
                    }
                }



                $i++;

                //for products
                $Products = TableRegistry::getTableLocator()->get('Products');
                $Products1 = $Products->get($carts->CartItems['product_id']);
                $product_qtn = $Products->patchEntity($Products1, $this->request->getData());
                $product_qtn->total_quantity = $Products1->total_quantity - $carts->CartItems['quantity'];

                $product_qtn->total_quantity_sale = $Products1->total_quantity_sale + $carts->CartItems['quantity'];
                $Products->save($product_qtn);

                //for user products


                $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                        ->set(['total_quantity' => $product_qtn->total_quantity, 'total_quantity_sale' => $product_qtn->total_quantity_sale])
                        ->where(['product_id' => $Products1->id])
                        ->execute();
            endforeach;

            $CartItems->deleteAll(['CartItems.cart_id' => $carts->id]);
            $Carts->deleteAll(['Carts.id' => $carts->id], true);





            // send mail to vendor
            $userdata = $user->find('all')->where(['id' => $carts->CartItems['vendor_id']])->first();
            $em1 = $userdata->email;
            $name2 = $this->Auth->user('first_name');
            $this->loadComponent('SendMail');
            //$this->SendMail->sendMail(16, $em1, ['name' =>$name2,'email' =>$em1 ]);
            //send mail to admin
            $email = "info@febino.com";
            $name = $this->Auth->user('first_name');

            //$this->SendMail->sendMail(16, $email, ['name' =>$name,'email' =>$email ]);
            //send mail to customer

            $name1 = $this->Auth->user('first_name');
            $em = $this->Auth->user('email');
            //$this->SendMail->sendMail(15, $em, ['name' =>$name1,'email' =>$em ]);
            // send otp

            $msg = "Thanks for your Purchase at Febino Shopping Portal with Purchase Order Number $carts->order_id. Confirmed by Team-Febino.";
            $this->SendMail->sendOTP($msg, $this->Auth->user('mobile'));





            return $this->redirect(['controller' => 'Home', 'action' => 'myorders']);
        } else {
            
        }
        $this->autoRender = FALSE;
    }

    public function ccavenueReturnurl() {
        $paramList = $_POST;
        $encResponse = $paramList["encResp"];
        $this->loadComponent('Ccavenue', ['sandbox' => CCAVENUE_SANDBOX]);

        $rcvdString = $this->Ccavenue->decrypt($encResponse);
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);

        for ($i = 0; $i < $dataSize; $i++) {

            $information = explode('=', $decryptValues[$i]);

            if ($i == 0)
                $order_id = $information[1];

            if ($i == 1)
                $tracking_id = $information[1];

            if ($i == 2)
                $bank_ref_no = $information[1];

            if ($i == 3)
                $order_status = $information[1];

            if ($i == 4)
                $failure_message = $information[1];

            if ($i == 5)
                $payment_mode = $information[1];

            if ($i == 6)
                $card_name = $information[1];

            if ($i == 7)
                $status_code = $information[1];

            if ($i == 8)
                $status_message = $information[1];

            if ($i == 9)
                $currency = $information[1];

            if ($i == 10)
                $amount = $information[1];

            if ($i == 11)
                $billing_name = $information[1];

            if ($i == 12)
                $billing_address = $information[1];

            if ($i == 13)
                $billing_city = $information[1];

            if ($i == 14)
                $billing_state = $information[1];

            if ($i == 15)
                $billing_zip = $information[1];

            if ($i == 16)
                $billing_country = $information[1];

            if ($i == 17)
                $billing_tel = $information[1];

            if ($i == 18)
                $billing_email = $information[1];

            if ($i == 19)
                $delivery_name = $information[1];

            if ($i == 20)
                $delivery_address = $information[1];

            if ($i == 21)
                $delivery_city = $information[1];

            if ($i == 22)
                $delivery_state = $information[1];

            if ($i == 23)
                $delivery_zip = $information[1];

            if ($i == 24)
                $delivery_country = $information[1];

            if ($i == 25)
                $delivery_tel = $information[1];

            if ($i == 26)
                $merchant_param1 = $information[1];

            if ($i == 27)
                $merchant_param2 = $information[1];

            if ($i == 28)
                $merchant_param3 = $information[1];

            if ($i == 29)
                $merchant_param4 = $information[1];

            if ($i == 30)
                $merchant_param5 = $information[1];

            if ($i == 31)
                $vault = $information[1];

            if ($i == 31)
                $offer_type = $information[1];

            if ($i == 33)
                $offer_code = $information[1];

            if ($i == 34)
                $discount_value = $information[1];

            if ($i == 35)
                $mer_amount = $information[1];
        }

        $orderId = explode('-', $order_id);
        $this->resetAuth($orderId[1]);

        if ($order_status === 'Success') {
            $this->Flash->success('Payment successfully completed.');


            $orderId = explode('-', $order_id);
            $this->paymentsuccess($orderId[1], 1, $tracking_id);

            return $this->redirect(['controller' => 'Home', 'action' => 'myaccount']);
        } else {
            //$ord_id = explode('-', $order_id);
            //$this->_paymentFail($order_status . ' ' . $failure_message, $ord_id[1], 'CCAvenue');

            $this->Flash->error('Payment failed.Please contact our support for further assistance' . $failure_message);
        }
        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }

    public function buynow($friendlyUrl = null, $quentity1 = 1) {





        $CartItems = TableRegistry::getTableLocator()->get('CartItems');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $carTable = TableRegistry::getTableLocator()->get('Carts');

        $product = $Products->findBySlug($friendlyUrl)->contain(['Items', 'UserProducts'])->first();

        $product->quentity = $product->minimum_order;
        $quentity = $product->minimum_order;

        $offer = $product->user_products[0]->offer_price;
       
        $actual = $product->user_products[0]->actual_price;
        
        
            $delivery = $product->user_products[0]->delivery_charge;
        

        //endpricetag

        if ($this->Auth->user('id')) {
            $query = $carTable->find('all')->where(['user_id' => $this->Auth->user('id')]);
            if ($this->request->getSession()->read('Product')) {
                $data = $this->request->getSession()->read('Product');
                foreach ($data as $d) {
                    $this->addcart($d->slug, $d->quentity);
                }
                $this->request->getSession()->write('Product', []);
            }
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $carTable->newEmptyEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();

                if ($carTable->save($cart)) {
                    $cart = $carTable->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $carTable->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($product->item->offer_price) ? $product->item->offer_price : 0);
                $carTable->save($cart);
                $cartitem = $CartItems->newEmptyEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
                $cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($offer) ? $offer : 0;
                $cartitem->item_gross_amount = $cartitem->item_gross_amount * $quentity;
                $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($offer) ? $offer : 0;
                $cartitem->delivery_charge = $delivery * $quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */


                $this->Flash->success(__('The cart has been saved.'));
                return $this->redirect(['controller' => 'ViewCarts', 'action' => 'checkout']);
            } else {
                $this->Flash->error(__('Already in your cart'));
                return $this->redirect(['controller' => 'ViewCarts', 'action' => 'checkout']);
            }
        } else {



            if (!$this->request->getSession()->read('Product')) {

                $data = [];
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            } else {
                $this->request->getSession()->write('Product', []);
                $data = $this->request->getSession()->read('Product');
                $data[] = $product;

                $this->request->getSession()->write('Product', $data);
            }
            $this->addtempcart($friendlyUrl, 1);

            $this->Flash->error(__('Your Product has been added to cart'));
            return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
        }
    }

    public function checkpin1() {
       
            $json= json_encode(['success' => 1]);
            $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
      

        
    }

    public function setDelivaryMode() {
        $this->_jsonVars = $this->request->input('json_decode');
        $tbl_cart_obj = TableRegistry::getTableLocator()->get('Carts');

        $instance = $tbl_cart_obj->get($this->_jsonVars->info_id);
        $instance->payment_mode = $this->_jsonVars->delivary_mode;
        if (intval($this->_jsonVars->delivary_mode) == 2) {
            $instance->cod_amt = 0;
        } else {
            $instance->cod_amt = 0;
        }

        $tbl_cart_obj->save($instance);
        echo json_encode(['success' => 1, 'msg' => 'Select delevery modecccc'], ENT_QUOTES);

        $this->autoRender = FALSE;
    }

    public function setDelivaryadd() {
        $this->_jsonVars = $this->request->input('json_decode');
        $tbl_cart_obj = TableRegistry::getTableLocator()->get('Carts');
      
            $instance = $tbl_cart_obj->get($this->_jsonVars->info_id);
            $instance->user_delivery_detail_id = $this->_jsonVars->delivery_id;
            $tbl_cart_obj->save($instance);
            echo json_encode(['success' => 1, 'msg' => 'Selected delivery address'], ENT_QUOTES);
       
        $this->autoRender = FALSE;
    }

    public function addDelivaryAddress() {
        $this->_jsonVars = $this->request->input('json_decode');
		 
        $delivaryAddObj = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $data = $this->_jsonVars->postData;
        if ($this->_jsonVars->id > 0) {
            $delivary = $delivaryAddObj->get($this->_jsonVars->id);
			
        } else {
            $delivary = $delivaryAddObj->newEmptyEntity();
		
        }
        $delivary = $delivaryAddObj->patchEntity($delivary, (array) $data);
        $delivary->user_id = $this->Auth->user('id');
        $delivaryAddObj->save($delivary);
        echo json_encode(['success' => 1, 'data' => $delivary, 'msg' => 'successfuly updated'], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    private function calculateTotal($data) {
        $cartTable = TableRegistry::getTableLocator()->get('Carts');
        $total = 0;
        //$totaldiscount=0;
        $totaltax = 0;
        $totaldiscount = 0;
        $total_gross_amount = 0;
        $totalwithtax = 0;
        $totaldelivery = 0;
        if (!empty($data)) {

            $cartdata = $data[0]['cart_items'];
            foreach ($cartdata as $datas) {
                $total_gross_amount = $total_gross_amount + $datas->item_gross_amount;
                $totaldiscount = $totaldiscount + $datas->discount_amt;
                $total = $total + $datas->item_net_amount;
                $totaldelivery = $totaldelivery + $datas->delivery_charge;
            }
            $Taxes = TableRegistry::getTableLocator()->get('Taxes');
            $tax = $Taxes->getTaxesForProducts();
            foreach ($tax as $taxs) {

                $totaltax = $totaltax + ($total * $taxs['tax_percentage']) / 100;
            }

            $totalwithtax = $total + $totaltax + $totaldelivery + $data[0]['cod_amt'];
            $cart = $cartTable->get($data[0]['id'], ['contain' => []]);

            $cart->gross_amt = $total_gross_amount;
            $cart->discount_amt = $totaldiscount;
            $cart->tax_amt = $totaltax;
            $cart->net_amt = $total;
            $cart->total_delivery_charge = $totaldelivery;
            $cartTable->save($cart);
            return $totalwithtax;
        }
    }

    public function deletecartItem() {

        $this->_jsonVars = $this->request->input('json_decode');
        $pre = "";
        if (!$this->Auth->user('id')) {
            $pre = "Temp";
        }
        $tbl_obj = TableRegistry::getTableLocator()->get($pre . 'CartItems');
        $tbl_cart_obj = TableRegistry::getTableLocator()->get($pre . 'Carts');

        $instance = $tbl_obj->get($this->_jsonVars->info_id);
        $cart_id = $instance->cart_id;
        $deleted = FALSE;
        $tbl_obj->delete($instance);
        $deleted = TRUE;

        $cartitem = $tbl_obj->find('all')->where(['cart_id' => $cart_id, "parent_id IS NULL"]);
        if ($cartitem->count() == 0) {
            $tbl_cart_obj->deleteAll(['id' => $cart_id], true);
        }
        echo json_encode(['success' => 1, 'msg' => 'Delete item from cart'], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    public function updateItem() {
        $this->_jsonVars = $this->request->input('json_decode');
        $pre = "";
        if (!$this->Auth->user('id')) {
            $pre = "Temp";
        }
        $tbl_obj = TableRegistry::getTableLocator()->get($pre . 'CartItems');
        $tbl_cart_obj = TableRegistry::getTableLocator()->get($pre . 'Carts');
        $productObj = TableRegistry::getTableLocator()->get('Products');

        $instance = $tbl_obj->get($this->_jsonVars->info_id);
        $instance->quantity = $this->_jsonVars->quantity;
        $product = $productObj->get($instance->product_id, ['contain' => ['UserProducts']]);

        $deli=!empty($product->user_products[0]->delivery_charge) ? $product->user_products[0]->delivery_charge : 0;

        $instance->item_gross_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
        $instance->item_gross_amount = $instance->item_gross_amount * $instance->quantity;
        $instance->delivery_charge = $deli * $instance->quantity;
        $instance->item_net_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
        $instance->item_net_amount = $instance->item_net_amount * $instance->quantity - $instance->discount_amt;
        $deleted = FALSE;
        $tbl_obj->save($instance);
        $deleted = TRUE;

        $cartitem = $tbl_obj->find('all')->where(['cart_id' => $instance->cart_id, "parent_id IS NULL"]);
        if ($cartitem->count() == 0) {
            $tbl_cart_obj->deleteAll(['id' => $cart_id], true);
        }
        echo json_encode(['success' => 1, 'msg' => 'Update item from cart'], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    private function addtempcart($friendlyUrl = null, $quentity = 1) {

        $Carts = TableRegistry::getTableLocator()->get('TempCarts');
        $CartItems = TableRegistry::getTableLocator()->get('TempCartItems');
        $Products = TableRegistry::getTableLocator()->get('Products');

        $product = $Products->findBySlug($friendlyUrl)->contain(['Items', 'UserProducts'])->first();

        if (!$this->request->getSession()->read('SesionDataId')) {
            $uid = $this->uniqueId();
            $this->request->getSession()->write('SesionDataId', $uid);
        } else {
            $uid = $this->request->getSession()->read('SesionDataId');
        }

        if ($uid) {

            $query = $Carts->find('all')->where(['user_id' => $uid]);
            if (!$this->request->getSession()->read('Product')) {
                $data = [];
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            } else {
                $data = $this->request->getSession()->read('Product');
                $data[] = $product;
                $this->request->getSession()->write('Product', $data);
            }
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $Carts->newEmptyEntity();
                $cart->user_id = $uid;
                $cart->ipaddress = $this->request->clientIp();

                if ($Carts->save($cart)) {
                    $cart = $Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);

            if ($cartitemquery->count() == 0) {

                $deli=!empty($product->user_products[0]->delivery_charge) ? $product->user_products[0]->delivery_charge : 0;

                $cart->gross_amt = $cart->gross_amt + (!empty($product->item->actual_price) ? $product->item->actual_price : 0);
                $Carts->save($cart);
                $cartitem = $CartItems->newEmptyEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
                $cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
                $cartitem->item_gross_amount = $cartitem->item_gross_amount * $quentity;
                $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($product->user_products[0]->offer_price) ? $product->user_products[0]->offer_price : 0;
                $cartitem->item_net_amount = $cartitem->item_net_amount * $quentity;
                $cartitem->delivery_charge = $deli * $quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */


                // $this->Flash->success(__('The cart has been saved.'));
                // return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                //$this->Flash->error(__('Already in your cart'));
                //  return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        }
    }

    protected function uniqueId($length = 6) {
        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $Users = TableRegistry::getTableLocator()->get('TempCarts');
        $Users = $Users->find('all')->where(['user_id' => $key]);
        if ($Users->count() > 0) {
            $this->uniqueId($length);
            return true;
        }

        return $key;
    }

    public function getDelivaryAdd() {
        $delivaryAddObj = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        if($this->Auth->user('id'))
        {
            $delivary = $delivaryAddObj->find()->where(['user_id' => $this->Auth->user('id')]);
            echo json_encode(['success' => 1, 'data' => $delivary], ENT_QUOTES);
        }
        
        $this->autoRender = FALSE;
    }

// wishlist

    public function wishlist($friendlyUrl = null) {



        if ($this->Auth->user('id')) {


            $Products = TableRegistry::getTableLocator()->get('Products');

            $Wishlists = TableRegistry::getTableLocator()->get('Wishlists');
            $product = $Products->findBySlug($friendlyUrl)->contain(['Items'])->first();

            $query = $Wishlists->find('all')->where(['user_id' => $this->Auth->user('id'), 'product_id' => $product->id]);
            if ($query->count() > 0) {
                $this->Flash->error(__('This Product is already in your Wistlist'));

                $pro = $Wishlists->find("all")->contain(['Products'])->where(['Wishlists.user_id' => $this->Auth->user('id')]);
                $this->set('pro', $pro);
            } else {

                $cart = $Wishlists->newEmptyEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->created_date = date('Y-m-d');
                $cart->modified_date = date('Y-m-d');
                $cart->vendor_id = $product->user_id;
                $cart->product_id = $product->id;

                if ($Wishlists->save($cart)) {
                    $this->Flash->error(__('This Product is added to Wishlist'));

                    //return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                } else {
                    $this->Flash->error(__('The Product could not be Wishlisted. Please, try again.'));
                }

                $pro = $Wishlists->find("all")->contain(['Products'])->where(['Wishlists.user_id' => $this->Auth->user('id')]);
                $this->set('pro', $pro);
            }
        } else {
            $this->Flash->error(__('The Product could not be Wishlisted. Please, login first.'));
            return $this->redirect(['controller' => 'login', 'action' => 'index']);
        }
    }

    public function wishlist1() {
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $Wishlists = TableRegistry::getTableLocator()->get('Wishlists');
        $pro = $Wishlists->find("all")->contain(['Products'])->where(['Wishlists.user_id' => $this->Auth->user('id')]);
        $this->set('pro', $pro);
        $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		$this->set('user1', $user1);
    }

//end wishlist
public function razorpay(){
        
       
        $this->_getCartInfo(3);
                               
        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $returnUrl=\Cake\Routing\Router::url(['controller' => "Products", 'action' => 'razorpayOrderSuccess'], TRUE);
       
           $data= $this->Razorpay->send_payment($this->_cart_id,$this->_total_price,$returnUrl);
           $json= json_encode($data);
            $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
        
        
        $this->autoRender = FALSE;
        $this->autoRender = FALSE;
    
    }

 public function razorpayOrderSuccess(){
        
       // \Cake\Log\Log::write('info', "razor");
        //\Cake\Log\Log::write('info', $_POST);
       // die;
         $generated_signature = hash_hmac('sha256',$_POST["razorpay_order_id"]."|".$_POST["razorpay_payment_id"], RAZORPAY_KEY_SECRET);
       
        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $data = $this->Razorpay->verifyPayment($_POST["razorpay_order_id"]);
       
        if($generated_signature ==$_POST["razorpay_signature"] && $data->items[0]->id==$_POST["razorpay_payment_id"]) {
            //$this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);
            $cartTbl = TableRegistry::get('Carts');
            $cart =$cartTbl->find()->where(["order_id"=> $_POST["razorpay_order_id"]])->first();
         $this->paymentsuccess($cart->id,3,$_POST["razorpay_payment_id"]);
        }
        
        $this->autoRender = FALSE;
    }
}
