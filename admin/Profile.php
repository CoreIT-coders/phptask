<?php
//include Import File && and if the user not admin Redirect to Home=>Public Area
    require '../include/temp/connect.php';
    require '../include/temp/func.php';
    session_start();
       if(!$_SESSION['admin']==1)
            {
                require '../include/temp/header.php';
                require '../include/temp/navbar.php';
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
                            if(change_user_date($name,$email,$user))
                                {
                                    //if password field is not empty
                                    if(change_user_password($pass,$rpass))
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
                                                //update information with change password
                                                $update="UPDATE `user` SET `name`='".$name."',`email`='".$email."',`username`='".$user."'
                                                            ,`pass`='".$hash."' WHERE `email`='".$_SESSION['email']."'";
                                                if(mysqli_query($con,$update))
                                                    {
                                                        $_SESSION['username']=$user;
                                                        $_SESSION['email']   =$email;
                                                        echo "<p class='failed fixed-top' style='background-color: #76C04E;'>information change with password</p><div style='padding-top: 25px;'></div> ";
                                                        header('REFRESH:3;URL=adminarea.php?page=AdminArea');
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
                                    //if password field is empty
                                    else
                                        {
                                            //update information without change password
                                            $update="UPDATE `user` SET `name`='".$name."',`email`='".$email."',`username`='".$user."'
                                            WHERE `email`='".$_SESSION['email']."'";
                                                if(mysqli_query($con,$update))
                                                    {
                                                        $_SESSION['username']=$user;
                                                        $_SESSION['email']   =$email;
                                                        echo "<p class='failed fixed-top' style='background-color: #76C04E;'>information change BUT password not change</p><div style='padding-top: 25px;'></div> ";
                                                        header('REFRESH:3;URL=adminarea.php?page=AdminArea');
                                                    }
                                                else
                                                    {
                                                        echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems try again</p><div style='padding-top: 25px;'></div> ";										
                                                    }
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
                    $select="SELECT * FROM `user` WHERE `email`='".$_SESSION['email']."' LIMIT 1";
                    $res=mysqli_query($con,$select);
                    $row=mysqli_fetch_assoc($res);
                    //Html Form With Error Handling
            ?>
                <form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>?page=AddAdmin" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal">Your profile</h1>
                    <p class="mb-3 font-weight-normal">if you dont want to change any field, make it as it was</p>
                    <label class="labelform">Full Name</label>
                        <input type= "text"  name="name" class="form-control" value="<?php echo $row['name'];?>" maxlength="30">
                    <label class="labelform">Email</label>
                        <input type="email" name="email" class="form-control " value="<?php echo $row['email'];?>">
                    <label class="labelform">User Name</label>
                        <input type= "text"  name="user" class="form-control " value="<?php echo $row['username'];?>">
                    <label class="labelform">Let him empty if you dont want change it</label>
                        <input type="password" name="pass" class="form-control " placeholder="Password">
                        <input type="password" name="rpass" class="form-control " placeholder="ReEnter Password">
                        <?php if(!empty($rpasserror)){ echo "<p class='text-danger'> Password Do not Match</p>";}?>
                      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Change">
                    </form>
                            
                    <div class='clearfix'></div>
<?php
            }
        else
        {
            require '../include/temp/header.php';
            require '../include/temp/admindashbord.php';
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
                if(change_user_date($name,$email,$user))
                    {
                        //if password field is not empty
                        if(change_user_password($pass,$rpass))
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
                                    //update information with change password
                                    $update="UPDATE `user` SET `name`='".$name."',`email`='".$email."',`username`='".$user."'
                                                ,`pass`='".$hash."' WHERE `email`='".$_SESSION['email']."'";
                                    if(mysqli_query($con,$update))
                                        {
                                            $_SESSION['username']=$user;
											$_SESSION['email']   =$email;
                                            echo "<p class='failed fixed-top' style='background-color: #76C04E;'>information change with password</p><div style='padding-top: 25px;'></div> ";
                                            header('REFRESH:3;URL=adminarea.php?page=AdminArea');
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
						//if password field is empty
						else
							{
                                //update information without change password
								$update="UPDATE `user` SET `name`='".$name."',`email`='".$email."',`username`='".$user."'
                                WHERE `email`='".$_SESSION['email']."'";
                                    if(mysqli_query($con,$update))
                                        {
                                            $_SESSION['username']=$user;
											$_SESSION['email']   =$email;
                                            echo "<p class='failed fixed-top' style='background-color: #76C04E;'>information change BUT password not change</p><div style='padding-top: 25px;'></div> ";
                                            header('REFRESH:3;URL=adminarea.php?page=AdminArea');
                                        }
                                    else
                                        {
                                            echo "<p class='failed fixed-top' style='background-color: #ffc107;'>Sorry we face some problems try again</p><div style='padding-top: 25px;'></div> ";										
                                        }
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
        $select="SELECT * FROM `user` WHERE `email`='".$_SESSION['email']."' LIMIT 1";
        $res=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($res);
		//Html Form With Error Handling
?>
        <form class="form-signin text-center d-block" action="<?php echo $_SERVER['PHP_SELF'];?>?page=AddAdmin" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Your profile</h1>
            <p class="mb-3 font-weight-normal">if you dont want to change any field, make it as it was</p>
            <label class="labelform">Full Name</label>
                <input type= "text"  name="name" class="form-control" value="<?php echo $row['name'];?>" maxlength="30">
            <label class="labelform">Email</label>
                <input type="email" name="email" class="form-control " value="<?php echo $row['email'];?>">
            <label class="labelform">User Name</label>
                <input type= "text"  name="user" class="form-control " value="<?php echo $row['username'];?>">
            <label class="labelform">Let him empty if you dont want change it</label>
                <input type="password" name="pass" class="form-control " placeholder="Password">
                <input type="password" name="rpass" class="form-control " placeholder="ReEnter Password">
                <?php if(!empty($rpasserror)){ echo "<p class='text-danger'> Password Do not Match</p>";}?>
              <input class="btn btn-lg btn-primary btn-block" type="submit" value="Change">
            </form>
    
    <div class='clearfix'></div>
<?php
        }
    require '../include/temp/footer.php';
    mysqli_close($con);

?>