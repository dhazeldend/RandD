<?php

class SiteController extends SiteBaseController
{
	public $layout='main';

	public function actionIndex() {

		echo 'test';
	}

	public function actionError() {
        if ($error = app()->errorHandler->error) {
            if (app()->request->isAjaxRequest)
                echo $error['message'];
            else {
                $error_view = 'error';
                // render custom error views for 400, 403, 404, 500 errors
                if(in_array($error['code'], array('400','403','404','500'))) {
                    $error_view .= $error['code'];
                }
                $this->render($error_view, $error);
            }
        }
    }
}
