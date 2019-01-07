<h1> Categories </h1>

<?php foreach ($this->categories as &$obj){?>
<label><?php echo $obj->CategoryName;?> </Label>
<a href="<?php ROOTURL?>/category/detail/<?php echo $obj->CategoryID?>">
<img src="<?php ROOTURL?>/public/images/edit.png"/></a>
<a href="<?php ROOTURL?>/category/delete/<?php echo $obj->CategoryID?>">
<img src="<?php ROOTURL?>/public/images/delete.png"/></a>
<br/>
<?php } ?>

<div id="add category">
<form action="<?php ROOTURL?>/category/add" method="post">
<label>Category name</label><input type="text" name="CategoryName"/> <br/>
<label></label> <input type="submit" />
</form>
</div>
