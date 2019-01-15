<?php if(!isset($this->orders)){?>
    No orders available
<?php }?>
<?php foreach ($this->orders as $obj ) {
    var_dump($obj);
    echo "<br/>";
}