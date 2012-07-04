<?php

class Zend_View_Helper_SetupEditor {
 
    function setupEditor( $textareaId ) {
        return "<script type=\"text/javascript\">
    CKEDITOR.replace( '". $textareaId ."', 
        { toolbar : [ ['PasteText','PasteFromWord'],                      
                      ['Undo','Redo' ],
                      ['JustifyLeft','JustifyCenter','JustifyRight',,'JustifyBlock'], 
                      ['NumberedList','BulletedList','-','Outdent','Indent'],
                      ['RemoveFormat','Source'], 
                      ['Print','SpellChecker', 'Scayt'],
                      ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ],  
                      
                      ['Styles','Format','Font','FontSize','TextColor','BGColor' ],
                      ['Bold','Italic','Underline','Strike'],                                 
                      
                    ], 
            height: 200,
            width: 600 
        }
        );
     
        </script>";
    }
}
