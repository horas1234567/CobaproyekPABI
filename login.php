<?php
  require_once('header.php');
?>
  
<ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s">
<form id="login" action="login_act.php" method="POST">
    <h1>Log In</h1>
    <fieldset id="inputs">
            <div class="input-group">
            <span class="glyphicon glyphicon-user span"></span>
            <input type="text" class="input" name="username" placeholder="Username">
            </div>
            <div class="input-group">
            <span class="glyphicon glyphicon-lock span"></span>
            <input type="password" class="input" name="password" placeholder="Password">
            </div>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in" style="height: 40px;">
        <div class="utilities"  style=" margin-top: 8px">
    <a href="register.php" style="font-size: 16px; text-decoration:none; margin-left: 135px;">Daftar</a>
  </div>
    </fieldset>
</form>
</ul>



<style>
#login {
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.2),  
                0 1px 1px rgba(0, 0, 0, .2),
                0 3px 0 lightgrey  ,
                0 4px 0 rgba(0, 0, 0, .2),
                0 6px 0 lightgrey,  
                0 7px 0 rgba(0, 0, 0, .2);
}

#login {
    position: absolute;
    z-index: 0;
    background: lightgrey;
    width: 390px;
  padding: 40px;
  left: 48%;
  margin-top: 180px;
  margin-left: -170px;

}
#login:before {
    content: '';
    position: absolute;
    z-index: -1;
    border: 1px dashed #ccc;
    top: 5px;
    bottom: 5px;
    left: 5px;
    right: 5px;
    box-shadow: 0 0 0 1px #fff;
}
h1 {
    text-shadow: 0 1px 0 rgba(255, 255, 255, .7), 0px 2px 0 rgba(0, 0, 0, .5);
    text-transform: uppercase;
    text-align: center;
    color: #666;
    letter-spacing: 4px;
    font: normal 26px/1 Verdana, Helvetica;
    position: relative;
}
h1:after, 
h1:before {
    background-color: #777;
    height: 1px;
    position: absolute;
    top: 15px;
    width: 120px;   
}
h1:after {      
    right: 0;
}

h1:before {
    background-image: linear-gradient(right, #777, #fff);
    left: 0;
}
#login input[type="submit"] {
    margin-top: 10px;
    display: block;
    font-size: 13px;
    font-weight: bold;
    border: 0;
    width: 310px;
    text-shadow: 0px 1px 0px rbga(255, 255, 255, 1);
    background-color: #f0ad4e;
    border-radius: 5px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}
.input{
  width: 310px;
  height: 40px;
  margin: 2px;
}
.span{
    margin-left: -18px;
}

</style>











