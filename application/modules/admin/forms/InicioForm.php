<?php

class Admin_Form_InicioForm extends Zend_Form
{
    public $elementDecorators = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        array('HtmlTag', array('tag' => 'div', 'class'=>'controls')),
    );
    public $elementDecorators1 = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        
    );
    public $elementDecorators2 = array(
        'File',
        'Errors',
        array('HtmlTag', array('tag' => 'div', 'class'=>'controls')),
    );
    public function __construct($options=null) {
        parent::__construct($options);
            $this->setDisableLoadDefaultDecorators(true);
           
            $this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'form/_inicio.phtml'),array('File')),
            'Form'
            ));        
            $this->setMethod('post');         
            $this->setAttrib('class', 'form-horizontal');
            $this->setAttrib('enctype', 'multipart/form-data');
             
                        
            $this->addElement('text','empresa',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span8'
            ));
            $this->addElement('select','documento',array(
                'decorators'=> $this->elementDecorators1,
                'class' =>  'input-small inline'
            ));
            $this->addElement('text','numdocumento',array(
                'decorators'=> $this->elementDecorators1,
                'class' =>  'input-small inline'
            ));
            
            $this->addElement('text','aniversario',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span2'
            ));
            $this->addElement('file','logo',array(    
                'decorators'=> $this->elementDecorators2,
                 'class'    =>'input-file' ,
                'destination' => APPLICATION_PATH . '/../public/images/logo',  
            ));
           
             $this->addElement('text','dominio',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span5'
            ));
             $this->addElement('text','titulo',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span8'
            ));
             
             $this->addElement('textarea','descripcion',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span12',
                 'rows' => 3
            ));
             $this->addElement('textarea','keywords',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span12',
                 'rows' => 3
            ));
             $this->addElement('textarea','footer',array(
                'decorators'=> $this->elementDecorators,
                'class' =>  'span12',
                 'rows' => 3
            ));
             
           
         
           
    }


}

