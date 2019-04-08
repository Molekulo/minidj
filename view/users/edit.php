<div class="container">
    <div class="box">
        <h3>Edit a privilege for user: <?= $user->username?></h3>
        <form action="<?php echo URL; ?>admin/<?= $user->id?>" method="POST">
            <input type="hidden" name="_method" value="PUT"/>
            <select name="role">
                <?php foreach ($roles as $role) : ?>
                    <option value="<?= $role->id ?>"><?= $role->name ?></option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="user_id" value="<?= $user->id ?>" />
            <input type="submit" name="submit_update_role" value="Update role" />
        </form>
    </div>
</div>
