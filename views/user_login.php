<h1>loginpage</h1>


<h3>Login</h3>

<div id="login">
<form action="<?php ROOTURL?>/login/login" method="post">
<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>
</div>

<br />
<h3>Register</h3>

<div id="register">
<form action="<?php ROOTURL?>/login/register" method="post">
<label>email-address</label><input type="text" name="emailAddress"/> <br/>
<label>username</label><input type="text" name="username"/> <br/>
<label>Password</label><input type="password" name="password"/><br/>
<label></label> <input type="submit" />
</form>

</div>