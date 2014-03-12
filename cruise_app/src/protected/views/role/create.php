<?php
    $this->menu = array(
        array('label' => 'List users', 'url' => array('route' => '/user/index')),
        array('label' => 'Create a user', 'url' => array('route' => '/user/create')),
        array('label' => 'List roles', 'url' => array('route' => '/role/index')),
        array('label' => 'Create a role', 'url' => array('route' => '/role/create'))
    );
?>

<h3>Create a new role</h3>
<h5>Complete the fields then click create to continue:</h5>
<hr>

<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="dvform min">
    <table>
        <tr>
            <td><?php echo $form->labelEx($model, 'name'); ?></td>
            <td><?php echo $form->textField($model, 'name', array('maxlength' => 20)); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'description'); ?></td>
            <td><?php echo $form->textField($model, 'description', array('maxlength' => 100, 'style' => 'width:500px')); ?></td>
        </tr>
        <tr class="footer">
            <td></td>
            <td>
                <input type="submit" value="Create role" class="btn">
            </td>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>