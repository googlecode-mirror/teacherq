<?php

class Dayi_Form_User_Base extends Zend_Form
{
	public function init()
	{
		$this->addElementPrefixPath(
			'Dayi_Validate',
			APPLICATION_PATH . '/modules/dayi/models/validate/',
			'validate'
		);
		
		$this->addElement('text', 'username', array(
			'filters'	=> array('StringTrim'),
			'validators' => array(array('StringLength',true)),
			'required'	=> true,
			'label'	=> '用户名',
		));
		
		$this->addElement('password', 'password', array(
			'filters' => array('StringTrim'),
			'validators' => array(array('StringLength', true, array(6, 20))),
			'required' => true,
			'label'	=> '密码',
		));
		
		$this->addElement('password', 'passwordVerify', array(
			'filters'	=> array('StringTrim'),
			//'validators' => array('PasswordVerification'),
			'required' 	=> true,
			'label'		=> '确认密码',
		));
		
		$this->addElement('submit', 'submit', array(
			'required'	=> false,
			'ignore'	=> true,
		));
	}
}

?>