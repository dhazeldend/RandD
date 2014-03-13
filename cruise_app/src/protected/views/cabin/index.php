<?php
    $this->menu = array(
        array('label' => 'List cabins', 'url' => array('route' => '/cabin')),
        array('label' => 'Create a cabin', 'url' => array('route' => '/cabin/create')),
    );
?>

<h3>Create and modify cabins</h3>
<h5>select a cabin to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'cabinlist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'code','template'=>'<a class="editbutton" data-id="<=id>"><=code></a>'),
        array('name'=>'description'),
        array('name'=>'passengers'),
        array('name'=>'ship->name','searchtemplate'=>CHtml::dropDownList('Cabin[ship_id]',null,CHtml::listData(Ship::model()->findAll(),'id','name'),array('empty'=>"Don't care"))))));?>

<?php cs()->registerScript('cabin-index',"

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/cabin/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('Cabin was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('cabinlist');
        }
    });
});

", CClientScript::POS_END); ?>