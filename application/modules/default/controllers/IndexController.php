<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if(!$this->_getParam('url')){
            $this->view->title = 'Index Modulo Default';
        }else{
            $this->view->title = $this->_getParam('url');
        }
        
    }
    
    
    


}

