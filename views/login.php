<h1>loginpage</h1>

<?php if (isset($this->msg)){echo $this->msg;};?> <br/>

<div id="login">
<form action="<?php ROOTURL?>/login/login" method="post">
<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>
</div>

<div id="register">
<form action="<?php ROOTURL?>/login/register" method="post">
<label>email-address</label><input type="text" name="emailAddress"/> <br/>
<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>

</div>