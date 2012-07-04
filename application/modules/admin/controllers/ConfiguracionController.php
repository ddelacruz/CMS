<?php

class Admin_ConfiguracionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function inicioAction()
    {
        $form = new Admin_Form_InicioForm();
        $this->view->form = $form;
    }


}



