<?php

class CabinController extends AdminBaseController {
    
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Cabin('create');
        
		if (isset($_POST['Cabin']))
		{
			$model->attributes=$_POST['Cabin'];
			if ($model->save()) {
                Yii::app()->user->setFlash('success', '[Cabin] ' . $model->code . ' was successfully created.');
                $this->redirect('/cabin');
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

		if (isset($_POST['Cabin'])) {

			$model->attributes = $_POST['Cabin'];
            $model->modified = new CDbExpression('CURRENT_TIMESTAMP');

			if ($model->save()) {
                $this->redirect(array('view', 'id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
        $model = new Cabin('search');
        $model->unsetAttributes();
        if (isset($_GET['Cabin'])) {
            $model->attributes=$_GET['Cabin'];
        }
		$this->render('index',array(
			'dataProvider'=>$model->search(),
		));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cabin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Cabin::model()->findByPk($id);
		if ($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cabin $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
