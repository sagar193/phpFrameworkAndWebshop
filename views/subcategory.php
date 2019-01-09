<h1>Sub categories</h1>

<div id="subcategorieslist">
<?php foreach ($this->category as &$obj){?>
<h4><?php echo $obj->CategoryName?></h4>
    <?php if(!isset($this->subcategory)){ continue;} ?>
    <?php foreach ($this->subcategory as &$sucat){?>
    <ul>
        <?php if ($sucat->CategoryID === $obj->CategoryID) {?>
            <li><?php echo $sucat->SubCategoryName ?>
                <a href="<?php ROOTURL?>/subcategory/detail/<?php echo $sucat->SubCategoryID?>">
                <img src="<?php ROOTURL?>/public/images/edit.png"/></a>
                <a href="<?php ROOTURL?>/subcategory/delete/<?php echo $sucat->SubCategoryID?>">
                <img src="<?php ROOTURL?>/public/images/delete.png"/></a>
            </li>
        <?php }?>
    </ul>
    <?php } ?>

</div>
<?php }?>




<div id="addSubCategory">
<form action="<?php ROOTURL?>/subcategory/add" method="post">
<label>Category Name</label>

<select name="CategoryID">
<?php foreach ($this->category as &$obj){?>
<option value="<?php echo $obj->CategoryID?>">
<?php echo $obj->CategoryName?></label>
<?php }?>
</select>

<label>Sub category name: </label> <input type="text" name="SubCategoryName"/>
<br/><label></label> <input type="submit" />

</form>
</div>
 <?php
//var_dump($this->category);
//var_dump($this->subcategory);