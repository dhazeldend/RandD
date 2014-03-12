<style type="text/css">
    .error { font-size: 14px; }
    .error_desc { color: #999999; }
</style>

<?php
$this->pageTitle=Yii::app()->name . ' - Error';
?>

<h2>YOU JUST GOT 404'D</h2>

<div class="error">
    The page you're looking for does not exist. Sorry :'(
</div>

<br>

<div class="error_desc">
    Deets:
    <br>
    <?php echo CHtml::encode($message); ?>
</div>