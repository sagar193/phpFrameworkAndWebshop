<h1> Menu detail</h1>

<form action="<?php ROOTURL?>/menu/edit/<?php echo $this->menu->MenuID;?>" method="post"> 
<input type="text" name="MenuName" placeholder="<?php echo $this->menu->MenuName;?>"/><br/>
<input type="text" name="MenuLink" placeholder="<?php echo $this->menu->MenuLink;?>"/><br/>
<?php //<input type="checkbox" name="AdminLink" <?php if ($this->menu->AdminLink == 1) {echo "checked";}  /> <br/> ?>
<label></label> <input type="submit" />