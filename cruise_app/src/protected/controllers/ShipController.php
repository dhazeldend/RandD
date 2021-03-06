<?php

class ShipController extends AdminBaseController {
    
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
		$ship = $this->loadModel($id);

        // cabins
        $model = new Cabin('search');
        $model->unsetAttributes();
        $model->ship_id = $ship->id;
        if (isset($_GET['Cabin'])) {
            $model->attributes=$_GET['Cabin'];
        }

        $this->render('view',array(
			'cabinDataProvider'=> $model->search(),
            'model'=> $ship,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Ship('create');
        
		if (isset($_POST['Ship']))
		{
			$model->attributes=$_POST['Ship'];
			if ($model->save()) {
                Yii::app()->user->setFlash('success', '[Ship] ' . $model->code . ' was successfully created.');
                $this->redirect('/ship');
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

		if (isset($_POST['Ship'])) {

			$model->attributes = $_POST['Ship'];
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
        $model = new Ship('search');
        $model->unsetAttributes();
        if (isset($_GET['Ship'])) {
            $model->attributes=$_GET['Ship'];
        }
		$this->render('index',array(
			'dataProvider'=>$model->search(),
		));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ship the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Ship::model()->findByPk($id);
		if ($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ship $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
