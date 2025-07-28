<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 */
class TestimonialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sliders = $this->paginate($this->Testimonials);

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
        $slider = $this->Testimonials->get($id, [
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
        $slider = $this->Testimonials->newEmptyEntity();
        if ($this->request->is('post')) {
            $slider = $this->Testimonials->patchEntity($slider, $this->request->getData());
			
			$slider->entry_by=$this->Auth->user('id');
			$slider->dt=date('Y-m-d');
            
            if(file_exists($_FILES['pic']['tmp_name']))
			{
				
			$file = $this->request->getUploadedFiles();

			$slider->photo = $file['pic']->getClientFilename();
			$file['pic']->moveTo(WWW_ROOT . 'testimonial' . DS . $slider->photo);
			}
			else
			{
				$slider->photo="";
			}
            
            if ($this->Testimonials->save($slider)) {
                $this->Flash->success(__('The Testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Testimonial could not be saved. Please, try again.'));
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
        $slider = $this->Testimonials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slider1 = $this->Testimonials->patchEntity($slider, $this->request->getData());
            
            if(file_exists($_FILES['pic']['tmp_name']))
			{
				
			$file = $this->request->getUploadedFiles();

			$slider->photo = $file['pic']->getClientFilename();
			$file['pic']->moveTo(WWW_ROOT . 'testimonial' . DS . $slider->photo);
			}
			else
			{
				$slider->photo=$slider->photo;
			}
            
            if ($this->Testimonials->save($slider1)) {
                $this->Flash->success(__('The Testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Testimonial could not be saved. Please, try again.'));
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
        $slider = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($slider)) {
            $this->Flash->success(__('The Testimonial has been deleted.'));
        } else {
            $this->Flash->error(__('The Testimonial could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
