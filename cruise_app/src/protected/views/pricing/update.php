<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <a class="submit">Save changes</a>
    </div>
    
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
            <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'cabin_fare'); ?></td>
            <td><?php echo $form->textField($model,'cabin_fare',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'port_charge'); ?></td>
            <td><?php echo $form->textField($model,'port_charge',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'service_fee'); ?></td>
            <td><?php echo $form->textField($model,'service_fee',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'insurance'); ?></td>
            <td><?php echo $form->textField($model,'insurance',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'special'); ?></td>
            <td><?php echo $form->textField($model,'special',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
