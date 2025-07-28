<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Careers Controller
 *
 * @property \App\Model\Table\CareersTable $Careers
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CareersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $careers = $this->paginate(
            $this->Careers->find()
                ->where(['is_deleted' => 0])
                ->order(['id' => 'DESC'])
        );

        $this->set(compact('careers'));
    }


    /**
     * View method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('career'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $career = $this->Careers->newEmptyEntity();
        if ($this->request->is('post')) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success(__('The career has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The career could not be saved. Please, try again.'));
        }
        $this->set(compact('career'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success(__('The career has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The career could not be saved. Please, try again.'));
        }
        $this->set(compact('career'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $career = $this->Careers->get($id);

        // Toggle is_deleted: if 0 → 1, if 1 → 0
        $career->is_deleted = $career->is_deleted ? 0 : 1;

        if ($this->Careers->save($career)) {
            $statusText = $career->is_deleted ? 'deleted' : 'restored';
            $this->Flash->success(__('The career has been ' . $statusText . '.'));
        } else {
            $this->Flash->error(__('The career could not be updated. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
