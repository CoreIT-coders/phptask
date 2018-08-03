<?php
//include Import File && and if the user not admin Redirect to Home=>Public Area
    require '../include/temp/connect.php';
    session_start();
       if(!$_SESSION['admin']==1)
            {
                header('location:../public/Home.php?page=Home');
            }
    require '../include/temp/header.php';
    require '../include/temp/func.php';
    require '../include/temp/admindashbord.php';

?>
        <!-- Box's to view some main information about the Page like How many user is list in the page -->
            <div class="row text-center info">
                <div class="col-sm-2.5">
                    <i class="fas fa-user-circle fa-3x"></i>
                    <h4>Admins</h4>
                 <?php
                        $sql="SELECT SUM(`admin`) FROM `count` WHERE 1 ";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "<p>".$row ["SUM(`admin`)"]."</p>";
                    ?>
                </div>
                <div class="col-sm-2.5">
                    <i class="fa fa-users fa-3x"></i>
                    <h4>Users</h4>
                    <?php
                        $sql="SELECT SUM(`user`) FROM `count` WHERE 1 ";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "<p>".$row ["SUM(`user`)"]."</p>";
                    ?>
                </div>
                <div class="col-sm-2.5">
                    <i class="fa fa-hospital-alt fa-3x"></i>
                    <h4>Patient</h4>
                    <?php
                        $sql="SELECT SUM(`patient`) FROM `count` WHERE 1 ";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "<p>".$row ["SUM(`patient`)"]."</p>";
                    ?>
                </div>
                <div class="col-sm-2.5">
                    <i class="fa fa-search fa-3x"></i>
                    <h4>All search process</h4>
                    <?php
                        $sql="SELECT SUM(`search`) FROM `count` WHERE 1 ";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "<p>".$row ["SUM(`search`)"]."</p>";
                        mysqli_free_result($result);
                    ?>
                </div>
            </div>



<div class='clearfix'></div>
<?php
    require '../include/temp/footer.php';
    mysqli_close($con);

?>