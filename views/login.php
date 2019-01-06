<h1>loginpage</h1>

<div id="login">
<form action="login/login" method="post">
<?php echo $this->msg?> <br/>

<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>
</div>

<div id="register">
<form action="login/register" method="post">
<label>email-address</label><input type="text" name="emailAddress"/> <br/>
<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>

</div>