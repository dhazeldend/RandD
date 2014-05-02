<div class="dvform min">

    <div class="dvmenu">
        <a href="/cruiseline/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
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
<br><br>
<h3>Ships</h3>
<div>
    <?php 
        $this->widget('EasyTable', array(
            'id' => 'shiplist',
            'searchable' => false,
            'dataProvider' => $shipDataProvider,
            'columns' => array(
                array('name'=>'code','template'=>'<a class="editbutton" href="/ship/view/<=id>" data-id="<=id>"><=code></a>'),
                array('name'=>'name'),
                array('name'=>'url'),
            )
        ));
    ;?>
</div>

<script>
    // Hook up the delete button's click event.
    $('#delete').click(function() {
        if (confirm('Confirm delete cruiseline - <?php echo $model->code; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/cruiseline/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });

</script>