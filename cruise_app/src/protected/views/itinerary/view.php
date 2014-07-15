<div class="dvform min">

    <div class="dvmenu">
        <a href="/itinerary/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('it_code')); ?>:</td>
            <td><?php echo CHtml::encode($model->it_code); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('start_date')); ?>:</td>
            <td><?php echo CHtml::encode($model->start_date); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('end_date')); ?>:</td>
            <td><?php echo CHtml::encode($model->end_date); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</td>
            <td><?php echo CHtml::encode($model->modified); ?></td>
        </tr>
        <tr>
            <td>Ship:</td>
            <td><a href="/ship/view/<?php echo $model->ship_id; ?>"><?php echo $model->ship->name; ?></a></td>
        </tr>
        <tr>
            <td>Route:</td>
            <td><a href="/route/view/<?php echo $model->route_id; ?>"><?php echo $model->route->area; ?></a></td>
        </tr>
    </table>
</div>
<br><br>
<h3>Pricing</h3>
<div>
    <?php 
        $this->widget('EasyTable', array(
            'id' => 'pricinglist',
            'searchable' => false,
            'dataProvider' => $pricingDataProvider,
            'columns' => array(
                array('name'=>'it_code','template'=>'<a class="editbutton" href="/pricing/view/<=id>" data-id="<=id>"><=it_code></a>'),
                array('name'=>'cabin_fare'),
                array('name'=>'port_charge'),
                array('name'=>'service_fee'),
                array('name'=>'insurance'),
                array('name'=>'special'),
                array('name'=>'cabin->code','searchtemplate'=>CHtml::dropDownList('Pricing[cabin_id]',null,CHtml::listData(Cabin::model()->findAll(),'id','code'),array('empty'=>"Don't care")))
            )
        ));
    ?>
</div>

<script>
    // Hook up the delete button's click event.
    $('#delete').click(function() {
        if (confirm('Confirm delete itinerary - <?php echo $model->it_code; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/itinerary/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>