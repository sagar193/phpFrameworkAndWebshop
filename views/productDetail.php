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

<br/>
<label>Product name</label>
<input type="text" name="ProductName" value="<?php echo $this->product->ProductName;?>"/><br/>
<label>Product price</label>
<input name="ProductPrice" value="<?php echo $this->product->ProductPrice;?>" type="number" min="0.00" max="10000.00" step="0.01" /><br/>
<label>Image link</label>
<input type="text" name="ProductImageLink" value="<?php echo $this->product->ProductImageLink;?>"><br/>
<label>Product description</label><br/>
<textarea name="ProductDescription"  rows="4" cols="50">
<?php echo $this->product->ProductDescription ?>
</textarea>
<input type="submit" />