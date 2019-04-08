<h1>Login form</h1>
<form action="<?php echo URL; ?>users/login" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" name="username" type="text" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" name="password" type="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if (isset($status)) {
        echo $status;
    } ?>
</form>