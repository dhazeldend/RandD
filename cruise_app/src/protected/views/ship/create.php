<?php
    $this->menu = array(
        array('label' => 'List ships', 'url' => array('route' => '/ship')),
        array('label' => 'Create a ship', 'url' => array('route' => '/ship/create')),
    );
?>

<h3>Create a new ship</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'cruise_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'cruise_id',CHtml::listData(CruiseLine::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'url'); ?></td>
            <td><?php echo $form->textField($model,'url',array('maxlength'=>256)); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create ship" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>