<div class="dvform min">

    <div class="dvmenu">
        <a href="/user/update/<?php echo $model->id; ?>" class="internal">Edit</a> |
        <a id="resetPwd">Reset Password</a> |
        <a id="delete">Delete</a>
    </div>

    <table>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</td>
            <td><?php echo CHtml::encode($model->username); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:</td>
            <td><?php echo CHtml::encode($model->name); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</td>
            <td><?php echo CHtml::encode($model->email); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:</td>
            <td><?php echo CHtml::encode($model->description); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</td>
            <td><?php echo CHtml::encode($model->status); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('last_login_time')); ?>:</td>
            <td><?php echo CHtml::encode($model->last_login_time); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('create_time')); ?>:</td>
            <td><?php echo CHtml::encode($model->create_time); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($model->getAttributeLabel('update_time')); ?>:</td>
            <td><?php echo CHtml::encode($model->update_time); ?></td>
        </tr>
    </table>
</div>

<script>
    // Hook up the click event for the reset password
    // button in the action bar to reset the users password
    // to the default password.
    $('#resetPwd').click(function() {
        if (confirm('Are you sure that you want to reset the password?')) {
            $.post('/redactor/user/resetpassword/<?php echo $model->id; ?>', function() {
                alert('Password was successfully reset for <?php echo $model->username; ?>')
            });
        }
    });
    // Hook up the delete button's click event in the
    // action bar.
    $('#delete').click(function() {
        if (confirm('Confirm delete user - <?php echo $model->username; ?>?')) {
            var modal = $(this).closest('.modal');
            $.post('/redactor/user/delete/<?php echo $model->id; ?>', modal.modal('hide'));
        }
    });
</script>