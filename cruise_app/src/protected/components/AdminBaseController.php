<?php

/**
 * Admin base controller class.
 */
class AdminBaseController extends CController {
    
    public $layout='admin';
    public $menu=array();

    public function init() {
        parent::init();
        $assetUrl = app()->getModule('redactor')->assetUrl;
        cs()->registerCoreScript('jquerybrowser');
        cs()->registerCoreScript('select2');
        cs()->registerScriptFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js', CClientScript::POS_END);
        cs()->registerCssFile('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css');
        cs()->registerCssFile($assetUrl.'/css/admin.css');
        cs()->registerScriptFile($assetUrl.'/js/jquery.blockUI.js', CClientScript::POS_END);
        cs()->registerScriptFile($assetUrl.'/js/modalex.js', CClientScript::POS_END);
    }
}