<html>
<head>

<?php echo Asset::css('bootstrap.css'); ?>
<?php echo Asset::css('login.css'); ?>
<?php echo Asset::js('jquery-3.2.1.js') ?>
<?php echo Asset::js('bootstrap.js') ?>
<?php echo Asset::js(array('visible.js','checkmail.js')); ?>
<meta charset="utf-8">
<!--<link href="c:\xampp\htdocs\www\public\assets\css\style.css" rel="stylesheet">-->
<!--<script type="text/javascript" src="c:\xampp\htdocs\www\public\assets\js\script.js"></script>-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" type="text/css" href="bootstrap.css">-->
<title>ログオン </title>
</head>
<body>


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            <span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">メールアドレス確認</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form id='modal' action="/aftersend" method="post">
              <div id="sub" class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" name="InputEmail" class="form-control" id="InputEmail" placeholder="Enter email">
              </div>
            <button type="button" id="check" class="btn btn-default">確認</button>
              
            </form>

		</div>
	</div>
  </div>
</div>










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
            <?php
                $loginuser = Asset::img('login.png',array('id'=>'profile-img', 'class'=>'profile-img-card'));
                print($loginuser);
            ?>
            <!--<img id="profile-img" class="profile-img-card" src="../l?ogin.png" />-->
            <p id="profile-name" class="profile-name-card"></p>

            <?php echo Form::open('/login',array('class' => 'form-signin')); ?>

                <span id="reauth-email" class="reauth-email"></span>
                <?php echo Form::input('mail','',array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Your Name or Email address', 'required', 'autofocus'));?>
                <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>-->

                <?php
                echo Form::password('password','',array('id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => 'Password', 'required')); 
                ?>
                <!--<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
                 <input id="show-ps" type="checkbox" /><label id="ps" for="show-ps">パスワードを表示</label>

                <?php
                  echo Form::button('signin','Sign In',array('class' => 'btn btn-lg btn-primary btn-block btn-signin form-control'));
                  
                ?>
                <!--<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>-->
                <?php echo Form::close();?>
            <!-- /form -->
                <div id="su" class="center"><button id = "sign" data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success center-block">Sign Up</button></div>
            <!--<a href="/kinjiro" class="btn kintai">勤怠</a>-->
        </div><!-- /card-container -->
    </div><!-- /container -->
    
</body>
</html>