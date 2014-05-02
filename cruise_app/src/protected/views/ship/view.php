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
        <tr>    
            <td>Cruise:</td>
            <td><a href="/cruiseline/view/<?php echo $model->cruise_id ?>"><?php echo $model->cruise->name ?></a></td>
        </tr>
    </table>
</div>
<br><br>
<h3>Cabins</h3>
<div>
    <?php 
        $this->widget('EasyTable', array(
            'id' => 'cabinlist',
            'searchable' => false,
            'dataProvider' => $cabinDataProvider,
            'columns' => array(
                array('name'=>'code','template'=>'<a class="editbutton" href="/cabin/view/<=id>" data-id="<=id>"><=code></a>'),
                array('name'=>'description'),
                array('name'=>'passengers')
            )
        ));
    ?>
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