<?php $this->menu = array(
    array('label' => 'List roles', 'url' => array('route' => 'role/index')),
    array('label' => 'Create a role', 'url' => array('route' => 'role/create')));?>

<h3>Roles & Permissions</h3>
<h5>select a role to modify.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'rolelist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'name','template'=>'<a href="/redactor/role/update/<=id>"><=name></a>'),
        array('name'=>'description'),
        array('name'=>'level'))));?>