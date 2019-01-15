<h1> Product detail</h1>
<div id="detailProduct">
<form action="<?php ROOTURL?>/product/edit/<?php echo $this->product->ProductID;?>" method="post">
<label>Category</label>
<select name="SubCategoryID">
<?php foreach ($this->categories as &$obj) {?>
<option <?php if($this->product->SubCategoryID === $obj->SubCategoryID) {echo "selected=\"selected\"";} ?>
 value="<?php echo $obj->SubCategoryID?>">
<?php echo $obj->CategoryName?> - <?php echo $obj->SubCategoryName?>
</option>
<?php }?>
</select>