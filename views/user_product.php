<h1>product page</h1>

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
</form>
<?php } ?>
<br/>