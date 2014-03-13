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
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'description'); ?></td>
            <td><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'passengers'); ?></td>
            <td><?php echo $form->textField($model,'passengers',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
