<div>
    <h3>Edit a role</h3>
    <form action="<?php echo URL; ?>privileges/<?= $role->id ?? '' ?>" method="POST">
        <input type="hidden" name="_method" value="PUT"/>
        <label>Role</label>
        <input autofocus type="text" name="role" value="<?= $role->name ?? '' ?>"/>
        <input type="hidden" name="role_id" value="<?= $role->id ?? '' ?>"/>
        <input type="submit" name="submit_update_role" value="Update role"/>
    </form>
    <?php if (isset($status)) {
        echo $status;
    } ?>
</div>