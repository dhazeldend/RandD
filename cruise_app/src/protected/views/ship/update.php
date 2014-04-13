<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <button type="submit" class="submit">Save changes</button>
    </div>
    
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'cruise_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'cruise_id',CHtml::listData(CruiseLine::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'url'); ?></td>
            <td><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
