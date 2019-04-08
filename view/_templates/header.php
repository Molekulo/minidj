<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- Bootstrap template -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
<!-- logo -->
<div class="logo col-xs-1 text-center">
    Mini DJ App
</div>

<!-- navigation -->
<div class="navigation col-xs-1 text-center">
    <a href="<?php echo URL; ?>">home</a>
    <?php if (isset($_SESSION['user'])) : ?>
        <?php if ($_SESSION['role_id'] == '2') : ?>
            <a href="<?php echo URL; ?>playlist">Playlist</a>
        <?php endif ?>
        <?php if ($_SESSION['role_id'] == '1') : ?>
            <a href="<?php echo URL; ?>songs">All songs</a>
            <a href="<?php echo URL; ?>users">Users</a>
            <a href="<?php echo URL; ?>admin">Edit roles</a>
        <?php endif ?>
        <a href="<?php echo URL; ?>logout">Logout</a>
    <?php else : ?>
        <a href="<?php echo URL; ?>register">Register</a>
        <a href="<?php echo URL; ?>login">Login</a>
    <?php endif ?>
</div>
<div class="container col-md-6 text-center">
    <?php if (isset($_SESSION['user'])) : ?>
        <h2>Welcome <?= $_SESSION['user'] ?></h2><br>
    <?php endif ?>
    
