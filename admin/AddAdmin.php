<?php
error_reporting(0);
//include Import File && and if the user not admin Redirect to Home=>Public Area
    require '../include/temp/connect.php';
    session_start();
       if(!isset($_SESSION['admin']) || !$_SESSION['admin']==1)
            {
                header('location:../login.php');
            }
    require '../include/temp/func.php';
    //define var for error handling
        $nameerror="";
		$emailerror="";
        $usererror="";
        $passerror="";
        $rpasserror="";
		//check the Request method
		if($_SERVER['REQUEST_METHOD']=='POST')
            {
				//Get the value from the Form
                $name=	addslashes($_POST['name']);
                $email=	addslashes($_POST['email']);
                $user=	addslashes($_POST['user']);
                $pass=	addslashes($_POST['pass']);
                $rpass=	addslashes($_POST['rpass']);
				//Check if the value validate
                if(check_signup($name,$email,$user,$pass,$rpass))
                    {
						//Add salt to password
						$option=[
							'cost'=>12
							];
						$salt=md5('pcaosdsewfoorrd');
						$passsalt=$pass.$salt;
						$hash=password_hash($passsalt,CRYPT_BLOWFISH,$option);
						if(password_verify($passsalt,$hash))
							{
								//insert into date base
								$sql="INSERT INTO `user`(`name`, `email`, `username`, `pass`, `admin`, `Date`) VALUES
											('".$name."','".$email."','".$user."','".$hash."',1,'".date('Y-m-d h:i:s')."')";
								if(mysqli_query($con,$sql))
									{
                                        $counter="INSERT INTO `count`(`admin`) VALUES (1)";
                                        $result=mysqli_query($con,$counter);
                                        header('REFRESH:3;URL=adminarea.php?page=AdminArea');
										echo "<p class='failed fixed-top' style='background-color: #76C04E;'>Admin add success</p><div style='padding-top: 25px;'></div> ";
									}
								else
									{
										echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems try again</p><div style='padding-top: 25px;'></div> ";										
									}
								
							}
							//if the salt doesnot add
						else
							{
								echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems try again</p><div style='padding-top: 25px;'></div> ";
							}
                    }
					//if the information Dose not validate
                else
                    {
                        if (!empty($email))
                            {
                                echo "<p class='failed fixed-top'>Admin does not added </p><div style='padding-top: 25px;'></div> ";
                            }
                    }
            }
            require '../include/temp/header.php';
            require '../include/temp/admindashbord.php';
		//Html Form With Error Handling
?>
    <form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>?page=AddAdmin" method="POST">
		  <h1 class="h3 mb-3 font-weight-normal">Fill The information</h1>
            <input type= "text"  name="name" class="form-control <?php echo $nameerror;?>" maxlength="20" placeholder="Full Name">
            <input type="email" name="email" class="form-control <?php echo $emailerror;?>" placeholder="Email">
            <input type= "text"  name="user" class="form-control <?php echo $usererror;?>" placeholder="User Name">
            <input type="password" name="pass" class="form-control <?php echo $passerror;?>" placeholder="Password">
            <input type="password" name="rpass" class="form-control <?php echo $rpasserror;?>" placeholder="ReEnter Password">
            <?php if(!empty($rpasserror)){ echo "<p class='text-danger'> Password Do not Match</p>";}?>
		  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Add Admin">
		</form>

<div class='clearfix'></div>
<?php
    require '../include/temp/footer.php';
    mysqli_close($con);

?>