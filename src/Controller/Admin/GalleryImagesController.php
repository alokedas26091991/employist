<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * GalleryImages Controller
 *
 * @property \App\Model\Table\GalleryImagesTable $GalleryImages
 * @method \App\Model\Entity\GalleryImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleryImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Galleries'],
        ];
        $galleryImages = $this->paginate($this->GalleryImages);

        $this->set(compact('galleryImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galleryImage = $this->GalleryImages->get($id, [
            'contain' => ['Galleries'],
        ]);

        $this->set(compact('galleryImage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galleryImage = $this->GalleryImages->newEmptyEntity();
        if ($this->request->is('post')) {
            // $galleryImage = $this->GalleryImages->patchEntity($galleryImage, $this->request->getData());
            $path = 'upload/gallery/';
          $images = $this->request->getData('image'); // an array of UploadedFile objects

if (!empty($images) && is_array($images)) {
    foreach ($images as $uploadedFile) {
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $originalName = $uploadedFile->getClientFilename();
            $fileName = time() . '_' . $originalName;
            $uploadPath = WWW_ROOT . 'upload/gallery/';
            $uploadFile = $uploadPath . $fileName;

            // Move the uploaded file
            $uploadedFile->moveTo($uploadFile);

            // Create a new GalleryImage entity
            $galleryImage = $this->GalleryImages->newEmptyEntity();
            $galleryImage->image = $fileName;
            $galleryImage->gallery_id = $this->request->getData('gallery_id');
            $galleryImage->is_active = $this->request->getData('is_active');
            $galleryImage->created_at = date('Y-m-d H:i:s');

            $this->GalleryImages->save($galleryImage);
        }
    }

    $this->Flash->success(__('All gallery images have been uploaded.'));
    return $this->redirect(['action' => 'index']);
} else {
    $this->Flash->error(__('Please select at least one image.'));
}

        }
        $galleries = $this->GalleryImages->Galleries->find('list', ['limit' => 200])->all();
        $this->set(compact('galleryImage', 'galleries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galleryImage = $this->GalleryImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $galleryImage = $this->GalleryImages->patchEntity($galleryImage, $this->request->getData());
            $path = 'upload/gallery/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $galleryImage->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $galleryImage->image = $galleryImage->getOriginal('image');
                }
            }
            $galleryImage->updated_at = date('Y-m-d H:i:s');
            $galleryImage->gallery_id = $this->request->getData('gallery_id');
            $galleryImage->is_active = $this->request->getData('is_active');

            if ($this->GalleryImages->save($galleryImage)) {
                $this->Flash->success(__('The gallery image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery image could not be saved. Please, try again.'));
        }
        $galleries = $this->GalleryImages->Galleries->find('list', ['limit' => 200])->all();
        $this->set(compact('galleryImage', 'galleries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galleryImage = $this->GalleryImages->get($id);
        if ($this->GalleryImages->delete($galleryImage)) {
            $this->Flash->success(__('The gallery image has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
