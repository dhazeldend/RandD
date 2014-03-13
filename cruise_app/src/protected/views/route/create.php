<?php
    $this->menu = array(
        array('label' => 'List routes', 'url' => array('route' => '/route')),
        array('label' => 'Create a route', 'url' => array('route' => '/route/create')),
    );
?>

<h3>Create a new route</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'start_port_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'start_port_id',CHtml::listData(Port::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'end_port_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'end_port_id',CHtml::listData(Port::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'area'); ?></td>
            <td><?php echo $form->textField($model,'area',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'duration'); ?></td>
            <td><?php echo $form->textField($model,'duration',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'port_of_call'); ?></td>
            <td><?php echo $form->textField($model,'port_of_call',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'url'); ?></td>
            <td><?php echo $form->textField($model,'url',array('maxlength'=>256)); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create route" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>