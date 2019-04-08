<div class="box">
    <h3>List of all active roles</h3>
    <table class="box">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Role name</td>
            <td>All users</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allRoles as $role) : ?>
            <tr>
                <td><?= htmlspecialchars($role->name); ?></td>
                <td><?= $rolesModel->getSum($role->id)->summary ?></td>
                <td>
                    <form method="GET"
                          action="<?php echo URL . 'privileges/' . $role->id; ?>/edit">
                        <input type="submit" value="edit">
                    </form>
                </td>
                <td>
                    <form method="POST"
                          action="<?php echo URL . 'privileges/' . $role->id; ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </br>
    <a href="/home/addrole">
        <button>Add new role</button>
    </a>
</div><br>
<?php if (empty($allDeletedRoles)) : ?>
    <?php return ?>
<?php endif ?>
<div class="box">
    <h3>List of all deleted roles</h3>
    <table class="box">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Role name</td>
            <td>Activate</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allDeletedRoles as $role) : ?>
            <tr>
                <td><?= htmlspecialchars($role->name); ?></td>
                <td>
                    <form method="GET"
                          action="<?php echo URL . 'privileges/' . $role->id; ?>/activaterole">
                        <input type="submit" value="Activate">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>