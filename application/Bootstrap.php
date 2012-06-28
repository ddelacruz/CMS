<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initAutoload(){
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                        'namespace'=>'Default',
                        'basePath'=> APPLICATION_PATH.'/modules/default'));
        return $modelLoader;
    }
    
    protected function _initPlugins(){
	$this->bootstrap('frontController');
	$plugin = new My_PluginLayout();
        $this->frontController->registerPlugin($plugin);

	}
}

