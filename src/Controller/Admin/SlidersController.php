<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 */
class SlidersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sliders = $this->paginate($this->Sliders);

        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEmptyEntity();
        if ($this->request->is('post')) {
            // $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
            $path = 'upload/slider/';

            if ($_FILES['photo']['name']) {
                $file_tmpname = $_FILES['photo']['tmp_name'];
                $file_name = $_FILES['photo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $slider->photo = $fileName;
                    }
                }
            }
            $slider->name = $this->request->getData('name');
            $slider->sort_order = $this->request->getData('sort_order');
            $slider->created_by = $this->Auth->user('id');
            $slider->create_date = date('Y-m-d');

            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The slider could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $slider1 = $this->Sliders->patchEntity($slider, $this->request->getData());

            $path = 'upload/slider/';

            if ($_FILES['photo']['name']) {
                $file_tmpname = $_FILES['photo']['tmp_name'];
                $file_name = $_FILES['photo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $slider->photo = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $slider->photo = $slider->getOriginal('photo');
                }
            }
            $slider->name = $this->request->getData('name');
            $slider->sort_order = $this->request->getData('sort_order');
            $slider->created_by = $this->Auth->user('id');
            $slider->create_date = date('Y-m-d');

            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The slider could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
