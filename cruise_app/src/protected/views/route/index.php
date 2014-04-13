<?php
    $this->menu = array(
        array('label' => 'List routes', 'url' => array('route' => '/route')),
        array('label' => 'Create a route', 'url' => array('route' => '/route/create')),
    );
?>

<h3>Create and modify routes</h3>
<h5>select a route to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'routelist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'area','template'=>'<a class="editbutton" href="/route/view/<=id>" data-id="<=id>"><=area></a>'),
        array('name'=>'duration'),
        array('name'=>'port_of_call'),
        array('name'=>'url'),
        array('name'=>'start_port->name','searchtemplate'=>CHtml::dropDownList('Route[start_port_id]',null,CHtml::listData(Port::model()->findAll(),'id','name'),array('empty'=>"Don't care"))),
        array('name'=>'end_port->name','searchtemplate'=>CHtml::dropDownList('Route[end_port_id]',null,CHtml::listData(Port::model()->findAll(),'id','name'),array('empty'=>"Don't care"))))));?>

<?php 
    // cs()->registerScript('cabin-index',"

    // $(document).on('click', '.editbutton', function() {
    //     showModal({
    //         title: $(this).html(),
    //         url: '/route/view/' + $(this).attr('data-id'),
    //         submit: function() {
    //             $.growlUI('Route was successfully updated.');
    //         },
    //         close: function() {
    //             // Refresh the grid
    //             $.fn.yiiListView.update('routelist');
    //         }
    //     });
    // });

    // ", CClientScript::POS_END); 
?>