<?php

class CustomWebUser extends CWebUser {

    public function checkAccess($operation, $params=array()) {
        
        $sql = 'call sp_hasaccess(:user_id, :operation)';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam('user_id', Yii::app()->user->getId());
        $command->bindParam('operation', $operation);
        $results = $command->queryAll();
        $hasaccess = (int)$results[0]['hasaccess'];
        return $hasaccess == 1;
    }

    /*
     * checks for access for the specified operation.
     * throws a 403 exception if access is denied.
     */
    public function checkAccessAndThrow($operation, $message = null) {
        if (!Yii::app()->user->checkAccess($operation)) {
            throw new CHttpException(403, $message ?: 'You are not authorized to perform this action.');
        }
    }
}