<?php
    error_reporting(0);
    include '../include/temp/connect.php';
    session_start();
     if(!isset($_SESSION['email']))
    {
        header('REFRESH:3;URL=../login.php');
        die('We face some problem sorry');
    }
    require '../include/temp/func.php';
    
        $passerror="";
        $rpasserror="";
		if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['pass']))
		{
            $pass=$_POST['pass'];
            $rpass=$_POST['rpass'];
            $email=$_SESSION['email'];
            $username=$_SESSION['username'];
			if(check_restpass_pass($pass,$rpass))
				{
                    $option=[
						'cost'=>12
						];
					$salt=md5('pcaosdsewfoorrd');
					$passsalt=$pass.$salt;
					$hash=password_hash($passsalt,CRYPT_BLOWFISH,$option);
					if(password_verify($passsalt,$hash))
						{
							$sql="UPDATE `user` SET `pass`='".$hash."' WHERE `email`='".$email."'
                            AND `username`='".$username."'";
							if(mysqli_query($con,$sql))
								{
								    header('REFRESH:3;URL=../login.php');
									echo "<p class='failed fixed-top' style='background-color: #76C04E;'>Your Password change Login again to confirm it</p> ";
								}
							else
								{
									echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems in the registration process try again</p> ";										
								}
						}
					else
                        {
							echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems in the registration process try again</p> ";
						}
					
				}
						
		}
?>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Forget Password</title>
            <link rel="stylesheet" href="../layout/css/bootstrap.min.css" />
            <link rel="stylesheet" href= "../layout/css/ion.css">
            <link rel="stylesheet" href= "../layout/css/backend.css">
        </head>
        <body>
            
            <form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <img class="mb-4" src="../layout/img/lo.png" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Enter new password</h1>
              <h1 class="h3 mb-3 font-weight-normal">User Name: <?php echo $_SESSION['username'];?></h1>
              <input type="password" name="pass" class="form-control <?php echo $passerror;?>" placeholder="Password">
            <input type="password" name="rpass" class="form-control <?php echo $rpasserror;?>" placeholder="ReEnter Password">
            <?php if(!empty($rpasserror)){ echo "<p class='text-danger'> Password Do not Match</p>";}?>
                <br>
              <input class="btn btn-lg btn-warning btn-block" type="submit" value="Change Password!!!">
              <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form
                  
            </body>
    </html>

<?php
	mysqli_close($con);

?>