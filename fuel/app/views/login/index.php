

<!DOCTYPE html>
<html lang="en">
<head>

<?php echo Asset::css('bootstrap.css'); ?>
<?php echo Asset::css('login.css'); ?>
<?php echo Asset::js('jquery-3.2.1.js') ?>
<?php echo Asset::js('bootstrap.js') ?>
<?php echo Asset::js('visible.js'); ?>
<meta charset="utf-8">
<!--<link href="c:\xampp\htdocs\www\public\assets\css\style.css" rel="stylesheet">-->
<!--<script type="text/javascript" src="c:\xampp\htdocs\www\public\assets\js\script.js"></script>-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.form-signin{
    width:50%;
    padding-left:20px;
}
.kintai{
    float:right;
}
</style>



<!--<link rel="stylesheet" type="text/css" href="bootstrap.css">-->
<title>Bootstrap </title>
</head>
<body>
<?php
    if(!$error==''){
       print("<p id='red'>$error</p>");
    }
?>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <br />
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <?php echo Form::open('/login',array('class' => 'form-signin')); ?>

                <span id="reauth-email" class="reauth-email"></span>
                <?php echo Form::input('mail','',array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Your Name or Email address', 'required', 'autofocus'));?>
                <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>-->

                <?php
                echo Form::password('password','',array('id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => 'Password', 'required')); 
                ?>
                <!--<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
                 <input id="show-ps" type="checkbox" /><label for="show-ps">パスワードを表示</label>

                <?php
                  echo Form::button('signin','Sign in',array('class' => 'btn btn-lg btn-primary btn-block btn-signin'));
                  
                ?>
                <!--<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>-->
                <?php echo Form::close();?>
            <!-- /form -->
            <a href="register" class="btn new account">
                Sign Up
            </a>
            <!--<a href="/kinjiro" class="btn kintai">勤怠</a>-->
        </div><!-- /card-container -->
    </div><!-- /container -->
    
</body>
</html>