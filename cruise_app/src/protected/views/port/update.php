<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <button type="submit" class="submit">Save changes</button>
    </div>
    
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'code'); ?></td>
            <td><?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>
