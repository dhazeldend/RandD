<?php
    $this->menu = array(
        array('label' => 'List itinerary', 'url' => array('route' => '/itinerary')),
        array('label' => 'Create an itinerary item', 'url' => array('route' => '/itinerary/create')),
    );
?>

<h3>Create and modify itinerary</h3>
<h5>select an item to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'itinerarylist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'code','template'=>'<a class="editbutton" data-id="<=id>"><=code></a>'),
        array('name'=>'start_date'),
        array('name'=>'end_date'),
        array('name'=>'ship->name','searchtemplate'=>CHtml::dropDownList('Itinerary[ship_id]',null,CHtml::listData(Ship::model()->findAll(),'id','name'),array('empty'=>"Don't care"))),
        array('name'=>'route->area','searchtemplate'=>CHtml::dropDownList('Itinerary[route_id]',null,CHtml::listData(Route::model()->findAll(),'id','area'),array('empty'=>"Don't care"))))));?>

<?php cs()->registerScript('itinerary-index',"

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/itinerary/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('Itinerary was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('itinerarylist');
        }
    });
});

", CClientScript::POS_END); ?>