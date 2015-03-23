<?php
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
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf'); // Enable Csrf protection
        $this->loadComponent('Auth', [
            'authenticate'   => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'authorize'      => 'Controller',
            'loginRedirect'  => [
                'controller' => 'Pages',
                'action'     => 'display',
                'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action'     => 'display',
                'home'
            ]
        ]);

        if ($this->Auth)
            $this->set('userDetails', $this->Auth->user());

    }

    public function isAuthorized($user)
    {
        // Controller access for jobseekers
        if (in_array($this->request->controller, ['Jobseekers'])
            AND $this->Auth->user('role') == 'jobseeker'
        ) {
            return (bool) $this->Auth->user('role') == 'jobseeker';
        }
        // Controller access for employers
        if (in_array($this->request->controller, ['Employers'])
            AND $this->Auth->user('role') == 'employer'
        ) {
            return (bool) $this->Auth->user('role') == 'employer';
        }

        return false;
    }
}
