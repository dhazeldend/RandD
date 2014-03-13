<?php
    $this->menu = array(
        array('label' => 'List users', 'url' => array('route' => '/user')),
        array('label' => 'Create a user', 'url' => array('route' => '/user/create')),
        array('label' => 'List roles', 'url' => array('route' => '/role')),
        array('label' => 'Create a role', 'url' => array('route' => '/role/create'))
    );
?>

<h3>[Role] <?php echo $model->name; ?></h3>
<h5><?php echo $model->description; ?></h5>

<?php $form=$this->beginWidget('CActiveForm'); ?>

<input type="submit" value="Save changes" class="btn btn-primary" style="float:right">

<ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab">General</a></li>
    <li><a href="#roles" data-toggle="tab">Sub Roles</a></li>
    <li><a href="#permissions" data-toggle="tab">Permissions</a></li>
</ul>

<div class="tab-content">

    <div class="tab-pane active" id="general">
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
            </table>
        </div>
    </div>

    <div class="tab-pane" id="roles">
        Select the <b><?php echo $model->name; ?></b> role's subroles:
        <br>
        <b>Note:</b> Only direct permissions of these subroles will be taken into account.
        Any subroles of these roles will not be assumed.
        <br>
        <br>
        <?php $this->widget('EasyTable', array(
            'id' => 'rolelist',
            'dataProvider' => $roleDataProvider,
            'template' => '{items}',
            'columns' => array(
                array('name'=>'name','template'=>'<input type="checkbox" name="Role[roles][]" value="<=id>" <=hasAccess>>'),
                array('name'=>'name'),
                array('name'=>'description'))));?>
    </div>

    <div class="tab-pane" id="permissions">
        Select the <b><?php echo $model->name; ?></b> role's permissions:
        <br>
        <br>
        <?php $this->widget('EasyTable', array(
            'id' => 'permlist',
            'dataProvider' => $permDataProvider,
            'template' => '{items}',
            'columns' => array(
                array('name'=>'name','template'=>'<input type="checkbox" name="Role[permissions][]" value="<=id>" <=hasAccess>>'),
                array('name'=>'name'),
                array('name'=>'description'))));?>
    </div>
</div>

<?php $this->endWidget(); ?>