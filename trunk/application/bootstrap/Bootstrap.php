<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public $frontController;
	
	protected function _initLocate()
	{
		$locate = new Zend_Locale('zh_CN');
		Zend_Registry::set('Zend_Locale', $locate);		
	}
	
	protected function _initViewSettings()
	{
		$this->bootstrap('view');
		
		$this->_view = $this->getResource('view');
		
		$this->_view->setEncoding('UTF-8');
		$this->_view->doctype('XHTML1_STRICT');
		
		$this->_view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
		$this->_view->headMeta()->appendHttpEquiv('Content-Language', 'zh-CN');
		
		$this->_view->headStyle()->setStyle('@import "/css/access.css";');
		$this->_view->headLink()->appendStylesheet('/css/reset.css');
		$this->_view->headLink()->appendStylesheet('/css/main.css');
		$this->_view->headLink()->appendStylesheet('/css/form.css');
		
		$this->_view->headTitle('教师圈');
		
		$this->_view->headTitle()->setSeparator(' - ');
	}

}

