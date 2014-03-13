<?php
    $this->menu = array(
        array('label' => 'List cruise lines', 'url' => array('route' => '/cruiseline')),
        array('label' => 'Create a cruise lines', 'url' => array('route' => '/cruiseline/create')),
    );
?>

<h3>Create and modify cruise lines</h3>
<h5>select a cruise line to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'cruiselinelist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'code','template'=>'<a class="editbutton" data-id="<=id>"><=code></a>'),
        array('name'=>'name'),
        array('name'=>'url'))));?>

<?php cs()->registerScript('cabin-index',"

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/cruiseline/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('Cruise line was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('cruiselinelist');
        }
    });
});

", CClientScript::POS_END); ?>