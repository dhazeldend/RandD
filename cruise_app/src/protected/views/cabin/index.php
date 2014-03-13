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
        array('name'=>'status','searchtemplate'=>CHtml::dropDownList('User[status]',null,User::model()->getStatusOptions(),array('empty'=>"Don't care"))))));?>

<?php cs()->registerScript('user-index',"

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/user/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('User was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('cabinlist');
        }
    });
});

", CClientScript::POS_END); ?>