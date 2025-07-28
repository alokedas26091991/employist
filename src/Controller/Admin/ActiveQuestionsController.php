<?php

declare(strict_types = 1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActiveQuestionsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public $paginate = [
        'limit' => 20,
    ];

    public function initialize(): void {
        parent::initialize();
        //load the file upload component

        $this->_paginateCount = 10;
    }

    public function index() {
        $ExaminationCategories = TableRegistry::getTableLocator()->get("ExaminationCategories");
        $examinations = $ExaminationCategories->find()->contain(["Examinations" => function($e) {
                        return $e->where(["is_active" => 1])->select(["id", "name", "examination_category_id", "is_active"]);
                    }])->select(["id", "name"]);
					
		$question = TableRegistry::getTableLocator()->get("Questions");			
        $questions = $this->paginate($question);
        $this->UserRoles = TableRegistry::getTableLocator()->get("UserRoles");
        $query = $this->UserRoles->find('all')
                        ->where(['UserRoles.user_id' => $this->Auth->User('id')])->first();
        $listUser = $this->UserRoles->find()->contain(["Users" => function($e) {
                return
                        $e->select(["id", "name"]);
            }]);
        $AssignTo = "Assign to";
        switch ($query->role_id) {
            case 1:
                $AssignTo = "Assign to";
                break;
            case 2:
                $listUser->where(["UserRoles.role_id" => 3]);
                $AssignTo = "Assign to Supervisor";
                break;
            case 3:
                $AssignTo = "Assign to Reviewer";
                $listUser->where(["UserRoles.role_id" => 4]);
                break;
            case 4:
                $AssignTo = "Assign to Super Reviewer";
                $listUser->where(["UserRoles.role_id" => 5]);
                break;
            case 5:
                $AssignTo = "Assign to Manager";
                $listUser->where(["UserRoles.role_id" => 7]);
                break;
				
			
            case 6:
                break;
            default :
        }




        $this->set(compact('questions', 'examinations', 'listUser', "AssignTo"));
    }

public function paper() {
    
    
                $search=[];
		 
				 $search1 = $this->request->getQuery('exam_id');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['ExaminationQuestions.examination_id'=>$keyword]];
				$this->set('search',$keyword);
				}
    
     $exam_question = TableRegistry::getTableLocator()->get("ExaminationQuestions");
    
    if ($search1) {
        
       
        
        $question1=$exam_question->find('all')->contain('Questions')->where($search)->where(['Questions.is_active'=>1]);
        
        
        $question=$this->paginate($question1);
        
        
    }
    else
    {
       
        $question1=$exam_question->find('all')->contain('Questions')->where(['Questions.is_active'=>1]);
        $question=$this->paginate($question1);;
    }
    
    $exam = TableRegistry::getTableLocator()->get("Examinations");
    
    $exam_list=$exam->find('all')->where(['is_active'=>1]);
    $this->set(compact('exam_list','question'));
    
}

    public function changequestionstatus($id)
    {
        
        $question = TableRegistry::getTableLocator()->get("Questions");
       
		$question1 = $question->get($id);
		
	//	echo $question1->id;die;
		
		
		
		
		    $question1->is_active=0;
		
        if ($question->save($question1)) {
            
            $this->Flash->success(__('The data has been saved.'));
            
             $referrer = $this->request->referer();
            
            // Redirect back to the referrer or a default URL
            return $this->redirect($referrer ?: ['controller' => 'ActiveQuestions', 'action' => 'paper']);
            
            //return $this->redirect(['controller' => 'ActiveQuestions', 'action' => 'paper', '?' => ['exam_id' => $examId, 'page' => $page]]);
            
        } else {
            
                $referrer = $this->request->referer();
            
               // Redirect back to the referrer or a default URL
               return $this->redirect($referrer ?: ['controller' => 'ActiveQuestions', 'action' => 'paper']);
        }
        
        $this->autoRender = false;
    }

    public function getdataajax() {
        $this->autoRender = false;
		$question = TableRegistry::getTableLocator()->get("Questions");	
        $query = $question->find("all",[
		"order"=>["id"=>"desc"]
		])->where(['is_deleted'=>0,'is_active'=>1]);
        
       
        
        
        
        $count = $query->count();
        $questions = $this->paginate($query);

        $this->returnJson(['count' => $count, 'dataset' => $questions]);
    }

    public function getdata($id) {
        $this->autoRender = false;
        $Examinations = TableRegistry::getTableLocator()->get("ExaminationQuestions");
        $examinations = $Examinations->find()->contain(["ExaminationCategories", "Examinations" => function($e) {
                        return $e->where(["Examinations.is_active" => 1])->select(["id", "name", "examination_category_id", "is_active"]);
                    }])->where(["ExaminationQuestions.question_id" => $id]);

        echo json_encode(["data" => $examinations]);
    }

    public function addExam() {
        $this->autoRender = false;
        $this->ExaminationQuestions = TableRegistry::getTableLocator()->get("ExaminationQuestions");
        $msg = 'The examination question could not be saved. Please, try again.';
        $examinationQuestion = $this->ExaminationQuestions->newEmptyEntity();

        $unique = $this->ExaminationQuestions->find()->where(["question_id" => $this->request->getData("question_id"), "examination_id" => $this->request->getData("examination_id")])->count();
        if ($unique === 0) {
            if ($this->request->is('post')) {

                $examinationQuestion = $this->ExaminationQuestions->patchEntity($examinationQuestion, $this->request->getData());
                $examinationQuestion->created_by = $this->Auth->user("id");
                $examinationQuestion->create_date = date("Y-m-d H:i:s");

                if ($this->ExaminationQuestions->save($examinationQuestion)) {
                    $msg = "The examination question has been saved.";
                } else {
                    $msg = 'The examination question could not be saved. Please, try again.';
                }
            }
        } else {
            $msg = 'Already Added.';
        }
        echo json_encode(["data" => $msg]);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $question = $this->Questions->get($id, [
            'contain' => ['ExaminationQuestions', 'QuestionAnswers', 'UserExaminationAnswers'],
        ]);

        $this->set(compact('question'));
    }
    
            public function questionstatus() {
		
		$this->autoRender = false;
		
		$this->_jsonVars = $this->request->input('json_decode');
        $question = TableRegistry::getTableLocator()->get("Questions");
		$question1 = $question->get($this->_jsonVars->id);
		if($question1->is_active==1)
		{
		    $question1->is_active=0;
		}
		else
		{
		    $question1->is_active=1;
		}
        if ($question->save($question1)) {
            $msg="Status Updated";
        } else {
            $msg="Status Could not be Updated";
        }

        echo json_encode(["data" => $msg]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */


    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteexam() {
		
		$this->autoRender = false;
		
		$this->_jsonVars = $this->request->input('json_decode');
        $exam = TableRegistry::getTableLocator()->get("ExaminationQuestions");
		$examination = $exam->get($this->_jsonVars->id);
        if ($exam->delete($examination)) {
            $msg="Remove question from paper";
        } else {
            $msg="This question has not been removed from paper";
        }

        echo json_encode(["data" => $msg]);
    }
	
	

    public function returnJson($return_data) {
        $json = json_encode($return_data);
        $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
    }

}
