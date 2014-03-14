<?php
    $this->menu = array(
        array('label' => 'List pricings', 'url' => array('route' => '/pricing')),
        array('label' => 'Create a pricing', 'url' => array('route' => '/pricing/create')),
    );
?>

<h3>Create a new pricing</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'itinerary_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'itinerary_id',CHtml::listData(Itinerary::model()->findAll(),'id','code')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'cabin_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'cabin_id',CHtml::listData(Cabin::model()->findAll(),'id','code')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'cabin_fare'); ?></td>
            <td><?php echo $form->textField($model,'cabin_fare',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'port_charge'); ?></td>
            <td><?php echo $form->textField($model,'port_charge',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'service_fee'); ?></td>
            <td><?php echo $form->textField($model,'service_fee',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'insurance'); ?></td>
            <td><?php echo $form->textField($model,'insurance',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'special'); ?></td>
            <td><?php echo $form->textField($model,'special',array('maxlength'=>256)); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create pricing" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>