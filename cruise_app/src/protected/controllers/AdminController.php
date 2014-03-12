<?php

/*
 * This is the account controller responsible for
 * signing in and out of a cms user.
 * could also be used for a user to edit their profile.
 */
class AdminController extends AdminBaseController {
    
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

    /*
     * renders the login view or processes a user login.
     * will redirect to site root if login
     * was successfull.
     */
    public function actionLogin() {

        $this->layout = 'empty';

        if (! app()->user->isGuest) {
            $this->redirect('/');
        }
        $model = new AdminLoginForm;

        if (isset($_POST['AdminLoginForm'])) {
            
            $model->attributes = $_POST['AdminLoginForm'];
            if ($model->validate()) {
                $model->login();
                $this->redirect(Yii::app()->user->returnUrl ?: '/');
            }
        }
        $this->render('login', array('model' => $model));
    }

    /*
     * signs out the currently signed-in user.
     * redirects to site root.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect("/");
    }
}