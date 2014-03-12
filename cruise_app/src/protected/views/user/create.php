<h3>Create a new user</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'role_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'role_id',CHtml::listData(Role::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'username'); ?></td>
            <td><?php echo $form->textField($model,'username',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'password'); ?></td>
            <td><?php echo $form->passwordField($model,'password',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'repeatpassword'); ?></td>
            <td><?php echo $form->passwordField($model,'repeatpassword',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'email'); ?></td>
            <td><?php echo $form->textField($model,'email',array('maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'description'); ?></td>
            <td><?php echo $form->textField($model,'description',array('maxlength'=>256, 'style' => 'width:500px')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'status'); ?></td>
            <td><?php echo $form->dropDownList($model,'status',$model->getStatusOptions()); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create user" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>