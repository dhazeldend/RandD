<?php

/**
 * Admin base controller class.
 */
class AdminBaseController extends CController {
    
    public $layout='admin';
    public $menu=array();

    public function init() {
        parent::init();
        
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