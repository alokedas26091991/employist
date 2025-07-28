<?php

declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Cake\I18n\FrozenTime;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index()
    {
        $pdfpagecontentTable = TableRegistry::getTableLocator()->get('StaticPages');
        $pdfpagecontent1 = $pdfpagecontentTable->find()->where(['page_name' => 1,'section' => 1])->first();
          $pdfpagecontent2 = $pdfpagecontentTable->find()->where(['page_name' => 1,'section' => 2])->first(); 
        $this->set(compact('pdfpagecontent1','pdfpagecontent2'));



        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Home", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));

        $serviceTbl = TableRegistry::getTableLocator()->get('Services');
        $events = $serviceTbl->find()->where(['id' => 1])->all();
        $this->set(compact('events'));

        $promotions = $serviceTbl->find()->where(['id' => 2])->all();
        $this->set(compact('promotions'));

        $exhibitions  = $serviceTbl->find()->where(['id' => 3])->all();
        $this->set(compact('exhibitions'));

        $signages  = $serviceTbl->find()->where(['id' => 4])->all();
        $this->set(compact('signages'));

        $ClientsObj = TableRegistry::getTableLocator()->get('Clients');
        $client = $ClientsObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('client'));


        $test = TableRegistry::getTableLocator()->get('Testimonials');
        $testimonial = $test->find("all", [
            "order" => ["sort_order" => "asc"]
        ])->where(['is_deleted' => "0", 'is_active' => 1]);

        $this->set(compact('testimonial'));
    }
    public function about()
    {

        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "About", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));

        $test = TableRegistry::getTableLocator()->get('Testimonials');
        $testimonial = $test->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('testimonial'));

        $pdfpagecontentTable = TableRegistry::getTableLocator()->get('StaticPages');
        $pdfpagecontent1 = $pdfpagecontentTable->find()->where(['page_name' => 2,'section' => 1])->first();
        $pdfpagecontent2 = $pdfpagecontentTable->find()->where(['page_name' => 2,'section' => 2])->all();
        $pdfpagecontent3 = $pdfpagecontentTable->find()->where(['page_name' => 2,'section' => 3])->all();
        $this->set(compact('pdfpagecontent1','pdfpagecontent2','pdfpagecontent3'));
    }

    public function service()
    {
        $galleryTbl = TableRegistry::getTableLocator()->get('Galleries');
        $events = $galleryTbl->find()->where(['id' => '1'])->first();
        $this->set(compact('events'));
        $promotion = $galleryTbl->find()->where(['id' => '2'])->first();
        $this->set(compact('promotion'));
        $exhibition = $galleryTbl->find()->where(['id' => '3'])->first();
        $this->set(compact('exhibition'));
        $signages = $galleryTbl->find()->where(['id' => '4'])->first();
        $this->set(compact('signages'));

        $ClientsObj = TableRegistry::getTableLocator()->get('Clients');
        $client = $ClientsObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('client'));

        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Services", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }

    public function gallery()
    {
        $branchObj = TableRegistry::getTableLocator()->get('Galleries');
        $gallery = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('gallery'));



        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Gallery", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }



    public function details($slug = null)
    {

        $galleriesTable = TableRegistry::getTableLocator()->get('Galleries');
        $gallery = $galleriesTable->find()->where(['slug' => $slug, 'is_active' => 1, 'is_deleted' => 0])->first();

        $galleryImagesTable = TableRegistry::getTableLocator()->get('GalleryImages');
        $images = $galleryImagesTable->find()->where(['gallery_id' => $gallery->id, 'is_active' => 1, 'is_deleted' => 0]);

        $this->set(compact('images', 'gallery'));
    }



    public function promotion()
    {
        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Promotions", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }

    public function signage()
    {
        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Signages", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }

    public function event()
    {
        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Events", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }
    public function exhibition()
    {
        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Exhibition Furniture Fixtures", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));
    }

    public function contact()
    {
        $socialTable = TableRegistry::getTableLocator()->get('Socials');
        $social = $socialTable->find()->first();
        $this->set(compact('social'));

        $branchObj = TableRegistry::getTableLocator()->get('Sliders');
        $page = $branchObj->find("all", [
            "order" => ["id" => "asc"]
        ])->where(['name' => "Contact Us", 'is_deleted' => "0", 'is_active' => 1]);
        $this->set(compact('page'));


        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {
                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $mobile = $this->request->getData('mobile');
                $message = $this->request->getData('message');
                $admin_email = 'support@febino.in';
                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(8, $admin_email, ['name' => $name, 'email' => $email, 'mobile' => $mobile, 'message' => $message]);
                $this->Flash->error(__('We have received your Enquiry'));
            }
        }
    }


    public function enquiry()
    {
        $enquiriesTable = TableRegistry::getTableLocator()->get('Enquiries');
        $contactForm = $enquiriesTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Optional validation: block submission if purpose is empty
            if (empty($data['purpose'])) {
                $this->Flash->error(__('Please select a valid purpose.'));
                return $this->redirect($this->referer());
            }

            // Create entity with submitted data
            $contactForm = $enquiriesTable->patchEntity($contactForm, $data);

            // Set timestamps (if not handled by Table behavior)
            $contactForm->created_at = FrozenTime::now();
            $contactForm->updated_at = FrozenTime::now();

            if ($enquiriesTable->save($contactForm)) {
                $this->Flash->success(__('We have received your enquiry.'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index', '?' => ['submitted' => 'true']]);
            }

            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }

        $this->set(compact('contactForm'));
    }


    public function career()
    {
        $enquiriesTable = TableRegistry::getTableLocator()->get('Careers');
        $contactForm = $enquiriesTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $path = 'upload/career/';

            if ($_FILES['resume']['name']) {
                $file_tmpname = $_FILES['resume']['tmp_name'];
                $file_name = $_FILES['resume']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $contactForm->resume = $fileName;
                    }
                }
            }
            $contactForm->name = $this->request->getData('name');
            $contactForm->phone = $this->request->getData('phone');
            $contactForm->email = $this->request->getData('email');
            $contactForm->message = $this->request->getData('message');
            $contactForm->created_at = FrozenTime::now();
            $contactForm->updated_at = FrozenTime::now();

            if ($enquiriesTable->save($contactForm)) {
                $this->Flash->success(__('We have received your career form'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index', '?' => ['submitted' => 'true']]);
            }

            $this->Flash->error(__('The career form could not be saved. Please, try again.'));
        }

        $this->set(compact('contactForm'));
    }
}
