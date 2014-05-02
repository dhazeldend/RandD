<?php
    $this->menu = array(
        array('label' => 'List ships', 'url' => array('route' => '/ship')),
        array('label' => 'Create a ship', 'url' => array('route' => '/ship/create')),
    );
?>

<h3>Create and modify ships</h3>
<h5>select a ship to view details.</h5>

<?php 
    $this->widget('EasyTable', array(
        'id' => 'shiplist',
        'searchable' => true,
        'dataProvider' => $dataProvider,
        'columns' => array(
            array('name'=>'code','template'=>'<a class="editbutton" href="/ship/view/<=id>" data-id="<=id>"><=code></a>'),
            array('name'=>'name'),
            array('name'=>'url'),
            array('name'=>'cruise->name','searchtemplate'=>CHtml::dropDownList('Ship[cruise_id]',null,CHtml::listData(CruiseLine::model()->findAll(),'id','name'),array('empty'=>"Don't care")))
        )
    ));
?>

<?php 
    // cs()->registerScript('ship-index',"

    // $(document).on('click', '.editbutton', function() {
    //     showModal({
    //         title: $(this).html(),
    //         url: '/ship/view/' + $(this).attr('data-id'),
    //         submit: function() {
    //             $.growlUI('Ship was successfully updated.');
    //         },
    //         close: function() {
    //             // Refresh the grid
    //             $.fn.yiiListView.update('shiplist');
    //         }
    //     });
    // });

    // ", CClientScript::POS_END); 
?>