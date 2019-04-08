<h1>Register form</h1>
<form action="<?php echo URL; ?>users/register" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" name="username" type="text" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input name="email" class="form-control" type="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input name="password" class="form-control" type="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if (isset($status)) {
        echo $status;
    }
    ?>
</form>