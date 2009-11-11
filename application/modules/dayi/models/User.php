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
		
	}
	
	public function saveUser($post)
	{
		
	}
	
	protected function _save(Zend_Form $form, array $info, $defaults=array())
	{
		
	}
}

?>