<?php
//include Import File
error_reporting(0);
include 'include/temp/connect.php';
    session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['email']))
        {
            
        }
    require 'include/temp/func.php';
    	//define var for error handling
		$emailerror="";
		$passerror ="";
		$flag='false';
		//check the Request method
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			//Get the value from the Form
			$email = addslashes($_POST['email']);
			$pass  = addslashes($_POST['pass']);
			//Check if the value validate
			if(check_login($email,$pass))
			{
				//Compare the value insert by user with the date in DateBase
				$sql="SELECT * FROM `user` WHERE `email`='".$email."' limit 1";
				$res= mysqli_query($con, $sql);
														
					if(mysqli_num_rows($res)>0)
						{
							$row=mysqli_fetch_assoc($res);
									$option=[
										'cost'=>12
										];
									$salt=md5('pcaosdsewfoorrd');
									$passsalt=$pass.$salt;
									if(password_verify($passsalt,$row['pass']))
										{
											//value insert by user is correct
											$_SESSION['username']=$row['username'];
											$_SESSION['email']   =$row['email'];
											$_SESSION['admin']   =$row['admin'];
										    header('location:../public/Home.php?page=Home');
											exit;
										}
									//value insert by user is incorrect
									else
										{
											echo "<p class='failed fixed-top'>Login failed </p> ";
										}
						}
					else
						{
							echo "<p class='failed fixed-top'>Login failed </p> ";
						}
			}
			//if the information Dose not validate
			else
				{
					if(!empty($_POST['email']))
					echo "<p class='failed fixed-top'>Login failed </p> ";
				}
			
		}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign In</title>
		<link rel="stylesheet" href="layout/css/bootstrap.min.css" />
        <link rel="stylesheet" href= "layout/css/ion.css">
	
    </head>
    <body>
	<?php
		//Html Form With Error Handling
    ?>
		<form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		  <img class="mb-4" src="layout/img/lo.png" alt="" width="72" height="72">
		  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		  <input type="email" name="email" class="form-control <?php echo $emailerror?>" placeholder="Email address">
		  <input type="password" name="pass" class="form-control <?php echo $passerror?>" placeholder="Password">
		  <div class="checkbox mb-3">
			<label>
			  <input type="checkbox" value="remember-me"> Remember me
			</label>
		  </div>
		  <input class="btn btn-lg btn-primary btn-block" style="width: 48%; float: left; margin-right: 12px;" type="submit" value="Sign in">
		  <input formaction="register/up.php"  class="btn btn-lg btn-primary btn-block" style="width: 48%;" type="submit" value="Sign up">
		  <input formaction="register/forgetpass.php" class="btn btn-lg btn-danger btn-block" type="submit" value="Forget Password?">
		  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
	</body>
</html>

<?php

	mysqli_close($con);

?>