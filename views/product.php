<h1>product page admin</h1>

<div id="productlist">
<?php foreach ($this->products as &$obj){?>
<div id="product<?php echo $obj->ProductID?>">
<img src="<?php echo ROOTURL."public/images/Products/". $obj->ProductImageLink?>">
<h4><?php echo $obj->ProductName?></h4>
<label><?php echo $obj->ProductPrice?></label>
<div id="productDescription"><?php echo $obj->ProductDescription?></div>
</div>
<form action="<?php echo ROOTURL."/cart/add/".$obj->ProductID?>">
<input type="submit" value="Add to cart">
<a href="<?php ROOTURL?>/product/detail/<?php echo $obj->ProductID?>">
<img src="<?php ROOTURL?>/public/images/edit.png"/></a>
<a href="<?php ROOTURL?>/product/delete/<?php echo $obj->ProductID?>">
<img src="<?php ROOTURL?>/public/images/delete.png"/></a>
</form>
<?php } ?>
<br/>

<?php if (Session::get('admin') == true): ?>
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
<label>Image link</label>
<input type="text" name="ProductImageLink"><br/>
<label>Product description</label><br/>
<textarea name="ProductDescription"  rows="4" cols="50">
Here you can put a long product description
</textarea>
<input type="submit" />
<?php endif; ?>

</form>
</div>