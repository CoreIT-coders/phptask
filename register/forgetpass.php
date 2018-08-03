<?php
    //error_reporting(0);
    include '../include/temp/connect.php';
    session_start();
    require '../include/temp/func.php';
    
        $emailerror="";
		if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['email']))
		{
            $email=$_POST['email'];
			if(check_forgetpass_email($email))
				{
					$sql="SELECT * FROM `user` WHERE `email`='".$email."' limit 1";
					$res= mysqli_query($con, $sql);
					
						if(mysqli_num_rows($res)>0)
							{
								$row=mysqli_fetch_assoc($res);
								$_SESSION['email']   =$row['email'];
								$_SESSION['username']=$row['username'];
								header('location: restpass.php');
							}
				}
						
			else
				{
					echo "<p class='failed fixed-top'>This account not found try again</p> ";
				}
		}
?>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Forget pass</title>
            <link rel="stylesheet" href="../layout/css/bootstrap.min.css" />
            <link rel="stylesheet" href= "../layout/css/ion.css">
            <link rel="stylesheet" href= "../layout/css/backend.css">
        </head>
        <body>
            
            <form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <img class="mb-4" src="../layout/img/lo.png" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Forget your Password?</h1>
              <input type="email" name="email" class="form-control <?php echo $emailerror?>" placeholder="Email address">
                <br>
              <input class="btn btn-lg btn-primary btn-block" type="submit" value="Search for this Account">
              <input formaction="../login.php" class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
              <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form
                  
            </body>
    </html>

<?php
	mysqli_close($con);

?>