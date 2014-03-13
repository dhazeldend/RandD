<?php
    $this->menu = array(
        array('label' => 'List ports', 'url' => array('route' => '/port')),
        array('label' => 'Create a port', 'url' => array('route' => '/port/create')),
    );
?>

<h3>Create a new port</h3>
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
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create port" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>