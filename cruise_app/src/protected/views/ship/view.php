<div class="dvform min">

    <div class="dvmenu">
        <a href="/ship/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('code')); ?>:</td>
            <td><?php echo CHtml::encode($model->code); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:</td>
            <td><?php echo CHtml::encode($model->name); ?></td>
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
        if (confirm('Confirm delete ship - <?php echo $model->code; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/ship/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>