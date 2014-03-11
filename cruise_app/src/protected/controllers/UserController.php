<?php

class UserController extends AdminBaseController {
    
	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    public function accessControl() {
        return array(
            'index'=>array('viewuser'),
            'create'=>array('createuser'),
            'view'=>array('viewuser'),
            'update'=>array('edituser'),
            'delete'=>array('deleteuser'),
            'resetpassword'=>array('edituser'),
        );
    }
    
	/**
     * beforeAction - logic to run before any event
     */
    public function beforeAction($action){
        
        // set sub menu options 
        $this->menu = array(
            array('label' => 'List users', 'url' => array('route' => '/user/index')),
            array('label' => 'Create a user', 'url' => array('route' => '/user/create')),
            array('label' => 'List roles', 'url' => array('route' => '/role/index')),
            array('label' => 'Create a role', 'url' => array('route' => '/role/create'))
        );

        return true;
    }

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new User('create');
        
		if (isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
            $model->create_user_id = Yii::app()->user->getId();
            $model->password = md5($model->password);
            $model->repeatpassword = md5($model->repeatpassword);
			if ($model->save()) {
                Yii::app()->user->setFlash('success', '[User] ' . $model->name . ' was successfully created.');
                $this->redirect('/user');
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {

			$model->attributes = $_POST['User'];
            $model->update_user_id = Yii::app()->user->getId();
            $model->update_time = new CDbExpression('CURRENT_TIMESTAMP');

			if ($model->save()) {
                $this->redirect(array('view', 'id'=>$model->id));
            }
		}

		$this->renderPartial('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
        // delete all the publications for the user
        UserPublications::model()->deleteAllByAttributes(array('user_id' => $id));
        // delete the user
		$this->loadModel($id)->delete();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
        $model = new User('search');
        $model->unsetAttributes();
        if (isset($_GET['User'])) {
            $model->attributes=$_GET['User'];
        }
		$this->render('index',array(
			'dataProvider'=>$model->search(),
		));
	}

    public function actionResetPassword($id) {
        $model=$this->loadModel($id);
        $model->password = md5('12345');
        $model->save();
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = User::model()->findByPk($id);
		if ($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
