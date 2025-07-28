<?php
declare(strict_types=1);
namespace App\Controller\Api;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

use Cake\Http\Cookie\CookieCollection;
use Cake\Http\Cookie\Cookie;
use Cake\Controller\Component\PaginatorComponent;

use Cake\Event\EventInterface;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
 define('EXTRA_TIME_EXAMINATION',10);
class ExaminationsController extends AppController
{
    
	
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	 public function initialize() : void
     {
        parent::initialize();
        $this->Auth->allow(['index','details']);
	
	   }
	   
public function cartdelete()
{
    $this->_jsonVars = $this->request->input('json_decode');
    $id=$this->_jsonVars->id;
	$cartobj = TableRegistry::getTableLocator()->get('CartItems');
		$this->request->allowMethod(['post', 'delete']);
        $cart_items = $cartobj->get($id);
		
        if ($cartobj->delete($cart_items)) {
            //$this->Flash->success(__('The Mocktest has been deleted.'));
			$this->cart();
			  
// 			$this->set([
//             'success' => true,
//             'data' => ['paper_list'=>$paper_list],
//             'message'=>"Item Deleted from Cart",
//             'code'=>"200",
          
//             '_serialize' => ['success', 'data','message','code']
//         ]);
			  
        } else {
            
			
			  			$this->set([
                        'success' => false,
                        'data' => ['paper_list'=>$paper_list],
                        'message'=>"The mock test could not be deleted. Please, try again.",
                        'code'=>"200",
                      
                        '_serialize' => ['success', 'data','message','code']
                    ]);
        }

       

}    
   public function index(){
	   
	   $examcat = TableRegistry::get('ExaminationCategories');
	   
	   $this->_jsonVars = $this->request->input('json_decode');
      $slug=$this->_jsonVars->slug;
	   
	   $exam_cat_id=$examcat->findBySlug($slug)->first();
	   
	   $paper_list=$this->Examinations->find("all",[
		    "order"=>["Examinations.id"=>"asc"]])->contain(['Reviews'])->where(['Examinations.examination_category_id' => $exam_cat_id->id , 'Examinations.is_active' => 1, 'Examinations.is_deleted' => 0]);
		    
		  //echo $paper_list->reviews->count();die;
		  
		foreach($paper_list as $k){
	    $k->pic=\Cake\Routing\Router::url('/paper/'.$k->pic,true);
	    $k->description=strip_tags(html_entity_decode($k->description));
	    $k->description = trim(preg_replace('/\s\s+/', ' ', $k->description));
	    $k->short_description=strip_tags(html_entity_decode($k->short_description));
	    $k->short_description = trim(preg_replace('/\s\s+/', ' ', $k->short_description));
	}
 
            
             $this->set([
            'success' => true,
            'data' => ['paper_list'=>$paper_list],
            'message'=>"Menu Created",
            'code'=>"200",
          
            '_serialize' => ['success', 'data','message','code']
        ]);
        
	    
	}
        
	public function details(){
	    
	     $this->_jsonVars = $this->request->input('json_decode');
        $slug=$this->_jsonVars->slug;
		
		
		$paper=$this->Examinations->findBySlug($slug)->contain(['Reviews'])->first();
		
	
		
		$paper->pic=\Cake\Routing\Router::url('/paper/'.$paper->pic,true);
		
		$paper->description=strip_tags(html_entity_decode($paper->description));
	    $paper->description = trim(preg_replace('/\s\s+/', ' ', $paper->description));
	    $paper->short_description=strip_tags(html_entity_decode($paper->short_description));
	    $paper->short_description = trim(preg_replace('/\s\s+/', ' ', $paper->short_description));
		
		 $mock = TableRegistry::getTableLocator()->get('MockTests');
		 $demo_mock=$mock->find("all")->where(['is_demo' => 1 , 'examination_id' => $paper->id])->first();
		 
		 
		
		$r=0;
		$k=0;
		foreach($paper->reviews as $re)
		{
			 $r=$r+$re->rating;
			 $k++;
		}
		if($k>0)
		{
			$m=round($r/$k);
		}
		else
		{
			$m=0;
		}
		
		 
		 
		 
		 
		 // package 
		 $package = TableRegistry::getTableLocator()->get('Products');
		 
		  $package_list=$package->find("all",[
		    "order"=>["Products.id"=>"ASC"]])->where(['examination_category_id'=>$paper->examination_category_id,'Products.is_active' => 1 , 'Products.is_deleted' => 0]);
		 
		 
		 //end
		 
		$paper_list=$this->Examinations->find("all",[
		    "order"=>["Examinations.id"=>"desc"]])->contain(['Reviews'])->where(['Examinations.examination_category_id' => $paper->examination_category_id , 'Examinations.is_active' => 1, 'Examinations.is_deleted' => 0])->limit(10);
	foreach($paper_list as $k){
	    $k->pic=\Cake\Routing\Router::url('/paper/'.$k->pic,true);
	}
			//review show section
			$Reviews = TableRegistry::getTableLocator()->get('Reviews');
		    $reviewlist1=$Reviews->find("all",[
		    "order"=>["Reviews.id"=>"desc"]])->contain(['Users'])->where(['Reviews.slug' => $slug , 'Reviews.is_active' => 1]);
		    
		  
 
            
             
             
        $this->set([
            'success' => true,
            'data' => ['paper'=>$paper,'total_review'=>$m,'demo_mock_test'=>$demo_mock,'mock_test_list'=>$package_list,'review_list'=>$reviewlist1,'related_paper'=>$paper_list],
            'message'=>"Menu Created",
            'code'=>"200",
          
            '_serialize' => ['success', 'data','message','code']
        ]);
             
        

	}
	
	public function addReview()
	{
	    $this->_jsonVars = $this->request->input('json_decode');
        $slug=$this->_jsonVars->slug;					
		 if ($this->request->is('post')) {
		    if ($this->Auth->user('id')) {
			
            $Reviews = TableRegistry::getTableLocator()->get('Reviews');
            $product = $this->Examinations->findBySlug($slug)->first();
			
			//echo $product->id;die;
		    
                $review11 = $Reviews->newEmptyEntity();
				$review1 = $Reviews->patchEntity($review11, $this->request->getData());
                $review1->user_id = $this->Auth->user('id');
                $review1->dt = date('Y-m-d');
                $review1->slug = $product->slug;
				
                $review1->examination_id = $product->id;
                $review1->rating = $this->_jsonVars->rating; 
                $review1->comment = $this->_jsonVars->comment; 
				
                if ($r=$Reviews->save($review1)) {
                    
      
                
                    
                    
                    
                            $this->set([
                                'success' => true,
                                'data' => ['review'=>$r],
                                'message'=>"Thanks for your Valuable Review",
                                'code'=>"200",
                              
                                '_serialize' => ['success', 'data','message','code']
                            ]);
					
					//return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                } else {
                    
                    $this->set([
                                'success' => false,
                                'data' => [],
                                'message'=>"Review is not Generated. Please, try again.",
                                'code'=>"200",
                              
                                '_serialize' => ['success', 'data','message','code']
                            ]);
                    
                }
				
				
			 
			 
			
			 } 
         
		else {
            
           $this->set([
                                'success' => false,
                                'data' => [],
                                'message'=>"Please, login first.",
                                'code'=>"200",
                              
                                '_serialize' => ['success', 'data','message','code']
                            ]);
        }
		
		 }
	}
        
         public function test($slug = null) {
		$this->viewBuilder()->disableAutoLayout(false);
        $this->set('slug', $slug);
    }
    
    
    
    function saveQuizAnswerTest() {
        $this->_jsonVars = $this->request->input('json_decode');
        $tblMockTestObj = TableRegistry::getTableLocator()->get('MockTests');
        $tblUserExaminationsObj = TableRegistry::getTableLocator()->get('UserExaminations');
        $tblUserExaminationAnswersObj =TableRegistry::getTableLocator()->get('UserExaminationAnswers');
        $questionanswerObj = $this->_jsonVars->data;
		
        $totalTimeTaken = $this->_jsonVars->timeTaken;
        $user_id = $this->Auth->user('id');
        $user_examination = $tblUserExaminationsObj->find('all')->where(['mock_test_id' => $questionanswerObj->id, 'user_id' => $user_id, 'is_completed' => 0])->first();
        $user_examination->time_taken = $totalTimeTaken;
        $user_examination->marks_obtained = 0;
        $user_examination->is_completed = 1;
        $user_examination->attempt_date = date('Y-m-d H:i:s');
        $user_examination_id = $user_examination->id;

        $all_examinations = $tblMockTestObj->find('all')->where(['MockTests.id' => $questionanswerObj->id])->contain(['ExaminationMockTestQuestions.Questions.QuestionAnswers'])->first();
        $i = 0;
        $result = 0;
        $correctAnswer = array();
		
        foreach ($all_examinations['examination_mock_test_questions'] as $q) {
            //$user_examination_answer = $tblUserExaminationAnswersObj->newEmptyEntity();
            $user_examination_answer = $tblUserExaminationAnswersObj->find('all')->where(['user_examination_id' => $user_examination_id, 'question_id' => $q->question_id])->first();
            $j = 0;
			
            foreach ($q->question['question_answers'] as $a) {
               // pr($questionanswerObj->examination_mock_test_questions[$i]);
                //die;
                if (!empty($a->q_option)) {
                    if ($questionanswerObj->examination_mock_test_questions[$i]->examination_question_answers[$j]->is_correct == 1) {

                        if ($a->is_correct == 1) {
                            $user_examination_answer->is_correct = 1;
                            //$result = $result + $all_examinations->each_question_mark;
                        } else {
                            $user_examination_answer->is_correct = 0;
                            //$result = $result - $all_examinations->negative_marks;
                        }
                    }
                    if ($a->is_correct == 1) {
                        $correctAnswer[] = array('question_id' => $q->id, 'answer_id' => $questionanswerObj->examination_mock_test_questions[$i]->examination_question_answers[$j]->id);
                    }
                   
                    if ($questionanswerObj->examination_mock_test_questions[$i]->examination_question_answers[$j]->is_correct == 1) {

                        $user_examination_answer->answer_id = $a->id;
                    }
                }
                $j++;
            }
            $user_examination_answer->user_examination_id = $user_examination_id;
            $user_examination_answer->examination_question_id = $q->id;
            
            $tblUserExaminationAnswersObj->save($user_examination_answer);
          

            $i++;
        }

        $user_examination->marks_obtained = $result;
      
        $tblUserExaminationsObj->save($user_examination);

        $user_result_data = $tblUserExaminationsObj->find('all')->where(['id' => $user_examination->id])->contain(['UserExaminationAnswers'])->first();
        $k = 0;
        foreach ($user_result_data->user_examination_answers as $ua) {
            $ua->correct_answer = $correctAnswer[$k]['answer_id'];
            $k++;
        }



        $UserTest = $tblUserExaminationsObj->find('all')->where(['UserExaminations.mock_test_id' => $questionanswerObj->id, 'is_last_attempted' => 0])->order(['UserExaminations.marks_obtained' => 'DESC', 'UserExaminations.time_taken' => 'ASC'])->limit(5)->contain(['Users' => function($q) {
                        return $q->select(['name', 'image']);
                    }])->toArray();
                    //$this->returnJson(['success' => 1, 'data' => $user_result_data, 'msg' => 'result submit successfully', 'user_data' => $UserTest]);
                //echo json_encode();
                //$this->autoRender = FALSE;
                
                $this->set([
                        'success' => true,
                        'data' => $user_result_data,
                        'message'=>"You are successfully submitted the exam",
                        'code'=>"200",
                      
                        '_serialize' => ['success', 'data','message','code']
                    ]);
                
                
 
            }

            /*
             * examination load
             */
            
            public function loadQuizzQuestionTest() {
				
				$this->_jsonVars = $this->request->input('json_decode');
				$slug=$this->_jsonVars->slug;
			
                $user_id =$this->Auth->user('id');
                $tblMockTests = TableRegistry::getTableLocator()->get('MockTests');
                $mocktests = $tblMockTests->findBySlug($slug)->contain(["Examinations"])->first();
                

				$diffInSeconds =1000;
				$totalTime =$mocktests->time_alloted;
                $tblUserExaminationsObj = TableRegistry::getTableLocator()->get('UserExaminations');
                $tblUserExaminationAnswersObj = TableRegistry::getTableLocator()->get('UserExaminationAnswers');
                
               

                $user_result_query = $tblUserExaminationsObj->find('all')->where(['mock_test_id' => $mocktests->id, 'user_id' => $user_id, 'is_completed' => 0])->contain(['UserExaminationAnswers']);
                if ($user_result_query->count() > 0) {
                    $user_result_data = $user_result_query->first();
                    if ($user_result_data->is_start == 1) {

                        $attemptfirst = false;
                        $last_attempted_question_id = $user_result_data->last_attempted_question_id;
                        $time_taken = $user_result_data->time_taken;
						$diffInSeconds=$time_taken;
//                       if ($date_now > $date_end) {
//
//                            echo json_encode(['success' => 5, 'data' => $examinations, 'msg' =>"Sorry examination time over"]);
//                            // return true;
//                            die;
//                        }
                    } else {

                        
                        $attemptfirst = false;
                        $last_attempted_question_id = 0;
                        $time_taken = 0;
                    }
                } else {
                    $user_result_data = [];
                    $attemptfirst = true;
                    $last_attempted_question_id = 0;
                    $time_taken = 0;
                    $diffInSeconds=0;
                }
                $j = 0;
                $all_examinations = $tblMockTests->find('all')->where(['MockTests.slug' => $slug])->contain(['ExaminationMockTestQuestions.Questions.QuestionAnswers','ExaminationMockTestQuestions.Questions'])->first();

                $all_examinations->is_attempted_first = $attemptfirst;
                $all_examinations->is_lastquestion_id = $last_attempted_question_id;
                $all_examinations->is_lastquestion_index = -1;
                $all_examinations->time_taken = $diffInSeconds;
                $all_examinations->time_alloted = intval($totalTime);
                $all_examinations->totaltime=intval($totalTime);
                $all_examinations->extra_end_time=intval(10);

                $allquestion_id = [];
                foreach ($all_examinations['examination_mock_test_questions'] as $question) {
                    $allquestion_id[] = $question['question_id'];
                }

                $lastsetquestion = [];
                if (!$attemptfirst) {

                    foreach ($user_result_data->user_examination_answers as $question) {
                        $lastsetquestion[] = $question->question_id;
                    }

                    $deleteQuestion = [];
                    foreach ($lastsetquestion as $lastId) {
                        if (!in_array($lastId, $allquestion_id)) {
                            $deleteQuestion[] = intval($lastId);
                        }
                    }
                }

                foreach ($all_examinations['examination_mock_test_questions'] as $q) {
                    if (!$attemptfirst) {
                        if (in_array($q->question_id,$lastsetquestion)) {
                            $j = array_search($q->question_id, $lastsetquestion);


                            if ($user_result_data->user_examination_answers[$j]->answer_id > 0) {
                                $q->is_attemped = 1;
                            } else {
                                $q->is_attemped = 0;
                            }
                            if ($q->question_id == $last_attempted_question_id) {
                                $all_examinations->is_lastquestion_index = $j;
                            }
                        } else {
                            $q->is_attemped = 0;
                            $user_examination_answer = $tblUserExaminationAnswersObj->newEmptyEntity();
                            $j = 0;
                            $user_examination_answer->user_examination_id = $user_result_data->id;
                           // $user_examination_answer->question_id = $q->id;
							$user_examination_answer->question_id = $q->question_id;
                            $tblUserExaminationAnswersObj->save($user_examination_answer);
                        }
                    } else {
                        $q->is_attemped = 0;
                    }

                    $optionArr = [];
                    foreach ($q->question->question_answers as $a) {
                        if (!$attemptfirst) {
                            if (in_array($q->question_id, $lastsetquestion)) {
                                if (!empty($a->q_option)) {
                                    $a->is_correct = ($user_result_data->user_examination_answers[$j]->answer_id == $a->id) ? 1 : 0;
                                    $optionArr[] = $a;
                                }
                            } else {
                                if (!empty($a->q_option)) {
                                    $a->is_correct = 0;
                                    $optionArr[] = $a;
                                }
                            }
                        } else {
                            if (!empty($a->q_option)) {
                                $a->is_correct = 0;
                                $optionArr[] = $a;
                            }
                        }
                    }
                    $q['examination_question_answers'] = $optionArr;
                }
                if (!empty($deleteQuestion)) {
                    $tblUserExaminationAnswersObj->updateAll(['is_deleted' => 1], ['user_examination_id' => $user_result_data->id, 'examination_question_id  IN' => $deleteQuestion]);
                }
				
			
                if ($attemptfirst) {
                    $user_examination = $tblUserExaminationsObj->newEmptyEntity();
                    //$user_id = $this->Auth->user('id');
                   // pr($mocktests);
                    $user_examination->examination_id = $mocktests->examination_id;
                     $user_examination->examination_category_id = $mocktests->examination->examination_category_id;
                      $user_examination->mock_test_id = $mocktests->id;
                    $user_examination->user_id = $user_id;
                    $user_examination->is_start = 1;
                    $user_examination->time_taken = 0;
                    $user_examination->marks_obtained = 0;
                    $user_examination->attempt_date = date('Y-m-d H:i:s');
                  
                    /*                     * *** Update Previous Attempted **** */
                    $tblUserExaminationsObj->save($user_examination);
                     
                    $user_examination_id = $user_examination->id;
                    foreach ($all_examinations['examination_mock_test_questions'] as $q) {
                        $user_examination_answer = $tblUserExaminationAnswersObj->newEmptyEntity();
                        $j = 0;
                        $user_examination_answer->user_examination_id = $user_examination_id;
                        $user_examination_answer->examination_question_id = $q->id;
						$user_examination_answer->question_id = $q->question_id;
                        $tblUserExaminationAnswersObj->save($user_examination_answer);
                    }
                }
                
            //     foreach($all_examinations->examination_mock_test_questions as $s){
	   
        	   // $s->question->question=strip_tags(html_entity_decode($s->question->question));
        	   // $s->question->question = trim(preg_replace('/\s\s+/', ' ', $s->question->question));
        	   // foreach($s->question as $s1){
        	        
        	   //     $s1->question_answers->q_option=strip_tags(html_entity_decode($s1->question_answers->q_option));
        	   //     $s1->question_answers->q_option = trim(preg_replace('/\s\s+/', ' ', $s1->question_answers->q_option));
        	   // }
            //     }
				
				$this->set([
                        'success' => true,
                        'data' => $all_examinations,
                        'message'=>"Question List",
                        'code'=>"200",
                      
                        '_serialize' => ['success', 'data','message','code']
                    ]);
            }

            /*             * **Save examination each step**** */

            public function returnJson($return_data) {
        $json = json_encode($return_data);
        $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
				
				

        return $this->response;
    }
            public function saveQuizEachStep() {
                $user_id = $this->Auth->user('id');
                $this->_jsonVars = $this->request->input('json_decode');
                $tblUserExaminationsObj = TableRegistry::getTableLocator()->get('UserExaminations');
                $tblUserExaminationAnswersObj = TableRegistry::getTableLocator()->get('UserExaminationAnswers');
                $user_result_query = $tblUserExaminationsObj->find('all')->where(['mock_test_id' => $this->_jsonVars->examinationid, 'user_id' => $user_id, 'is_completed' => 0])->first();

                $saveUserAnswer = $tblUserExaminationAnswersObj->find()->where(['user_examination_id' => $user_result_query->id, 'question_id' => $this->_jsonVars->questionid])->first();
               
                $saveUserAnswer->question_id = $this->_jsonVars->questionid;

                $saveUserAnswer->answer_id = $this->_jsonVars->answerid;
                $tblUserExaminationAnswersObj->save($saveUserAnswer);
                $user_result_query->last_attempted_question_id = $this->_jsonVars->questionid;
                $user_result_query->time_taken = $this->_jsonVars->timeTaken;
                $tblUserExaminationsObj->save($user_result_query);
                
          
				
				$this->set([
                        'success' => true,
                        'data' => [],
                        'message'=>"Save Each Question",
                        'code'=>"200",
                      
                        '_serialize' => ['success', 'data','message','code']
                    ]);
            }
		
          /*
     * examination  save
     */
	 
	 public function checkout(){
		 
	 }
	 
            public function addTest(){
		    $user_id=$this->Auth->user('id');
		
		  $tblcartObj = TableRegistry::getTableLocator()->get('Carts');
		  
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
		return $this->redirect(['controller' => 'Home','action' => 'myorders','prefix' => false]);
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
				
                        public function itemaddtocart(){
                            
                            if($this->Auth->user("id"))
                            {
                            $this->_jsonVars = $this->request->input('json_decode');
                            
                            $slug=$this->_jsonVars->slug;
                            $product_id=$this->_jsonVars->product_id;
                            
                             $tblProductsObj = TableRegistry::getTableLocator()->get('Products');
                             $product = $tblProductsObj->get($product_id);
                              $tblCartsObj = TableRegistry::getTableLocator()->get('Carts');
                              $tblCartItemsObj = TableRegistry::getTableLocator()->get('CartItems');
                             $paper=$this->Examinations->findBySlug($slug)->first();
                             $user_id = $this->Auth->user("id");
                             $cart = $tblCartsObj->find()->where(["user_id"=>$user_id,"is_deleted!=1"]);
                             if($cart->count()>0){
                                 $cart = $cart->first();
                             }else{
                                 $cart = $tblCartsObj->newEmptyEntity();
                                 $cart->user_id = $this->Auth->user("id");
                                 $cart->invoice_no =1;
                                 $cart->gross_amount =0;
                                 $cart->net_amount =0;
                                 $cart->tax_amount =0;
                                 $cart->discount_amount =0;
                                 $cart->is_active =1;
                                 $cart->create_date =date("Y-m-d H:i:s");
                                 $tblCartsObj->save($cart);
                                 $cart->invoice_no =10000+$cart->id;
                                  $tblCartsObj->save($cart);
                             }
                           $cartItem = $tblCartItemsObj->find()->where(["cart_id"=>$cart->id,"product_id"=>$product_id,"examination_id"=>$paper->id]);
                           if($cartItem->count()>0){
							   
							   //$this->Flash->success(__('This package is already addedd'));
							   $this->cart();
                               //return $this->redirect("/examinations/cart/");
                               //return $this->redirect("/examinations/details/".$slug);
                           }else{
                               $cartItem = $tblCartItemsObj->newEmptyEntity();
                               $cartItem->cart_id = $cart->id;
                               $cartItem->product_id =$product_id;
                               $cartItem->examination_id =$paper->id;
                               $cartItem->gross_amount =$product->price;
                               $cartItem->net_amount =$product->price;
                               $cartItem->tax_amount =$product->price*.18;
                               $cartItem->discount =0;
                                $cartItem->create_date =date("Y-m-d H:i:s");
                                $tblCartItemsObj->save($cartItem);
								$this->cart();
                                //return $this->redirect("/examinations/cart/");
                           }
						   
                            }
                            else
                            {
                                $this->set([
                                    'success' => false,
                                    'data' => [],
                                    'message'=>"Please Login to Purchase",
                                    'code'=>"200",
                                  
                                    '_serialize' => ['success', 'data','message','code']
                                ]);
                            }
                             
                        }
				public function cart()
				{
                                    $tblCartsObj = TableRegistry::getTableLocator()->get('Carts');
                                    $user_id = $this->Auth->user("id");
					$cart = $tblCartsObj->find()->contain(["CartItems","CartItems.Products","CartItems.Examinations"])->where(["user_id"=>$user_id,"is_deleted!=1"]);
                                        if($cart->count()>0){
                                            $this->_updateCart($cart);
                                            $cart_list =$cart->first();
                                        }else{
                                            $cart_list =[];
                                        }
                       $this->set([
                                    'success' => true,
                                    'data' => ['cart_list'=>$cart_list],
                                    'message'=>"cart list",
                                    'code'=>"200",
                                  
                                    '_serialize' => ['success', 'data','message','code']
                                ]);                 
					     
				}
                                private function _updateCart($cart){
                                    $cart = $cart->first();
                                   $tblUserProductsObj = TableRegistry::getTableLocator()->get('UserProducts');
                                   $tblCartsObj = TableRegistry::getTableLocator()->get('Carts');
                                   $user_id = $this->Auth->user("id");
                                   $up=$tblUserProductsObj->find()->where(["user_id"=>$user_id,"product_id!=1"]);
                                   if($up->count()>1){
                                       $oldcustomer =true;
                                   }else{
                                       $oldcustomer =false;
                                   }
                                   $tblCartItemsObj = TableRegistry::getTableLocator()->get('CartItems');
                                 
                                   $cartItem = $tblCartItemsObj->find()->where(["cart_id"=>$cart->id,"product_id!=1"]);
                                  
                                    if($cartItem->count()>1){
                                        
                                        foreach($cartItem as $c){
                                            $c->discount = round($c->gross_amount*DISCOUNT1/100);
                                            $c->net_amount = $c->gross_amount - $c->discount;
                                            if($oldcustomer){
                                                $c->discount_again = round($c->net_amount*DISCOUNT2/100);
                                                $c->net_amount = $c->gross_amount - $c->discount-$c->discount_again;
                                            }
                                            $c->tax_amount = round($c->net_amount*TAX_PERCENTAGE/100);
                                            $tblCartItemsObj->save($c);
                                        }
                                    }
									else
									{
										foreach($cartItem as $c){
                                            $c->discount = 0;
                                            $c->net_amount = $c->gross_amount;
											$c->discount_again=0;
                                            
                                            $c->tax_amount = round($c->net_amount*TAX_PERCENTAGE/100);
                                            $tblCartItemsObj->save($c);
                                        }
										
									}
                                    $cartItem = $tblCartItemsObj->find()->where(["cart_id"=>$cart->id]);
                                    $tg=0;
                                    $tn=0;
                                    $td=0;
                                    $tx=0;
                                    foreach($cartItem as $c){
                                            $tg = $tg+$c->gross_amount;
                                            $tn = $tn+$c->net_amount;
                                            $td = $td +$c->discount+$c->discount_again;
                                            $tx = $tx +$c->tax_amount;
                                        }
                                        $cart = $tblCartsObj->find()->where(["user_id"=>$user_id,"is_deleted!=1"])->first();
                                        $cart->gross_amount= $tg;
                                        $cart->net_amount= $tn;
                                        $cart->discount_amount= $td;
                                        $cart->tax_amount= $tx;
                                       $tblCartsObj->save($cart);
                                }
	  
}
