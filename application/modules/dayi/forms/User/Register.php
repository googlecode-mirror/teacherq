<?php

class Dayi_Form_User_Register extends Dayi_Form_User_Base
{
	public function init()
	{
		parent::init();
		
		//$this->removeElement('userId');
		$this->getElement('submit')->setLabel('注册');
	}
}

?>