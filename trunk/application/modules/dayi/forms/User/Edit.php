<?php

class Dayi_Form_User_Edit extends Dayi_Form_User_Register
{
	public function init()
	{
		parent::init();
		
		$this->getElement('password')->setRequired(false);
		$this->getElement('passwordVerify')->setRequired(false);
		$this->getElement('submit')->setLabel('保存');
	}
}

?>