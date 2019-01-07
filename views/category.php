<h1> Categories </h1>

<?php foreach ($this->categories as &$obj){?>
<?php echo $obj->CategoryName;?> <br/>
<?php } ?>

<div id="add category">
<form action="<?php ROOTURL?>/category/add" method="post">
<label>Category name</label><input type="text" name="CategoryName"/> <br/>
<label></label> <input type="submit" />
</form>
</div>
