<?php
function dlf_form() {
 
?>
 
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="login-form">
        <div class="form-group">
            <input name="login_name" type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" />
            <label class="login-field-icon fui-user" for="login-name"></label>
        </div>
 
        <div class="form-group">
            <input  name="login_password" type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
            <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit"  name="dlf_submit" value="Log in" />
</form>
</div>
<?php
}
?>