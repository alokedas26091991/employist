<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
       public function index()
    {
        $clients = $this->paginate(
            $this->Clients->find()
                ->where(['is_deleted' => 0])
                ->order(['id' => 'asc'])
        );

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('client'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            // $client = $this->Clients->patchEntity($client, $this->request->getData());
            $images = $this->request->getData('image'); // an array of UploadedFile objects

if (!empty($images) && is_array($images)) {
    foreach ($images as $uploadedFile) {
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $originalName = $uploadedFile->getClientFilename();
            $fileName = time() . '_' . $originalName;
            $uploadPath = WWW_ROOT . 'upload/client/';
            $uploadFile = $uploadPath . $fileName;

            // Move the uploaded file
            $uploadedFile->moveTo($uploadFile);

            // Create a new GalleryImage entity
            $client = $this->Clients->newEmptyEntity();
            $client->image = $fileName;
        
            $client->is_active = $this->request->getData('is_active');
            $client->created_at = date('Y-m-d H:i:s');

            $this->Clients->save($client);
        }
    }

    $this->Flash->success(__('All gallery images have been uploaded.'));
    return $this->redirect(['action' => 'index']);
} else {
    $this->Flash->error(__('Please select at least one image.'));
}
}
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $client = $this->Clients->patchEntity($client, $this->request->getData());
             $path = 'upload/client/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $client->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $client->image = $client->getOriginal('image');
                }
            }
            $client->updated_at = date('Y-m-d H:i:s');
            $client->is_active = $this->request->getData('is_active');

            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $client = $this->Clients->get($id);

        // Toggle is_deleted: if 0 → 1, if 1 → 0
        $client->is_deleted = $client->is_deleted ? 0 : 1;

        if ($this->Clients->save($client)) {
            $statusText = $client->is_deleted ? 'deleted' : 'restored';
            $this->Flash->success(__('The client has been ' . $statusText . '.'));
        } else {
            $this->Flash->error(__('The client could not be updated. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
