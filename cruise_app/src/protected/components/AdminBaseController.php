<?php

/**
 * Admin base controller class.
 */
class AdminBaseController extends CController {
    
    public $layout = 'admin';
    public $menu = array();
    public $controller;
    public $route;

    public function init() {
        parent::init();
        // set route(s) 
        $this->controller = Yii::app()->controller->getId();
        $this->route = Yii::app()->request->requestUri;
        
        // check user is logged in 
        if (app()->user->isGuest && $this->route != '/admin/login') {
            if (app()->request->isAjaxRequest) {
                // Set the return url to the home page when your authenticated session expires and an ajax request is made
                // This prevents redirect loop.
                app()->user->returnUrl = '/';
                // raise an error to show that the user is logged out.                    
                throw new CHttpException(401, 'You are not authorized to perform this action.');
            } else {
                // redirect to the login screen.
                app()->controller->redirect(Yii::app()->user->loginUrl);
            }
        }
        
        // Bootstrap
        cs()->registerScriptFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', CClientScript::POS_END);
        cs()->registerCssFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css');
        // BlockUI
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js', CClientScript::POS_END);
        // Select2
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.js', CClientScript::POS_END);
        cs()->registerCssFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css');
        // Local scripts
        cs()->registerCssFile(asset('/css/admin.css'));
        cs()->registerScriptFile(asset('/js/modalex.js'), CClientScript::POS_END);
        // includes for yii
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery-browser/0.0.5/jquery.browser.min.js?v=1', CClientScript::POS_END);
        cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery.ba-bbq/1.2.1/jquery.ba-bbq.min.js?v=1', CClientScript::POS_END);
    }
}