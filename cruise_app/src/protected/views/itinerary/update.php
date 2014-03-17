<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <a class="submit">Save changes</a>
    </div>
    
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
            <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'start_date'); ?></td>
            <td><?php echo $form->textField($model,'start_date',array('size'=>60, 'maxlength'=>256, 'class'=>'datepicker')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'end_date'); ?></td>
            <td><?php echo $form->textField($model,'end_date',array('size'=>60, 'maxlength'=>256, 'class'=>'datepicker')); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
