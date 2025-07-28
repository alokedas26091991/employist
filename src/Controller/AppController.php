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

use Cake\Controller\Controller;

use Cake\Cache\Cache;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    protected $_display_meta;

    public function initialize(): void
    {
        parent::initialize();


        $this->_display_meta = FALSE;

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->viewBuilder()->setLayout('layout_site');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',
                    ],
                    'finder' => 'active', // Custom finder method
                ],
            ],
            'loginRedirect' => [
                'controller' => 'Home',
                'action' => 'index',
                'prefix' => false,
                'plugin' => false,
            ],
            'logoutRedirect' => [
                'controller' => 'Home',
                'action' => 'index',
                'prefix' => false,
            ],
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'index',
                'prefix' => false,
                'plugin' => false,
            ],
        ]);

        $this->Auth->autoRedirect = true;
        $this->Auth->allow();
    }





    public function beforeRender(EventInterface $event)
    {
        $socialTable = TableRegistry::getTableLocator()->get('Socials');
        $social = $socialTable->find()->first();
        $this->set(compact('social'));
    }






    protected function setMeta($object, $type = TRUE)
    {


        $_display_meta = true;
        $robot = 'index,follow';

        //print_r($object->name);

        if ($type) {

            $this->set('meta_title', $object->meta_title);
            $this->set('meta_keywords', $object->meta_keywords);
            $this->set('meta_desc', $object->meta_desc);
            $this->set('canonical', $object->canonical);

            $this->set('title', $object->name);
            $this->set('desc', $object->introduction);
            $this->set('image', $object->photo);
            $this->set('slug', $object->slug);
            if (!empty($object->robots)) {
                $this->set('robot', $object->robots);
            } else {
                $this->set('robot', $robot);
            }
        } else {
            $static_pages = \Cake\ORM\TableRegistry::getTableLocator()->get('StaticPages');
            $data = $static_pages->findByPageName($object)->first();

            $this->set('meta_title', $data->meta_title);
            $this->set('meta_keywords', $data->meta_keywords);
            $this->set('meta_desc', $data->meta_desc);
            $this->set('canonical', $data->canonical);

            if (!empty($data->robots)) {
                $this->set('robot', $data->robots);
            } else {
                $this->set('robot', $robot);
            }
        }
    }
}
