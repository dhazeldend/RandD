<style>
    .login { width:310px; margin:0 auto; padding:50px 20px; }
    .login input { margin-bottom:10px; }
</style>

<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<?php 
$form=$this->beginWidget('CActiveForm');
?>

<div class="login row">
    <div class="text-center">
        <center><?php echo '<img src="'.asset('/img/logo.png').'"/>'; ?></center>
    </div>
    <form class="form" role="form">
        <div class="form-group">
            <?php echo $form->labelEx($model,'Email Address'); ?>
            <?php echo $form->textField($model,'username', array("class" => "form-control")); ?>
            <?php echo $form->error($model,'username', array("class" => "alert-danger")); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'Secret Code'); ?>
            <?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
            <?php echo $form->error($model,'password', array("class" => "alert-danger")); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('Sign In', array('class'=>'btn btn-default btn-primary')); ?>
        </div>
    </form>
</div>

<?php $this->endWidget(); ?>
