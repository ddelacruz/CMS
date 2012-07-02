<?php

class Admin_LoginController extends Zend_Controller_Action
{

    public function init()
    {
//        $auth = Zend_Auth::getInstance();
//        if (!$auth->hasIdentity()) {
//           $this->_redirect('/admin/login');
//        }
    }

    public function indexAction()
    {
        $this->view->title = 'Login de Usuario';
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('/admin');
        }

        $request = $this->getRequest();
        $form = new Admin_Form_LoginForm();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $authAdapter = $this->getAuthAdapter();

                $username = $form->getValue('us_nick');
                $password = $form->getValue('us_clave');

                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();

                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);

                    $this->_redirect('/admin');
                } else {
                    $this->view->errorMessage = "Nombre de Usuario o Contraseña invalida.";
                }
            }
        }


        $this->view->form = $form;
    }

    

    public function logoutAction()
    {
       Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/admin/login');
    }

    private function getAuthAdapter()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('usuario')
                    ->setIdentityColumn('us_nick')
                    ->setCredentialColumn('us_clave');

        return $authAdapter;
    }

}



