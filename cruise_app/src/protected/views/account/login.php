<?php
$this->pageTitle=Yii::app()->name . ' - CMS Login';
?>

<?php 
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'redactor-login-form',
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        //'afterValidate'=>'js:submitLoginForm'
    )
)); 
?>
<style>
    .redactor-login { width:400px; margin:0 auto; background:#fff; padding:20px; margin-top:5%;}
    .redactor-login input { margin-bottom:10px;}
</style>
<div class="redactor-login row">
    <div class="text-center">
        <?php echo '<img src="'.app()->getModule('redactor')->assetUrl.'/img/redactor-logo.png"/> '; ?>
    </div>
    <form class="form" role="form">
        <div class="form-group">
            <?php echo $form->labelEx($model,'E-posadres'); ?>
            <?php echo $form->textField($model,'username', array("class" => "form-control")); ?>
            <?php echo $form->error($model,'username', array("class" => "alert-danger")); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'Wagwoord'); ?>
            <?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
            <?php echo $form->error($model,'password', array("class" => "alert-danger")); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('Meld Aan', array('class'=>'btn btn-default btn-primary')); ?>
        </div>
       
    </form>
</div>

<?php $this->endWidget(); ?>

         