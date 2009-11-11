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
		$this->view->userForm = $this->getUserForm();
	}
	
	/**
	 * The default action - show the home page
	 */
	public function indexAction() 
	{
		$userId = 11;
		$this->view->user = $this->_model->getUserById($userId);
		$this->view->userForm = $this->getUserForm()->populate($this->view->user->toArray());
	}
	
	public function saveAction() 
	{
		$request = $this->getRequest();
		
		if (!$request->isPost())
		{
			return $this->_helper->redirector('index');
		}
		
		if (false === $this->_model->saveUser($request->getPost()))
		{
			return $this->render('index');
		}
	}
	
	public function getUserForm()
	{
		$urlHelper = $this->_helper->getHelper('url');
		
		$this->_forms['userEdit'] = $this->_model->getForm('userEdit');
		$this->_forms['userEdit']->setAction($urlHelper->url(array(
			'controller'	=> 'user',
			'action'		=> 'save',
			),
			'default'
		));
		
		$this->_forms['userEdit']->setMethod('post');
		return $this->_forms['userEdit'];
	}
}

