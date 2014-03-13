<?php
    $this->menu = array(
        array('label' => 'List cruise lines', 'url' => array('route' => '/cruiseline')),
        array('label' => 'Create a cruise lines', 'url' => array('route' => '/cruiseline/create')),
    );
?>

<h3>Create a new cruise line</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
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
                <input type="submit" value="Create cruise line" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>