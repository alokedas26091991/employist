<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

date_default_timezone_set('Asia/Kolkata');

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   public function initialize(): void
    {
        parent::initialize();
			$this->Auth->allow(['login','registration','updateActivity']);
			$this->viewBuilder()->setLayout('layout_admin');
	}
	
	public function updateActivity()
    {
        $this->request->allowMethod(['post']);
        
       $this->autoRender = false;

        if ($this->Auth->user('id')) {
            $usersTable = $this->getTableLocator()->get('UserLogins');
             $query = $usersTable->find()->where(['user_id'=>$this->Auth->user('id')])->first();
				if($query->id)
				{
					$userlogin = $usersTable->get($query->id);
					//$userlogin = $tblUserloginObj->patchEntity($user_login, $this->request->getData());
					$userlogin->user_id=$this->Auth->user('id');
					$userlogin->last_login_date=date('Y-m-d');
					$userlogin->last_login_time=time();
					$userlogin->is_login=2;
                    //$usersTable->save($userlogin);
				}
				else{
					
					$userlogin = $usersTable->newEmptyEntity();
					$userlogin->user_id=$this->Auth->user('id');
					$userlogin->last_login_date=date('Y-m-d');
					$userlogin->last_login_time=time();
					$userlogin->is_login=2;
                    //$usersTable->save($userlogin);
				}
            if ($usersTable->save($userlogin)) {
                
                 return $this->redirect($this->Auth->logout());
                $response = ['success' => true, 'message' => 'Activity updated'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to update activity'];
            }
        } else {
            $response = ['success' => false, 'message' => 'No active session'];
        }

        $this->set(compact('response'));
        $this->set('_serialize', 'response');
    }
	
    public function dashboard(){

       
		
	
		}
    public function login()
    {
		//$this->layout="";
		$this->viewBuilder()->setLayout('layout_login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
			
            if ($user) {
                $this->Auth->setUser($user);
				
				
				$tblUserloginObj = TableRegistry::getTableLocator()->get('UserLogins');
                $query = $tblUserloginObj->find()->where(['user_id'=>$this->Auth->user('id')])->first();
				if($query->id)
				{
					$userlogin = $tblUserloginObj->get($query->id);
					//$userlogin = $tblUserloginObj->patchEntity($user_login, $this->request->getData());
					$userlogin->user_id=$this->Auth->user('id');
					$userlogin->last_login_date=date('Y-m-d');
					$userlogin->last_login_time=time();
					$userlogin->is_login=1;
                    $tblUserloginObj->save($userlogin);
				}
				else{
					
					$userlogin = $tblUserloginObj->newEmptyEntity();
					$userlogin->user_id=$this->Auth->user('id');
					$userlogin->last_login_date=date('Y-m-d');
					$userlogin->last_login_time=time();
					$userlogin->is_login=1;
                    $tblUserloginObj->save($userlogin);
				}
				
               if($this->Auth->user('user_type')==2){
					 return $this->redirect(['controller'=>'Branches','action' => 'index']);
				}else{
                return $this->redirect($this->Auth->redirectUrl());
				}
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
	public function logout()
    {
		$tblUserloginObj = TableRegistry::getTableLocator()->get('UserLogins');
		$query = $tblUserloginObj->find()->where(['user_id'=>$this->Auth->user('id')])->first();
		if($query->id)
		{
			$userlogin = $tblUserloginObj->get($query->id);
			//$userlogin = $tblUserloginObj->patchEntity($user_login, $this->request->getData());
			$userlogin->user_id=$this->Auth->user('id');
			$userlogin->last_login_date=date('Y-m-d');
			$userlogin->last_logout_time=time();
			$userlogin->is_login=0;
			$userlogin->total_time=$query->total_time+($userlogin->last_logout_time-$query->last_login_time);
			$tblUserloginObj->save($userlogin);
		}
        return $this->redirect($this->Auth->logout());
		
    }
    public function index()
    {
		
		$search=[];
		 	$this->set('placeholder',['Search by  Name , Email , Phone Number']);
                        $search1 = $this->request->getQuery('search');
                       
				if($search1!=null){  
				$keyword= trim($search1);
				$search[]=['OR'=>['Users.name LIKE' => "%$keyword%",'Users.email LIKE' => "%$keyword%","Users.phone_no"=>$keyword]];
				//$this->request->getData("search")=$keyword;
				$this->set('search',$keyword);
				}
				if($this->Auth->user('id')!=1){
					$search=['id'=>$this->Auth->user('id')];
					}
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users->find()->where($search));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    public function customerlist()
    {
		$this->viewBuilder()->setLayout('layout_admin');
		$search=[];
		 	$this->set('placeholder',['Search by  Name , Email , Phone Number']);
				 $search1 = $this->request->getQuery('search');
				if($search1!=null){   
				$keyword= trim($search1);
				$search[]=['OR'=>['Users.first_name LIKE' => "%$keyword%",'Users.last_name LIKE' => "%$keyword%",'Users.email LIKE' => "%$keyword%","Users.mobile"=>$keyword]];
				$this->set('search',$keyword);
				}
				if($this->Auth->user('is_admin')!=1){
					$search=['id'=>$this->Auth->user('id')];
					}
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users->find()->where(['is_customer'=>1, $search]));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	  public function registration(){
		  
		  $this->viewBuilder()->layout('layout_registration');
		   $country = $this->Users->Countries->find('list', ['limit' => 200]);
		 $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
			
			$code=$this->checkSponsorCode($this->request->data['sponsorcode']);
			
			if(!$code){
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
				return false;
				}
			
				$this->request->data['is_active']=1;
				$this->request->data['user_type']=3;
				
				$this->request->data['block_no']=$this->getNameRand(7);
				
				$this->endLeftRightUser($this->request->data['sponsorcode'],$this->request->data['position']);
				$this->request->data['upline_code']=$this->endCode;
				$this->request->data['parent_id']=$this->endCodeId;
				$this->request->data['sponsor_id']=$code;
			
            $user = $this->Users->patchEntity($user, $this->request->data);
			
			//if($_FILES['photo']['name']!=''){
				
				 		//$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');
					 
				// }
			
            if ($this->Users->save($user)) {
				
				$spobj=(object)['user_id'=>$user->id,'sponsored_by'=>$code,'position'=>$user->position,'upline_code'=>$user->upline_code,'upline'=>$this->endCodeId];
				$this->adduserSponsor($spobj);
				$wallet=$this->Users->UserWallets->newEmptyEntity();
				$wallet->user_id=$user->id;
				$this->Users->UserWallets->save($wallet);
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
				
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user','country'));
        $this->set('_serialize', ['user']);
		  
		  }
	public function otp(){
		$user = $this->Users->get($this->Auth->user('id'));
		$user->unique_code= mt_rand(100000, 999999);
		$this->Users->save($user);
		$this->loadComponent('SendEmail');
		$this->SendEmail->sendmailuser($user,['subject'=>'Xlitex-Serect Code','body'=>'Your Code-'.$user->unique_code]);
		$this->Flash->success(__('secrect code send your register email .'));

                return $this->redirect(['action' => 'dashboard']);
		}

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
			
            $user = $this->Users->patchEntity($user, $this->request->getData());
			
			$user->create_date=date('Y-m-d');
			
			if(file_exists($_FILES['image_file']['tmp_name']))
			{
				
			$file = $this->request->getUploadedFiles();

			$user->image = $file['image_file']->getClientFilename();
			$file['image_file']->moveTo(WWW_ROOT . 'user' . DS . $user->image);
			}
			else
			{
				$user->image="";
			}
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {	
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
            $user = $this->Users->patchEntity($user, $this->request->getData());
			
			if(file_exists($_FILES['image_file']['tmp_name']))
			{
				
			$file = $this->request->getUploadedFiles();

			$user->image = $file['image_file']->getClientFilename();
			$file['image_file']->moveTo(WWW_ROOT . 'user' . DS . $user->image);
			}
			else
			{
				$user->image=$user->image;
			}
			
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function changepassword($id){
		$user = $this->Users->get($id, [
            'contain' => []
        ]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
                $this->Flash->success(__('The password change successfully.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
		}
		$user->password="";
		 $this->set(compact('user'));
        $this->set('_serialize', ['user']);
		}
		
	public function getNameRand($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	  
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		
		$user = $this->Users->find()->where(['block_no'=>$randomString]);
			if($user->count()==0){
					 return $randomString; 
				}else{
					$this->getNameRand($n);
					}
		 
			}
			
	public function role($user_id)
    {
		$userroles = $this->Users->UserRoles->find('all')->where(['user_id'=>$user_id])->first();
		
		if(empty($userroles->id))
		{
        $userRole = $this->Users->UserRoles->newEmptyEntity();
        if ($this->request->is('post')) {
            $userRole = $this->Users->UserRoles->patchEntity($userRole, $this->request->getData());
            $userRole->user_id= $user_id;
            if ($this->Users->UserRoles->save($userRole)) {
                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user role could not be saved. Please, try again.'));
            }
        }
		}
		else
		{
			if ($this->request->is('post')) {
			        $user = $this->Users->UserRoles->get($userroles->id);
		
					$user->role_id=$this->request->getData('role_id');
					if ($this->Users->UserRoles->save($user)) {
						$this->Flash->success(__('The user role has been saved.'));
					} else {
						$this->Flash->error(__('The user role could not be saved. Please, try again.'));
					}
			}
		}
       
        $roles = $this->Users->UserRoles->Roles->find();
		
		
        $this->set(compact('userroles',  'roles'));
        $this->set('_serialize', ['userroles','roles']);
    }
}
