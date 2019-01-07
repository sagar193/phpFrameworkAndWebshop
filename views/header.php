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
<a href="<?php ROOTURL?>/">Home</a>
<a href="<?php ROOTURL?>/product">Product</a>
<?php if (Session::get('loggedIn') == true): ?>
    <a href="<?php ROOTURL?>/login/logout">Logout</a>
<?php else: ?>
    <a href="<?php ROOTURL?>/login">Login</a>
<?php endif; ?>

<?php if (Session::get('admin') == true): ?>
    <a href="<?php ROOTURL?>/admin">Admin</a>
<?php endif; ?>
<a href="<?php ROOTURL?>/about">About</a>


</div>

<div id="content">