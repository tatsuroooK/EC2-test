<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // $this->loadComponent('Auth', [
        //     'authorize' => ['Controller'],
        //     'loginAction' => [
        //         'controller' => 'Auth',
        //         'action' => 'login',
        //     ],
        //     'loginRedirect' => [
        //         'controller' => 'Articles',
        //         'action' => 'index'
        //     ],
        //     'authError' => 'アクセス権限がありません。',
        //     'authenticate' => [
        //         'Form' => [
        //             'userModel' => 'Users',
        //             'fields' => [
        //                 'username' => 'loginid',
        //                 'password' => 'password'
        //             ]
        //         ]
        //     ],
        //     'storage' => 'Session',
        //     'checkAuthIn' => 'Controller.initialize'
        // ]);

        // $this->Auth->allow(['login', 'logout']);
    }

    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);

    //     $user = $this->Auth->user();

    //     if($user) {
    //         $accounts = TableRegistry::getTableLocator()->get('users');
    //         $loginAccount = $accounts->get($user['id']);
    //     }
    // }

    // public function isAuthorized($user = null)
    // {
    //     if (!$this->request->getParam('prefix')) {
    //         return true;
    //     }
    //     return false;
    // }
}
