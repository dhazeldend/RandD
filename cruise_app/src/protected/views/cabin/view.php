<div class="dvform min">

    <div class="dvmenu">
        <a href="/cabin/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>:</td>
            <td><?php echo CHtml::encode($model->code); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:</td>
            <td><?php echo CHtml::encode($model->description); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('passengers')); ?>:</td>
            <td><?php echo CHtml::encode($model->passengers); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</td>
            <td><?php echo CHtml::encode($model->modified); ?></td>
        </tr>
        <tr>
            <td>Ship:</td>
            <td><a href="/ship/view/<?php echo $model->ship_id; ?>"><?php echo $model->ship->name; ?></a></td>
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
                array('name'=>'code','template'=>'<a class="editbutton" href="/pricing/view/<=id>" data-id="<=id>"><=code></a>'),
                array('name'=>'cabin_fare'),
                array('name'=>'port_charge'),
                array('name'=>'service_fee'),
                array('name'=>'insurance'),
                array('name'=>'special'),
                array('name'=>'itinerary->code', null, CHtml::listData(Itinerary::model()->findAll(),'id','code'), array('empty'=>"Don't care"))
            )
        ));
    ?>
</div>

<script>
    // Hook up the delete button's click event.
    $('#delete').click(function() {
        if (confirm('Confirm delete cabin - <?php echo $model->code; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/cabin/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>