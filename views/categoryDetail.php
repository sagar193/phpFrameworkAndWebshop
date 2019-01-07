<h1> Category detail</h1>

<form action="<?php ROOTURL?>/category/edit/<?php echo $this->category->CategoryID;?>" method="post"> 
<input type="text" name="CategoryName" placeholder="<?php echo $this->category->CategoryName;?>"/><br/>
<label></label> <input type="submit" />