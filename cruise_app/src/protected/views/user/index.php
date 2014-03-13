<?php
    $this->menu = array(
        array('label' => 'List users', 'url' => array('route' => '/user')),
        array('label' => 'Create a user', 'url' => array('route' => '/user/create')),
        array('label' => 'List roles', 'url' => array('route' => '/role')),
        array('label' => 'Create a role', 'url' => array('route' => '/role/create'))
    );
?>

<h3>Create and modify users</h3>
<h5>select a user to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'userlist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'name','template'=>'<a class="editbutton" data-id="<=id>"><=name></a>'),
        array('name'=>'username'),
        array('name'=>'email'),
        array('name'=>'role->name','searchtemplate'=>CHtml::dropDownList('User[role_id]',null,CHtml::listData(Role::model()->findAll(),'id','name'),array('empty'=>"Don't care"))),
        array('name'=>'status','searchtemplate'=>CHtml::dropDownList('User[status]',null,User::model()->getStatusOptions(),array('empty'=>"Don't care"))))));?>

<?php cs()->registerScript('user-index',"

/*
 * Hook up the edit buttons in the grid
 * to a click event that shows the user
 * view modal dialog.
 */

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/user/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('User was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('userlist');
        }
    });
});

", CClientScript::POS_END); ?>