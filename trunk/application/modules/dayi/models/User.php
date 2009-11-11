<?php

class Dayi_Model_User extends DY_Model_Abstract  
{
	public function getUserById($id)
	{
		$id = (int) $id;
		return $this->getResource('User')->getUserById($id);
		
	}
	
	public function getUserByEmail($email, $ignoreUser=null)
	{
		return $this->getResource('User')->getUserByEmail($email, $ignoreUser);
	}
	
	public function registerUser($post)
	{
		$form = $this->getForm('userRegister');
		return $this->_save($form, $post, array('role'=>'Register'));
	}
	
	public function saveUser($post)
	{
		$form = $this->getForm('userEdit');
		return $this->_save($form, $post);
	}
	
	protected function _save(Zend_Form $form, array $info, $defaults=array())
	{
		if (!$form->isValid($info))
		{
			return false;
		}
		
		$data = $form->getValues();
		
		if (array_key_exists('passwd', $data) && '' != $data['passwd'])
		{
			
		}
	}
}

?>