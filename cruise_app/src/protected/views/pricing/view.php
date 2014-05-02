<div class="dvform min">

    <div class="dvmenu">
        <a href="/pricing/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>:</td>
            <td><?php echo CHtml::encode($model->code); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('cabin_fare')); ?>:</td>
            <td><?php echo CHtml::encode($model->cabin_fare); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('port_charge')); ?>:</td>
            <td><?php echo CHtml::encode($model->port_charge); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('service_fee')); ?>:</td>
            <td><?php echo CHtml::encode($model->service_fee); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('insurance')); ?>:</td>
            <td><?php echo CHtml::encode($model->insurance); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('special')); ?>:</td>
            <td><?php echo CHtml::encode($model->special); ?></td>
        </tr>
        <tr>
            <td>Itinerary:</td>
            <td><a href="/itinerary/view/<?php echo $model->itinerary_id; ?>"><?php echo $model->itinerary->code; ?></a></td>
        </tr>
        <tr>
            <td>Cabin:</td>
            <td><a href="/cabin/view/<?php echo $model->cabin_id; ?>"><?php echo $model->cabin->code; ?></a></td>
        </tr>
    </table>
</div>

<script>
    // Hook up the delete button's click event.
    $('#delete').click(function() {
        if (confirm('Confirm delete pricing - <?php echo $model->code; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/pricing/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>