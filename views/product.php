<h1>product page</h1>

<div id="productlist">
<?php foreach ($this->products as &$obj){?>
<div id="product<?php echo $obj->ProductID?>">
<h4><?php echo $obj->ProductName?></h4>
<label><?php echo $obj->ProductPrice?></label>
<div id="productDescription"><?php echo $obj->ProductDescription?></div>
</div>
<?php } ?>
<br/>

<div id="addProduct">
<form action="<?php ROOTURL?>/product/add" method="post">
<label>Category</label>
<select name="SubCategoryID">
<?php foreach ($this->categories as &$obj) {?>
<option value="<?php echo $obj->SubCategoryID?>">
<?php echo $obj->CategoryName?> - <?php echo $obj->SubCategoryName?>
</option>
<?php }?>
</select>

<br/>
<label>Product name</label>
<input type="text" name="ProductName"/><br/>
<label>Product price</label>
<input name="ProductPrice" type="number" min="0.00" max="10000.00" step="0.01" /><br/>


</form>
</div>