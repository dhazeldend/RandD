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