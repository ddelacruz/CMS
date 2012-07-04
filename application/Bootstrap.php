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
        
    protected function _initRouters()
        {
        $router = Zend_Controller_Front::getInstance()->getRouter(); 
//        $route = new Zend_Controller_Router_Route(
//            ':action/*',
//            array(
//                //'module'    => 'default',
//                'controller' => 'index',
//                'action' => 'index'
//                )
//            );		
//        $router->addRoute('default', $route);
        
        /* router module default */
        $router->addRoute('default',
                new Zend_Controller_Router_Route('/:url', array(
                    'url'=>':url',
                    'module'    => 'default',
                    'controller' => 'index',
                    'action' => 'index'                
                    ))
                );

            $router->addRoute('default2',
                new Zend_Controller_Router_Route('/:preurl/:url', array(
                    'preurl'=>'',
                    'url'=>'',
                    'module'    => 'default',
                    'controller' => 'index',
                    'action' => 'index'                
                ))
            );

            $router->addRoute('default3',
                new Zend_Controller_Router_Route('/:preurl/:url/:u', array(
                    'preurl'=>'',
                    'url'=>'',
                    'u' =>'',
                    'module'    => 'default',
                    'controller' => 'index',
                    'action' => 'index'
                    ))
                );        
        /* FIN router module default */
        $route = new Zend_Controller_Router_Route(
            'admin/*',
        array(
            'module' => 'admin'
            )
        ); 
        $router->addRoute('admin', $route);
        
        $route = new Zend_Controller_Router_Route(
            'admin/:controller/*',
            array(
                'module' => 'admin',
//                'controller'=> '',
//                'action'    => ''
            )
        ); 
        $router->addRoute('admin1', $route);
        $route = new Zend_Controller_Router_Route(
            'admin/:controller/:action/*',
            array(
                'module' => 'admin',
//                'controller'=> '',
//                'action'    => ''
            )
        ); 
        $router->addRoute('admin2', $route);
    }
}

