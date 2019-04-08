<div class="box">
    <h3>List of all users</h3>
    <table class="box">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>User name</td>
            <td>E-mail</td>
            <td>Role</td>
            <td>Edit privilege</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= htmlspecialchars($user->username); ?></td>
                <td><?= htmlspecialchars($user->email); ?></td>
                <td><?= htmlspecialchars($user->name); ?></td>
                <td><a href="<?php echo URL . 'admin/' . $user->id; ?>/edit">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>