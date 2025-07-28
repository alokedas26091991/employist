<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ExaminationQuestions Controller
 *
 * @property \App\Model\Table\ExaminationQuestionsTable $ExaminationQuestions
 * @method \App\Model\Entity\ExaminationQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExaminationQuestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExaminationCategories', 'Questions', 'Examinations'],
        ];
        $examinationQuestions = $this->paginate($this->ExaminationQuestions);

        $this->set(compact('examinationQuestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Examination Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinationQuestion = $this->ExaminationQuestions->get($id, [
            'contain' => ['ExaminationCategories', 'Questions', 'Examinations', 'UserExaminationAnswers'],
        ]);

        $this->set(compact('examinationQuestion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinationQuestion = $this->ExaminationQuestions->newEmptyEntity();
        if ($this->request->is('post')) {
            $examinationQuestion = $this->ExaminationQuestions->patchEntity($examinationQuestion, $this->request->getData());
            if ($this->ExaminationQuestions->save($examinationQuestion)) {
                $this->Flash->success(__('The examination question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination question could not be saved. Please, try again.'));
        }
        $examinationCategories = $this->ExaminationQuestions->ExaminationCategories->find('list', ['limit' => 200])->all();
        $questions = $this->ExaminationQuestions->Questions->find('list', ['limit' => 200])->all();
        $examinations = $this->ExaminationQuestions->Examinations->find('list', ['limit' => 200])->all();
        $this->set(compact('examinationQuestion', 'examinationCategories', 'questions', 'examinations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examination Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinationQuestion = $this->ExaminationQuestions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinationQuestion = $this->ExaminationQuestions->patchEntity($examinationQuestion, $this->request->getData());
            if ($this->ExaminationQuestions->save($examinationQuestion)) {
                $this->Flash->success(__('The examination question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination question could not be saved. Please, try again.'));
        }
        $examinationCategories = $this->ExaminationQuestions->ExaminationCategories->find('list', ['limit' => 200])->all();
        $questions = $this->ExaminationQuestions->Questions->find('list', ['limit' => 200])->all();
        $examinations = $this->ExaminationQuestions->Examinations->find('list', ['limit' => 200])->all();
        $this->set(compact('examinationQuestion', 'examinationCategories', 'questions', 'examinations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examination Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinationQuestion = $this->ExaminationQuestions->get($id);
        if ($this->ExaminationQuestions->delete($examinationQuestion)) {
            $this->Flash->success(__('The examination question has been deleted.'));
        } else {
            $this->Flash->error(__('The examination question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
