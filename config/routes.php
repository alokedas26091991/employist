<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Home', 'action' => 'index', 'home']);
			 $builder->connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	 $builder->connect('/contact', ['controller' => 'Home', 'action' => 'contact', 'prefix' => FALSE]);
     $builder->connect('/about-us', ['controller' => 'Home', 'action' => 'about', 'prefix' => FALSE]);
     $builder->connect('/jobs', ['controller' => 'Home', 'action' => 'job', 'prefix' => FALSE]);
	 $builder->connect('/privacy-policy', ['controller' => 'Home', 'action' => 'privacy', 'prefix' => FALSE]);
	 $builder->connect('/refund-policy', ['controller' => 'Home', 'action' => 'refund', 'prefix' => FALSE]);
	 $builder->connect('/terms-and-conditions', ['controller' => 'Home', 'action' => 'terms', 'prefix' => FALSE]);
	 $builder->connect('/shipping-and-delivery', ['controller' => 'Home', 'action' => 'shipping', 'prefix' => FALSE]);
	
	 
	 $builder->connect('paper/*', array('controller' => 'Examinations', 'action' => 'index'));
	 
	 $builder->setExtensions(['pdf']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });
$routes->prefix('admin', function (RouteBuilder $builder) {
	//$routes->connect('', ['controller' => 'Users', 'action' => 'login', 'prefix' => 'admin']);
   	 $builder->connect('/', ['controller' => 'Users', 'action' => 'login','prefix'=>'Admin']);
    $builder->connect('/admin/registration', ['controller' => 'Users', 'action' => 'registration','prefix' => 'admin']);
	$builder->connect('/admin/logout', ['controller' => 'Users', 'action' => 'logout','prefix' => 'admin']);
    //Router::connect('/api/login', ['controller' => 'Users', 'action' => 'token', 'prefix' => 'api']);
	
	
	//$routes->connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    $builder->fallbacks('InflectedRoute');
});
$routes->prefix('api', function (RouteBuilder $builder) {
   
    $builder->setExtensions(['json','xml']);
    $builder->resources('Recipes');
    $builder->fallbacks('DashedRoute');
});
    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
