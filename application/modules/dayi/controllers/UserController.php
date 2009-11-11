<?php

/**
 * UserController
 * 
 * @author
 * @version 
 */

class Dayi_UserController extends Zend_Controller_Action 
{
	protected $_model;
	
	public function init()
	{
		$this->_model = new Dayi_Model_User();
				
		$this->view->registerForm = null;
		$this->view->loginForm = null;
		$this->view->userForm = null;
	}
	
	/**
	 * The default action - show the home page
	 */
	public function indexAction() 
	{
		$userId = 1;
		$this->view->user = $this->_model->getUserById($userId);
		$this->view->userForm = $this->getUserForm()->populate($this->view->user->toArray());
	}

}

