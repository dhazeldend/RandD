<?php

/*
 * This is the account controller responsible for
 * signing in and out of a cms user.
 * could also be used for a user to edit their profile.
 */
class AccountController extends CController {

    /*
     * renders the login view or processes a user login.
     * will redirect to site root if login
     * was successfull.
     */
    public function actionLogin() {

        $model = new CMSLoginForm;

        if (isset($_POST['CMSLoginForm'])) {
            $model->attributes = $_POST['CMSLoginForm'];
            if ($model->validate()) {
                $model->login();
                Activities::log();
                
                // return json response if this action was called via ajax.
                if (Yii::app()->request->getParam('ajax')) {
                    echo CJSON::encode(array(
                        'success' => 1,
                        'message' => 'You have successfully logged in',
                        'redirect' => Yii::app()->user->returnUrl
                    ));
                    Yii::app()->end();
                }
                // redirect to return address if specified.. otherwise redirect to root.
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