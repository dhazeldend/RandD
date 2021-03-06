<?php
    $this->menu = array(
        array('label' => 'List users', 'url' => array('route' => '/user')),
        array('label' => 'Create a user', 'url' => array('route' => '/user/create')),
        array('label' => 'List roles', 'url' => array('route' => '/role')),
        array('label' => 'Create a role', 'url' => array('route' => '/role/create'))
    );
?>

<h3>Roles & Permissions</h3>
<h5>select a role to modify.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'rolelist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'name','template'=>'<a href="/role/update/<=id>"><=name></a>'),
        array('name'=>'description'),
        array('name'=>'level'))));?>