<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * StaticPages Controller
 *
 * @property \App\Model\Table\StaticPagesTable $StaticPages
 * @method \App\Model\Entity\StaticPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaticPagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $staticPages = $this->paginate($this->StaticPages);

        $this->set(compact('staticPages'));
    }

    /**
     * View method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('staticPage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staticPage = $this->StaticPages->newEmptyEntity();
        if ($this->request->is('post')) {
            // $staticPage = $this->StaticPages->patchEntity($staticPage, $this->request->getData());
            $path = 'upload/page/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $staticPage->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $staticPage->image = $staticPage->getOriginal('image');
                }
            }
            // $staticPage->created_at = date('Y-m-d H:i:s');
            $staticPage->page_name = $this->request->getData('page_name');
             $staticPage->description = $this->request->getData('description');
             $staticPage->title = $this->request->getData('title');
$staticPage->section = $this->request->getData('section');
$staticPage->details = $this->request->getData('details');
            if ($this->StaticPages->save($staticPage)) {
                $this->Flash->success(__('The static page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The static page could not be saved. Please, try again.'));
        }
        $this->set(compact('staticPage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $staticPage = $this->StaticPages->patchEntity($staticPage, $this->request->getData());
             $path = 'upload/page/';

            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $staticPage->image = $fileName;
                    }
                } else {
                    // If no new file uploaded, retain the existing photo
                    $staticPage->image = $staticPage->getOriginal('image');
                }
            }
            // $staticPage->created_at = date('Y-m-d H:i:s');
            $staticPage->page_name = $this->request->getData('page_name');
             $staticPage->description = $this->request->getData('description');
             $staticPage->title = $this->request->getData('title');
               $staticPage->section = $this->request->getData('section');
               $staticPage->details = $this->request->getData('details');
            if ($this->StaticPages->save($staticPage)) {
                $this->Flash->success(__('The static page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The static page could not be saved. Please, try again.'));
        }
        $this->set(compact('staticPage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staticPage = $this->StaticPages->get($id);
        if ($this->StaticPages->delete($staticPage)) {
            $this->Flash->success(__('The static page has been deleted.'));
        } else {
            $this->Flash->error(__('The static page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
