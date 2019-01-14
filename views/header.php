<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="/public/css/admin.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>SAGAR</span>SHOP</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
            <?php foreach ($this->header as $key) { ?>
    <li><a href=" <?php echo ROOTURL. $key->MenuLink ?> "> <?php echo $key->MenuName ?></a></li>
<?php } ?>
<?php if (Session::get('id')): ?>
    <li><a href="<?php ROOTURL?>/login/logout">Logout</a></li>
<?php else: ?>
    <li><a href="<?php ROOTURL?>/login">Login</a></li>
<?php endif; ?>

<?php if (Session::get('admin') == true): ?>
    <li><a href="<?php ROOTURL?>/admin">Admin</a></li>
<?php endif; ?>

		</ul>
		<div class="attribution">admin <a href="#">rechtsboven</a></div>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				
            <script>
                var path = "";
                var href = document.location.href;
                var s = href.split("/");
                path+='<li><a href="'+ href.substring(0,href.indexOf("/"+s[2])+s[2].length+1) +'"><span class="glyphicon glyphicon-home"></span></a></li>'
                for (var i=3;i<(s.length-1);i++) {
                path+="<li><a href=\""+href.substring(0,href.indexOf("/"+s[i])+s[i].length+1)+"/\">"+s[i]+"<span></span></a></li>";
                }
                i=s.length-1;
                path+="<li>"+s[i]+"<span></span></li>";;
                var url =  "" + path;
                document.writeln(url);
            </script>

			</ol>
		</div><!--/.row-->
<?php if (isset($this->msg)){echo $this->msg;};?> <br/>

