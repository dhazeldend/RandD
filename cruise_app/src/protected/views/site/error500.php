<?php
$this->pageTitle=Yii::app()->name . ' - Error';
?>

<h2>Oops, something went wrong...</h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>