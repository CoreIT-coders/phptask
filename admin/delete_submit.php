<?php
//include Import File && and if the user not admin Redirect to Home=>Public Area
    require '../include/temp/connect.php';
    session_start();
       if(!$_SESSION['admin']==1)
            {
                header('location:../public/Home.php?page=Home');
                die();
            }
	//Get the id that was send by delete page to and check if ther is id like this
            $id=$_GET['id'];
            $sql="SELECT * FROM `user` WHERE `id`=".$id." limit 1";
			$res= mysqli_query($con, $sql);
			if(mysqli_num_rows($res)>0)
				{
				//if the ID was correct submit the delete and return to the same page
                    $del="DELETE FROM `user` WHERE `id`=".$id ;
                    if(mysqli_query($con,$del))
                        {
                    
                            if($_GET['page']=="user")
                                {
                                    $counter="INSERT INTO `count`(`user`) VALUES (-1)";
                                    $result=mysqli_query($con,$counter);
                                    $_SESSION['delete']="<p class='failed fixed-top' style='background-color: #76C04E;'>The User Delete </p><div style='padding-top: 25px;'></div>";
                                    header('location:DeleteUsers.php?delete&page=DeleteUsers');
                                }
                            elseif($_GET['page']=="admin")
                                {
                                    $counter="INSERT INTO `count`(`admin`) VALUES (-1)";
                                    $result=mysqli_query($con,$counter);
                                    $_SESSION['delete']="<p class='failed fixed-top' style='background-color: #76C04E;'>The Admin Delete </p><div style='padding-top: 25px;'></div>";
                                    header('location:DeleteAdmins.php?delete&page=DeleteAdmins');
                                }
                        }
                }
			//if there is no id like this
            elseif(mysqli_num_rows($res)==0)
                {
                  if($_GET['page']=="admin")
                        {
                            $_SESSION['delete']="<p class='failed fixed-top'>The Admin wasn't Delete </p><div style='padding-top: 25px;'></div>";
                            header('location:DeleteAdmins.php?delete&page=DeleteAdmins');
                        }
                    elseif($_GET['page']=="user")
                        {
                            $_SESSION['delete']="<p class='failed fixed-top'>The User wasn't Delete </p><div style='padding-top: 25px;'></div>";
                            header('location:DeleteUsers.php?delete&page=DeleteUsers');
                        }  
                }
            mysqli_free_result($res);
       
    mysqli_close($con);
?>