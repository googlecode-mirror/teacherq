<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public $_logger;
	
	public $frontController;
	
	public $_resourceLoader;
	
	protected function _initLoggin()
	{
		$this->bootstrap('frontController');
		$logger = new Zend_Log();
		
		$writer = 'production' == $this->getEnvironment() ? new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../data/logs/app.log') : new Zend_Log_Writer_Firebug();
		$logger->addWriter($writer);
		
		if ('production' == $this->getEnvironment())
		{
			$filter = new Zend_Log_Filter_Priority(Zend_Log::CRIT);
			$logger->addFilter($filter);
		}
		$this->_logger = $logger;
		Zend_Registry::set('log', $logger);		
	}
	
	protected function _initLocate()
	{
		$this->_logger->info('Bootstrap ' . __METHOD__);
		
		$locate = new Zend_Locale('zh_CN');
		Zend_Registry::set('Zend_Locale', $locate);		
	}
	
	protected function _initDefaultModuleAutoloader()
	{
		$this->_logger->info('Bootstrap ' . __METHOD__);
		
		$this->_resourceLoader = new Zend_Application_Module_Autoloader(array(
				'namespace' => 'Dayi',
				'basePath' => APPLICATION_PATH . '/modules/dayi',
			)
		);
		
		$this->_resourceLoader->addResourceTypes(array(
			'modelResource' => array(
				'path'	=> 'models/Resource',
				'namespace'	=> 'Resource',
			),
			'service' => array(
				'path' => 'services',
				'namespace' => 'Service',
			),
		));
	}
	
	protected function _initDbProfiler()
	{
		$this->_logger->info('Bootstrap ' . __METHOD__);
		
		if ('production' !== $this->getEnvironment())
		{
			$this->bootstrap('db');
			$profiler = new Zend_Db_Profiler_Firebug('All DB Queries');
			$profiler->setEnabled(true);
			$this->getPluginResource('db')
				->getDbAdapter()
				->setProfiler($profiler);
		}
	}
	
	protected function _initViewSettings()
	{
		$this->_logger->info('Bootstrap ' . __METHOD__);
		
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

