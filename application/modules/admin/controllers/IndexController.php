<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
       $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
           $this->_redirect('/admin/login');
        }
    }

    public function indexAction()
    {
        // action body
    }


}

