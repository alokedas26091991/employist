<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 * @method \App\Model\Entity\Gallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $galleries = $this->paginate($this->Galleries);

        $this->set(compact('galleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => ['GalleryImages'],
        ]);

        $this->set(compact('gallery'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gallery = $this->Galleries->newEmptyEntity();
        if ($this->request->is('post')) {
            // $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            $path = 'upload/gallery/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $gallery->image = $fileName;
                    }
                }
            }
            $gallery->created_at = date('Y-m-d H:i:s');
            $gallery->name = $this->request->getData('name');
            $gallery->description = $this->request->getData('description');
            $gallery->is_active = $this->request->getData('is_active');
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            $path = 'upload/gallery/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $gallery->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $gallery->image = $gallery->getOriginal('image');
                }
            }
            $gallery->updated_at = date('Y-m-d H:i:s');
            $gallery->name = $this->request->getData('name');
            $gallery->description = $this->request->getData('description');
            $gallery->is_active = $this->request->getData('is_active');

            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
