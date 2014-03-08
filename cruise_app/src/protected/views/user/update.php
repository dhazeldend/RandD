<?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="dvform min">

    <div class="dvmenu">
        <a class="submit">Save changes</a>
    </div>
    
    <table>
        <tr>
            <td><?php echo $form->labelEx($model,'role_id'); ?></td>
            <td><?php echo $form->dropDownList($model,'role_id',CHtml::listData(Role::model()->findAll(),'id','name')); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'username'); ?></td>
            <td><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'name'); ?></td>
            <td><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'email'); ?></td>
            <td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'description'); ?></td>
            <td><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'status'); ?></td>
            <td><?php echo $form->dropDownList($model,'status',$model->getStatusOptions()); ?></td>
        </tr>
        <tr>
            <?php
                // here we have to create an array of the selected items in the user publications dropdown.
                // the reason being is that the array that is used to populate the list and the array
                // retreived from the database(selected items) are different. the entire list of
                // publications are retreived from the app config... not the database.
                $selected = array();
                foreach ($model->publications as $item) {
                    $selected[$item->publication_id] = array('selected' => 'selected');
                }
            ?>
            <td><?php echo $form->labelEx($model,'publications'); ?></td>
            <td><?php echo $form->dropDownList($model,'publications',Yii::app()->getModule('webapp')->publications, array('multiple' => 'multiple', 'options' => $selected)); ?></td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>

<script>
    // style the publications multi-select dropdown
    // with the Select2 component.
    $('#User_publications').select2({
        placeholder: 'Select publications for <?php echo $model->name; ?>',
        width: 'resolve' });
</script>