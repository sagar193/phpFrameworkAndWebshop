
<?php
if(isset($_COOKIE["CART"])){
    foreach ($this->products as $obj) { ?>
        <div id="product<?php echo $obj->ProductID?>">
        <img src="<?php echo ROOTURL."public/images/Products/". $obj->ProductImageLink?>">
        <h4><?php echo $obj->ProductName?></h4>
        <label><?php echo $obj->ProductPrice?></label>
        <label>Amount: </label>
        <label><?php echo $obj->Amount?></label>
        <a href="<?php ROOTURL?>/cart/remove/<?php echo $obj->ProductID?>">
        <img src="<?php ROOTURL?>/public/images/edit.png"/></a>
        <a href="<?php ROOTURL?>/cart/delete/<?php echo $obj->ProductID?>">
        <img src="<?php ROOTURL?>/public/images/delete.png"/></a>
    <?php }
}
if(isset($this->CartTotalPrice)) {
    echo "<br/>";
    echo "<label> Totale prijs: ". $this->CartTotalPrice ."</label>";
}?>
<a href="<?php ROOTURL?>/order/add"> 
<button> </a>