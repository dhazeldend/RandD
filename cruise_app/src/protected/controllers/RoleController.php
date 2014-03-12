<?php

class RoleController extends AdminBaseController {
    
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
            'index'=>array('viewrole'),
            'create'=>array('createrole'),
            'view'=>array('viewrole'),
            'update'=>array('editrole'),
            'delete'=>array('deleterole'),
        );
    }
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Role;
        if (isset($_POST['Role'])) {
            $model->attributes = $_POST['Role'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '[Role] ' . $model->name . ' was successfully created.');
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Role'])) {
            $model->attributes = $_POST['Role'];

            // delete all the roles and permissions for the current role
            RoleRoles::model()->deleteAllByAttributes(array('parent_role_id' => $id));
            RolePermissions::model()->deleteAllByAttributes(array('role_id' => $id));

            // add all of the child roles to the current role that where
            // selected in the update form
            if (isset($_POST['Role']['roles'])) {
                // this is looping records an generating sql for each???
                // there must be a better way to do this.
                foreach ($_POST['Role']['roles'] as $roleId) {
                    $roleRole = new RoleRoles;
                    $roleRole->parent_role_id = $id;
                    $roleRole->child_role_id = $roleId;
                    $roleRole->save();
                }
            }

            // add all of the permissions to the current role that where
            // selected in the update form
            if (isset($_POST['Role']['permissions'])) {
                foreach ($_POST['Role']['permissions'] as $permId) {
                    $rolePermission = new RolePermissions;
                    $rolePermission->role_id = $id;
                    $rolePermission->permission_id = $permId;
                    $rolePermission->save();
                }
            }

            if ($model->save()) {
                Yii::app()->user->setFlash('success', '[Role] ' . $model->name . ' was successfully updated.');
                $this->redirect(array('update', 'id' => $model->id));
                return;
            }
            else {
                // TODO: Set error flash.
            }
        }

        // get a data provider for the subroles grid
        $sql = 'select r.*,
                case (select count(1) from roles_roles where parent_role_id = ' . $id . ' and child_role_id = r.id)
                when 1 then \'checked\'
                when 0 then \'\'
                end as hasAccess
                FROM roles r';
        $roleDataProvider = new CSqlDataProvider($sql);
        $roleDataProvider->setPagination(false);

        // get a data provider for the permissions grid
        $sql = 'select p.*,
                case (select count(1) from roles_permissions where role_id = ' . $id . ' and permission_id = p.id)
                when 1 then \'checked\'
                when 0 then \'\'
                end as hasAccess
                FROM permissions p';
        $permDataProvider = new CSqlDataProvider($sql);
        $permDataProvider->setPagination(false);

        $this->render('update', array(
            'model' => $model,
            'roleDataProvider' => $roleDataProvider,
            'permDataProvider' => $permDataProvider,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model=new Role('search');
        $model->unsetAttributes();
        if(isset($_GET['Role']))
            $model->attributes=$_GET['Role'];
        
        $this->render('index',array(
            'dataProvider'=>$model->search(),
        ));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Role the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Role::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Role $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'role-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
