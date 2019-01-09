<h1> Menu </h1>

<?php foreach ($this->menu as &$obj){?>
<label><?php echo $obj->MenuName;?> </Label>
<a href="<?php ROOTURL?>/menu/detail/<?php echo $obj->MenuID?>">
<img src="<?php ROOTURL?>/public/images/edit.png"/></a>
<a href="<?php ROOTURL?>/menu/delete/<?php echo $obj->MenuID?>">
<img src="<?php ROOTURL?>/public/images/delete.png"/></a>
<br/>
<?php } ?>

<div id="add Menu">
<form action="<?php ROOTURL?>/menu/add" method="post">
<label>Menu name</label><input type="text" name="MenuName"/> <br/>
<label>Menu link</label><input type="text" name="MenuLink"/> <br/>
<?php //<label>Admin link</label><input type="checkbox" name="AdminLink"/> <br/> ?>
<label></label> <input type="submit" />
</form>
</div>
