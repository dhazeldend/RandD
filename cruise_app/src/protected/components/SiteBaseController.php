<?php

/**
 * Admin base controller class.
 */
class SiteBaseController extends CController {
    
    public $layout = 'admin';
    public $menu = array();
    public $controller;
    public $route;

    public function init() {
        parent::init();
        // set route(s) 
        $this->controller = Yii::app()->controller->getId();
        $this->route = Yii::app()->request->requestUri;
        
        // Bootstrap
        // cs()->registerScriptFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', CClientScript::POS_END);
        // cs()->registerCssFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css');
        // // BlockUI
        // cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js', CClientScript::POS_END);
        // // Select2
        // cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.js', CClientScript::POS_END);
        // cs()->registerCssFile('//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css');
        // // Local scripts
        // cs()->registerCssFile(asset('/css/admin.css'));
        // cs()->registerScriptFile(asset('/js/modalex.js'), CClientScript::POS_END);
        // // includes for yii
        // cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery-browser/0.0.5/jquery.browser.min.js?v=1', CClientScript::POS_END);
        // cs()->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery.ba-bbq/1.2.1/jquery.ba-bbq.min.js?v=1', CClientScript::POS_END);
    }

    public function arg($name, $required = false) {

        $var = Yii::app()->request->getParam($name);

        if ($required) {
            // Tools::assert($var, 400, $name . ' is required.');
        }
        return $var;
    }
}