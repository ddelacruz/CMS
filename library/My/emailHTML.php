<?php

class My_emailHTML extends Zend_Mail{
    
//    public function nuevoEnvioEmail(array $array){
//       // print_r($array);
//     echo   '<table>';
//        foreach ($array as $a):
//          echo  '<tr>';
//          echo      '<td>';
//                    echo $a[0];
//          echo      '<td>';
//                    echo $a[1];
//           echo     '</td>';
//           echo     '<td>';
//          echo  '</tr>';
//        endforeach;
//      echo  '</table>';
//    }
    static $fromName = "Sistema Control de Precintos";

    static $fromEmail = "operativo@avmaduanera.com.pe";
    
    /**
     *
     * @var Zend_View
     */
    static $_defaultView;

    /**
     * current instance of our Zend_View
     * @var Zend_View
     */
    protected $_view;

    protected static function getDefaultView()
    {
        if(self::$_defaultView === null)
        {
            self::$_defaultView = new Zend_View();
            self::$_defaultView->setScriptPath(APPLICATION_PATH .
                    '/views/scripts/mails');
            var_dump(self::$_defaultView->setScriptPath(APPLICATION_PATH .
                    '/views/scripts/mails'));
        }
        return self::$_defaultView;
    }

    public function sendHtmlTemplate($template, $encoding = Zend_Mime::ENCODING_QUOTEDPRINTABLE)
    {
        $html = $this->_view->render($template);
        $this->setBodyHtml($html,$this->getCharset(), $encoding);
        $this->send();
    }

    public function setViewParam($property, $value)
    {
        $this->_view->__set($property, $value);
        return $this;
    }

    public function __construct($charset = 'iso-8859-1')
    {
        parent::__construct($charset);
        $this->setFrom(self::$fromEmail, self::$fromName);
        $this->_view = self::getDefaultView();
    }

}
