<?php
    $this->menu = array(
        array('label' => 'List pricings', 'url' => array('route' => '/pricing')),
        array('label' => 'Create a pricing', 'url' => array('route' => '/pricing/create')),
    );
?>

<h3>Create and modify pricings</h3>
<h5>select a pricing to view details.</h5>

<?php 
    $this->widget('EasyTable', array(
        'id' => 'pricinglist',
        'searchable' => true,
        'dataProvider' => $dataProvider,
        'columns' => array(
            array('name'=>'code','template'=>'<a class="editbutton" href="/pricing/view/<=id>" data-id="<=id>"><=code></a>'),
            array('name'=>'cabin_fare'),
            array('name'=>'port_charge'),
            array('name'=>'service_fee'),
            array('name'=>'insurance'),
            array('name'=>'special'),
            array('name'=>'itinerary->code','searchtemplate'=>CHtml::dropDownList('Pricing[itinerary_id]',null,CHtml::listData(Itinerary::model()->findAll(),'id','code'),array('empty'=>"Don't care"))),
            array('name'=>'cabin->code','searchtemplate'=>CHtml::dropDownList('Pricing[cabin_id]',null,CHtml::listData(Cabin::model()->findAll(),'id','code'),array('empty'=>"Don't care")))
        )
    ));
?>

<?php 
    // cs()->registerScript('pricing-index',"

    // $(document).on('click', '.editbutton', function() {
    //     showModal({
    //         title: $(this).html(),
    //         url: '/pricing/view/' + $(this).attr('data-id'),
    //         submit: function() {
    //             $.growlUI('Pricing was successfully updated.');
    //         },
    //         close: function() {
    //             // Refresh the grid
    //             $.fn.yiiListView.update('pricinglist');
    //         }
    //     });
    // });

    // ", CClientScript::POS_END); 
?>