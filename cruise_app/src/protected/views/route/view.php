<div class="dvform min">

    <div class="dvmenu">
        <a href="/route/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('area')); ?>:</td>
            <td><?php echo CHtml::encode($model->area); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('duration')); ?>:</td>
            <td><?php echo CHtml::encode($model->duration); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('port_of_call')); ?>:</td>
            <td><?php echo CHtml::encode($model->port_of_call); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('url')); ?>:</td>
            <td><?php echo CHtml::encode($model->url); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</td>
            <td><?php echo CHtml::encode($model->modified); ?></td>
        </tr>
    </table>
</div>

<script>
    // Hook up the delete button's click event.
    $('#delete').click(function() {
        if (confirm('Confirm delete route - <?php echo $model->area; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/route/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>