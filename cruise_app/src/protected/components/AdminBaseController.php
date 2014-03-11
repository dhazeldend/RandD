<?php

/**
 * Admin base controller class.
 */
class AdminBaseController extends CController {
    
    public $layout='admin';
    public $menu=array();

    public function init() {
        parent::init();
        
        // check user is logged in 
        if (Yii::app()->user->isGuest && Yii::app()->request->requestUri != "/account/login") {
            if (Yii::app()->request->isAjaxRequest) {
                // Set the return url to the home page when your authenticated session expires and an ajax request is made
                // This prevents redirect loop.
                Yii::app()->user->returnUrl = "/";
                
                // raise an error to show that the user is logged out.                    
                throw new CHttpException(401, "You are not authorized to perform this action.");
            } else {
                // redirect to the login screen.
                Yii::app()->controller->redirect(Yii::app()->user->loginUrl);
            }               
        }
        
        // Bootstrap
        cs()->registerScriptFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', CClientScript::POS_END);
        cs()->registerCssFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css');
        // BlockUI
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js');
        // Select2
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.js');
        cs()->registerCssFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css');
        // Local scripts
        cs()->registerCssFile(asset('/css/admin.css'));
        cs()->registerScriptFile(asset('/js/modalex.js'), CClientScript::POS_END);
        //cs()->registerCoreScript('jquerybrowser');
    }
}