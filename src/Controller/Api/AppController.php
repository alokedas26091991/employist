<?php
declare(strict_types=1);
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends Controller{
    
   // use \Crud\Controller\ControllerTrait;

     public function initialize(): void {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        /**$this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ]);***/
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.is_deleted' => 0],
					'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ],
						
                'userModel'=>'Users'
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.is_deleted' => 0],
                    'fields' => [
                        'username' => 'id'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);
    }
	
}