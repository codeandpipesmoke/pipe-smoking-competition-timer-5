<?php
declare(strict_types=1);

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
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use JeffAdmin5\Controller\AppController as JeffAdmin5;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends JeffAdmin5
{
	public $role = [];
	public $competitor_role = [];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

		$this->role = [
			'user' 		 => __('User'), 
			'admin' 	 => __('Adminisztrátor'),
			//'superadmin' => __('Super Adminisztrátor'),
		];		
		$this->set('role', $this->role);

		$this->competitor_role = [
			'user' 		 => __('User'),
			'tablejudge' => __('Tablejudge'), 
			'timekeeper' => __('Timekeeper'), 
			'admin' 	 => __('Adminisztrátor'), 
			//'superadmin' => __('Super Adminisztrátor'),
		];		
		$this->set('competitor_role', $this->competitor_role);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
}
