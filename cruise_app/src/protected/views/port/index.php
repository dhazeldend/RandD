<?php
    $this->menu = array(
        array('label' => 'List ports', 'url' => array('route' => '/port')),
        array('label' => 'Create a port', 'url' => array('route' => '/port/create')),
    );
?>

<h3>Create and modify ports</h3>
<h5>select a port to view details.</h5>

<?php $this->widget('EasyTable', array(
    'id' => 'portlist',
    'searchable' => true,
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name'=>'code','template'=>'<a class="editbutton" data-id="<=id>"><=code></a>'),
        array('name'=>'name'))));?>

<?php cs()->registerScript('port-index',"

$(document).on('click', '.editbutton', function() {
    showModal({
        title: $(this).html(),
        url: '/port/view/' + $(this).attr('data-id'),
        submit: function() {
            $.growlUI('Port was successfully updated.');
        },
        close: function() {
            // Refresh the grid
            $.fn.yiiListView.update('portlist');
        }
    });
});

", CClientScript::POS_END); ?>