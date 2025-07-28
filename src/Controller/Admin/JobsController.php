<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('job'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEmptyEntity();
        if ($this->request->is('post')) {
            // $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $path = 'upload/allfile/';
            $images = $this->request->getData('image'); // an array of UploadedFile objects

            if (!empty($images) && is_array($images)) {
                foreach ($images as $uploadedFile) {
                    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                        $originalName = $uploadedFile->getClientFilename();
                        $fileName = time() . '_' . $originalName;
                        $uploadPath = WWW_ROOT . 'upload/allfile/';
                        $uploadFile = $uploadPath . $fileName;

                        $uploadedFile->moveTo($uploadFile);
                        $job = $this->Jobs->newEmptyEntity();
                        $job->image = $fileName;
                        $job->title = $this->request->getData('title');
                        $job->description = $this->request->getData('description');
                        $job->amount = $this->request->getData('amount');
                        $job->open = $this->request->getData('open');
                        $job->is_active = $this->request->getData('is_active');
                        $job->created_at = date('Y-m-d H:i:s');
                        $this->Jobs->save($job);
                    }
                }
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $path = 'upload/allfile/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $job->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $job->image = $job->getOriginal('image');
                }
            }
            $job->title = $this->request->getData('title');
            $job->description = $this->request->getData('description');
            $job->amount = $this->request->getData('amount');
            $job->open = $this->request->getData('open');
            $job->is_active = $this->request->getData('is_active');
            $job->updated_at = date('Y-m-d H:i:s');


            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        $job->is_deleted = $job->is_deleted ? 0 : 1;
        if ($this->Jobs->save($job)) {
            $statusText = $job->is_deleted ? 'deleted' : 'restored';
            $this->Flash->success(__('The career has been ' . $statusText . '.'));
        } else {
            $this->Flash->error(__('The career could not be updated. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
