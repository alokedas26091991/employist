<?php
declare(strict_types=1);
namespace App\Controller\Api;
use App\Controller\Api\AppController;
//use Cake\Event\Event;
//use Cake\Routing\Router;
//use Cake\Network\Exception\UnauthorizedException;
//use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;

//use Cake\Mailer\Email;
class UsersController extends AppController{
    public function initialize(): void
    {
		
        parent::initialize();
        $this->Auth->allow(['register', 'token','index','forgotPassword','forgetpassword']);
        
    }
    /**
     * Create new user and return id plus JWT token
     */
         protected function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $Users = TableRegistry::getTableLocator()->get('Users');
        $Users = $Users->find('all')->where(['email_verification_code' => $key]);
        if ($Users->count() > 0) {
            $this->random_string($length);
            return true;
        }

        return $key;
    }
         public function forgetpassword() {
        $Users = TableRegistry::getTableLocator()->get('Users');
     
        if ($this->request->is('post')) {
        $jsonvars = $this->request->input('json_decode');
        $email=$jsonvars->email;
            
            if (!empty($email)) {
                $User = $Users->find('all')->where(['email' => $email]);

                if ($User->count() > 0) {
                    $row = $User->first();


                    $newpass = $this->random_string(6);
                    $row->password = $newpass;

                    $Users->save($row);

                    $this->loadComponent('SendMail');
                    $this->SendMail->sendMail(13, $email, ['user_id' => $row->id, 'password' => $newpass]);
                   
                       

                
                        
                        $this->set([
                            'success' => true,
                            'data' => [
                                'userdetails'=>	[],
                    			"message"=> "New password  has been send your email successfully!.",
                    			"code"=> 200
                            ],
                            '_serialize' => ['success', 'data']
                        ]);
                    
                } else {
                    
                        $this->Flash->error(__('Email that you enter does not exist!.'));

                        $this->set([
                            'success' => false,
                            'data' => [
                                'userdetails'=>	[],
                    			"message"=> "Email that you enter does not exist!.",
                    			"code"=> 200
                            ],
                            '_serialize' => ['success', 'data']
                        ]);
                    
                }
            } else {
                throw new NotFoundException(__(' not found'));
            }
        } 
    }
     
         public function register() {

        $jsonvars = $this->request->input('json_decode');
        $Users = TableRegistry::getTableLocator()->get('Users');
        $User = $Users->newEmptyEntity();
        if ($this->request->is('post')) {
          
            $User = $Users->patchEntity($User, $this->request->getData(), ['validate' => false]);
            $User->create_date = date('Y-m-d');
            $User->is_active = 1;
			$User->user_type = 2;
			$User->name = $jsonvars->name;
			$User->password = $jsonvars->password;
			$User->email = $jsonvars->email;
			$User->phone_no = $jsonvars->phone_no;
			$password = $jsonvars->password;
            $password = $jsonvars->password;
            $confirm_password = $jsonvars->confirm_password;

            if($password==$confirm_password)
			{
            if ($u=$Users->save($User)) {
                
                $userBr = $Users->UserRoles->newEmptyEntity();
                $userBr->role_id = 4;
                $userBr->user_id = $User->id;

                $Users->UserRoles->save($userBr);
                
                $this->set([
                    'success' => true,
                    'data' => [
                        'token' => JWT::encode([
                            'sub' => $u->id,
                            'exp' => time() + 30240000
                                ], Security::getSalt()),
                        'userdetails'=>	$u,
            			
                    ],
                    "message"=> "Your Registration has been Successfully Completed",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
				 
				 
				
               
            } else {
              
                $this->set([
                    'success' => false,
                    'data' => [
                        'userdetails'=>	[],
            			
                    ],
                    "message"=> "Your Registration has not been Successfully Completed. Please, try again.",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
            }
			}
			else
			{
			
                $this->set([
                    'success' => false,
                    'data' => [
                        'userdetails'=>	[],
            			"message"=> "Password and Confirm Password did not Match",
            			"code"=> 200
                    ],
                    '_serialize' => ['success', 'data']
                ]);
			}
        }
        //$this->render('index');
        //$this->_display_meta = TRUE;
    }

	   public function addressbook(){

         
		 
	     $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
		 $user2=$user_delivery->find("all")->where(['user_id' => $this->Auth->user('id')]);
		$this->set([
                    'success' => false,
                    'data' => [
                        'userdetails'=>	$user2,
            			
                    ],
                    "message"=> "Password and Confirm Password did not Match",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
   }
   
   
     public function editaddress(){
      
      
        $jsonvars = $this->request->input('json_decode');
        $id=$jsonvars->id;
      
	     
	     $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');

		 $staticPage = $user_delivery->get($id, [
			'contain' => []
		]);
		

		
			 if ($this->request->is(['patch', 'post', 'put'])) {
			     	     
			$usersave = $user_delivery->patchEntity($staticPage, $this->request->getData());
			
			$usersave->name=$jsonvars->name;
			$usersave->email=$jsonvars->email;
			$usersave->mobile=$jsonvars->mobile;
			$usersave->address=$jsonvars->address;
			$usersave->state=$jsonvars->state;
			$usersave->city=$jsonvars->city;
			$usersave->pin=$jsonvars->pin;
			$usersave->gst=$jsonvars->gst;
			
			
			if ($user_delivery->save($usersave)) {
			   
				
				$msg="Address is Successfully Updated.";
				$d=$usersave;

				
			} else {
				$msg="Address is not Successfully Updated.";
				$d="";
			}
       
		}
		else
		{
		    $msg="Edit Address";
		    $d=$staticPage;
		}
		
		$this->set([
                    'success' => true,
                    'data' => [
                        'address'=>	$d,
            			
                    ],
                    "message"=> "Address Update",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		

   }
   
      public function deleteaddress(){
          
          $jsonvars = $this->request->input('json_decode');
        $id=$jsonvars->id;
		$address = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $this->request->allowMethod(['post', 'delete']);
        $ad = $address->get($id);
        if ($address->delete($ad)) {
           		$this->set([
                    'success' => true,
                    'data' => [
                        'address'=>	[],
            			
                    ],
                    "message"=> "Address Deleted",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
        } else {
            		$this->set([
                    'success' => false,
                    'data' => [
                        'address'=>[]	,
            			
                    ],
                    "message"=> "Address not deleted",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
        }

        
   }

	
	public function changePassword(){
		$user1 = $this->Auth->identify();
		$user = $this->Users->get($user1['id'], [
            'contain' => []
        ]);
        
        $this->_jsonVars = $this->request->input('json_decode');
		$user->password=$this->_jsonVars->password;

		 if ($u=$this->Users->save($user)) {
			
        
        
        
        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode(
                    [
                        'sub' => $user1['id'],
                        'exp' =>  time() + 604800*365
                    ],
                    Security::getSalt()
                ),
			'userdetails'=>	$user,	
            ],
            
			"message"=> "Password changed successfully",
			"code"=> 200,
            '_serialize' => ['success', 'data','userdetails','message','code']
        ]);
        
			 }else{
				  $this->set([
            'success' => false,
           
              'data' => [],  
				
			"message"=> "please try again",
			"code"=> 201,
           
            '_serialize' => ['success','data','message','code']
        ]);
				 
				 }
		}
	
   	public function myaccount(){
   	    
   	
   	    if($this->Auth->user('id'))
		{
	     $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
	   
		 $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		 
		 
		    $staticPage = $tblUserObj1->get($this->Auth->user('id'), [
           'contain' => []
       ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
           $usersave = $tblUserObj1->patchEntity($staticPage, $this->request->getData());
           
           $this->_jsonVars = $this->request->input('json_decode');
			$usersave->name=$this->_jsonVars->name;
			$usersave->phone_no=$this->_jsonVars->phone_no;
			$usersave->email=$this->_jsonVars->email;
           
           if ($tblUserObj1->save($usersave)) {
         

               $this->set([
                    'success' => true,
                    'data' => [
                        'userdetails'=>	$usersave,
            			
                    ],
                    "message"=> "User Information is Successfully Updated.",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
           } else {
               
               $this->set([
                    'success' => false,
                    'data' => [
                        'userdetails'=>	[],
            			
                    ],
                    "message"=> "User Information is not Successfully Updated.",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
           }
       }
       else
       {
           $this->set([
                    'success' => true,
                    'data' => [
                        'userdetails'=>	$user1,
            			
                    ],
                    "message"=> "User Information",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
       }
		}
		else
		{
			$this->set([
                    'success' => false,
                    'data' => [
                        'userdetails'=>	[],
            			
                    ],
                    "message"=> "Please Login",
            			"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		}

   }
   
      public function myorders(){
	    if($this->Auth->user('id'))
		{
		$Invoice = TableRegistry::getTableLocator()->get('Invoices');
		$invoice1=$Invoice->find("all",[
		"order"=>["Invoices.id"=>"desc"]])->where(['user_id' => $this->Auth->user('id')]);
		
	
		    $this->set([
                    'success' => true,
                    'data' => [
                        'order_list'=>	$invoice1,
            			
                    ],
                    "message"=> "Order List",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		}
		else
		{
			$this->set([
                    'success' => false,
                    'data' => [
                        'order_list'=>[],
            			
                    ],
                    "message"=> "Please Login",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		}
   }
   
      public function mymocktest(){
	   
	    if($this->Auth->user('id'))
		{
		$userproduct = TableRegistry::getTableLocator()->get('UserProducts');
		$mytest=$userproduct->find("all",[
		"order"=>["UserProducts.id"=>"desc"]])->contain(['Products','Examinations','UserProductDetails','UserProductDetails.MockTests'])->where(['UserProducts.user_id' => $this->Auth->user('id')]);
		
	
		        $this->set([
                    'success' => true,
                    'data' => [
                        'mocktest_list'=>	$mytest,
            			
                    ],
                    "message"=> "Mocktest List",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		}
		else
		{
			$this->set([
                    'success' => false,
                    'data' => [
                        'order_list'=>[],
            			
                    ],
                    "message"=> "Please Login",
            		"code"=> 200,
                    '_serialize' => ['success', 'data','message','code']
                ]);
		}
		
   }
    /**
     * Return JWT token if posted user credentials pass FormAuthenticate
     */
    public function token()
    {
       // echo "bal";
       // die;
        $user = $this->Auth->identify();
		
        if (!$user) {
             $this->set([
            'success' => false,
            'data' => [],
            
			"message"=> "Email or Password is incorrect",
			"code"=> 200,
            '_serialize' => ['success', 'data','message','code']
        ]);
        }else{
		$userdetails= $this->Users->find('all')->where(['Users.id'=>$user['id']])->contain([])->first();
		
        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode(
                    [
                        'sub' => $user['id'],
                        'exp' =>  time() + 604800*365
                    ],
                    Security::getSalt()
                ),
			'userdetails'=>	$userdetails,	
            ],
            
			"message"=> "Successfully login",
			"code"=> 200,
            '_serialize' => ['success', 'data','userdetails','message','code']
        ]);
		}
    }
    


	public function logout(){
		$this->set([
            'success' => true,
            
                'msg' =>'Successfully logout',
				'code'=>200
           ,
            '_serialize' => ['success', 'msg','code']
        ]);
		
		}
	public function forgotPassword(){
			
			 $email1=$this->request->data['email'];
			
			if(!empty($email1)){
			$userData=$this->Users->find()->where(['email'=>$email1]);
			if($userData->count()>0){
				$userDataResult=$userData->toArray();
				$user=$this->Users->get($userDataResult[0]['id']);
				$newpass='Ab@'.rand(100000,1000000);
				$user->password=$newpass;
				
					if ($this->Users->save($user)) {
						$subject='New Password';
						$body="<p>Hi </p>";
						$body .="<p> Please login with this new password . you can change your password before login  </p>";
						$body .="<p>Your new password is ".$newpass."</p>";
						$body .="<p>Thank you</p>";
						$email['body']=$body;
			
						try {
							$Email = new Email();
							$Email->from(array('noreply@keneo.com' => 'Registeration'));
							$Email->emailFormat('html');
							$Email->to($email1);
							$Email->subject($subject);
							$Email->send($body);
						
						} catch (Exception $e) {
						
							echo 'Exception : ',  $e->getMessage(), "\n";
						
						}
			
						$this->set([
						'success' => true,
						
						'msg' =>'New password  has been send your email successfully.',
						'code'=>200
						,
						'_serialize' => ['success', 'msg','code']
						]);
					} else {
						$this->set([
						'success' => false,
						
						'msg' =>'Password not send your email .please try again.',
						'code'=>200
						,
						'_serialize' => ['success', 'msg','code']
						]);
					
					}
				}else{
					$this->set([
					'success' => false,
					
					'msg' =>'Password not send your email .please try again.',
					'code'=>200
					,
					'_serialize' => ['success', 'msg','code']
					]);
				
				}
			
			}
							
			
			}

}