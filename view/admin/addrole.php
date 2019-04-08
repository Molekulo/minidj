<div class="box">
    <h3>Add a role</h3>
    <form action="<?php echo URL; ?>privileges" method="POST">
        <label>Role name</label>
        <input type="text" name="name" value="" required/>
        <input type="submit" name="addRole" value="Add role"/>
    </form>
    <?php if (!empty($status)) : ?>
        <p><?= $status ?></p>
    <?php endif ?>
</div>