<?php

class Admin_LogoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/admin/login');
    }


}

