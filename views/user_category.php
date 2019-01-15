<h1> Categories </h1>

<?php foreach ($this->categories as &$obj){?>
<label><?php echo $obj->CategoryName;?> </Label>
<a href="<?php ROOTURL?>/category/detail/<?php echo $obj->CategoryID?>">
<br/>
<?php } ?>
