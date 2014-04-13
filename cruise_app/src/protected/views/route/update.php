<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <button type="submit" class="submit">Save changes</button>
    </div>
    
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
            <td><?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'duration'); ?></td>
            <td><?php echo $form->textField($model,'duration',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'port_of_call'); ?></td>
            <td><?php echo $form->textField($model,'port_of_call',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'url'); ?></td>
            <td><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
