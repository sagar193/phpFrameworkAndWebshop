<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/css/bootstrap.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="/public/js/jquery.js"></script>
    
    <title> Webshop </title>

</head>
<body>
<div id="header">
<?php foreach ($this->header as $key) { ?>
    <a href=" <?php echo ROOTURL. $key->MenuLink ?> "> <?php echo $key->MenuName ?></a>
<?php } ?>
<?php if (Session::get('id')): ?>
    <a href="<?php ROOTURL?>/login/logout">Logout</a>
<?php else: ?>
    <a href="<?php ROOTURL?>/login">Login</a>
<?php endif; ?>

<?php if (Session::get('admin') == true): ?>
    <a href="<?php ROOTURL?>/admin">Admin</a>
<?php endif; ?>

</div>

<div id="content">

<?php if (isset($this->msg)){echo $this->msg;};?> <br/>