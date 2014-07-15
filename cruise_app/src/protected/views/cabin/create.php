<?php
    $this->menu = array(
        array('label' => 'List cabins', 'url' => array('route' => '/cabin')),
        array('label' => 'Create a new cabin category', 'url' => array('route' => '/cabin/create')),
    );
?>

<h3>Create a new cabin</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'ship_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'ship_id',CHtml::listData(Ship::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'description'); ?></td>
            <td><?php echo $form->textField($model,'description',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'passengers'); ?></td>
            <td><?php echo $form->textField($model,'passengers',array('maxlength'=>256)); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create cabin" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>