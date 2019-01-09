<h1> Sub-Category detail</h1>

<form action="<?php ROOTURL?>/subcategory/edit/<?php echo $this->subcategory->SubCategoryID;?>" method="post">

<label>Category Name</label>
<select name="CategoryID">
<?php foreach ($this->category as &$obj){?>
<option value="<?php echo $obj->CategoryID?>">
<?php echo $obj->CategoryName?></label>
<?php }?>
</select>

<input type="text" name="SubCategoryName" placeholder="<?php echo $this->subcategory->SubCategoryName;?>"/><br/>
<label></label> <input type="submit" />