<html>
<head>
    <meta charset="utf-8">

    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/public/css/style.css">


</head>
<body>
    <div id="top">
        <div class="container_12">
            <div class="grid_9">
                <nav>
                    <a class="menu-open" href="#">Menu</a>
                    <ul>
                        <?php if (Session::get('id')): ?>
                            <li><a href="<?php ROOTURL?>/login/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php ROOTURL?>/login">Login</a></li>
                        <?php endif; ?>

                        <?php if (Session::get('username')): ?>
                        <li><a href="#"><?php echo Session::get('username')?></a></li>
                        <?php endif; ?>
                        <?php if (Session::get('admin') == true): ?>
                            <li><a href="<?php ROOTURL?>/admin">Admin</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div><!-- .grid_9 -->
        </div>
    </div><!-- #top -->

    <header id="branding">
        <div class="container_12">
            <div class="grid_3">
                <hgroup>
                    <h1 id="site_logo"><a href="/" title=""><img src="/public/img/gamezlogo.png" alt="GAMEZ"></a></h1>
                    <h2 id="site_description">FOR THE BEST GAMEZ</h2>
                </hgroup>
            </div><!-- .grid_3 -->

            <div class="grid_9">
                <div class="top_header">
                    <div class="welcome">
                        <?php
                            if(isset($_SESSION['username']))
                            {
                                if($_SESSION['username'] == "stijn" | $_SESSION['username'] == "linksonder")
                                {
                                    echo 'Welcome RECHTSBOVEN';
                                }
                                else{
                                    echo 'Welcome ' . $_SESSION['username'];
                                }
                            }
                            else
                            {
                                echo 'Welcome visitor you can <a href="/login">login or create an account</a>.';
                            }
                        ?>
                        
                    </div><!-- .welcome -->
                    <ul id="cart_nav">
                        <li>
                            <a class="cart_li" href="/cart">
                                <div class="cart_ico"></div>
                            </a>
                        </li>
                    </ul><!-- .cart_nav -->
                    <form action="<?php ROOTURL?>/product/search" method="post" class="search" >
                        <input type="submit" class="search_button" value="">
                        <input type="text" name="Search" class="search_form" value="" placeholder="Search entire store here...">
                    </form>
                </div><!-- .top_header -->
            </div><!-- .grid_9 -->
            
            <div class="grid_9 primary-box">
                <nav class="primary">
                    <div class="bg-menu-select"></div>
                    <a class="menu-select" href="#">Catalog</a>
                        <ul class="parents">
                            <li><a href="/home"> home</a></li>
                            <li class="parent plus"><a href="/category"> categories</a>
                                    <ul class="sub" style="display: none;">
                                    <?php foreach ($this->cat as $ca) { ?>
                                        <li><a href="/category/detail/<?php echo '/'.$ca->CategoryID ?> "> <?php echo $ca->CategoryName ?></a></li>
                                    <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="/product"> products</a></li>

                        <!--<div id = "navbar"> zo dat werkt niet!-->
 
                                    </ul>
                       <!-- </div> volgens de java en css zit hier heen div-->
                </nav><!-- .primary -->
            </div><!-- .grid_9 -->
            <p>
                <div class="breadcrumbs">
            <script>
                var path = "";
                var href = document.location.href;
                var s = href.split("/");
                path+="<A HREF=\""+href.substring(0,href.indexOf("/"+s[2])+s[2].length+1)+"/\">HOME</A> <span></span> ";
                for (var i=3;i<(s.length-1);i++) {
                path+="<A HREF=\""+href.substring(0,href.indexOf("/"+s[i])+s[i].length+1)+"/\">"+s[i]+"</A> <span></span> ";
                }
                i=s.length-1;
                path+="<span class=\"current\" \">"+s[i]+"</span>";
                var url =  "" + path;
                document.writeln(url);
            </script>
                </div>
            </p>
        </div>
        
        <div class="clear"></div>
    </header>

        <div id="content">

        <?php if (isset($this->msg)){echo $this->msg;};?> <br/>
            <section id="main">