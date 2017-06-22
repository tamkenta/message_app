<!DOCTYPE html>
<html lang="ja">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo Asset::css(array('bootstrap.css','main.css'));?>
		<?php echo Asset::js(array('jquery-3.2.1.min.js','bootstrap.min.js','visibleregister.js')); ?>

		<!-- Website CSS style -->
		

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Admin</title>
        <style type="text/css">
        form.form-horizontal{
            width:50%;
        }
		p#red{
			color:red;
		}
		input#email{
			background: white;
		}
        </style>
	</head>
	<?php
    if(!$error==null){
      print("<p id='red'>$error</p>");
    }
	if(isset($_GET['email'])){
		$mail = $_GET['email'];
	}else{
		$mail='';
	}
	
	?>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">User Registration</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
                    <?php echo Form::open('/register',array('class' => 'form-horizontal')); ?>
					<!--<form class="form-horizontal" method="post" action="">-->
						
                        
                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required/>
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
                                    <i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required disabled value="<?php print($mail); ?>" />
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
                                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control passset" name="password" id="password"  placeholder="Enter your Password" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
                                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control passset" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
								</div>
							</div>
						</div>
						<input id="show-ps" type="checkbox" /><label id="ps" for="show-ps">パスワードを表示</label>

						<div class="form-group ">
                            <?php
                                 echo Form::button('register','Register',array('class' => 'btn btn-primary btn-lg btn-block login-button'));
                            ?>
							<!--<button type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>-->
						</div>
					<!--</form>-->
                    <?php echo Form::close();?>
				
                    <a href="login">Go Login!!</a>
				</div>
			</div>
		</div>
        
	</body>
</html>