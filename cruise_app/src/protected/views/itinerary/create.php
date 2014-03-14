<?php
    $this->menu = array(
        array('label' => 'List itinerary', 'url' => array('route' => '/itinerary')),
        array('label' => 'Create an itinerary item', 'url' => array('route' => '/itinerary/create')),
    );
?>

<h3>Create a new itinerary item</h3>
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
            <td><?php echo $form->labelEx($model,'route_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'route_id',CHtml::listData(Route::model()->findAll(),'id','area')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'start_date'); ?></td>
            <td><?php echo $form->textField($model,'start_date',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'end_date'); ?></td>
            <td><?php echo $form->textField($model,'end_date',array('maxlength'=>256)); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create item" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>