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
    //view the massage that return from the delete submit
    if(isset($_GET['delete']))
        {
            echo $_SESSION['delete'];
        }
    $_SESSION['delete']="";
    require '../include/temp/admindashbord.php';
                //view the Admin in table with there information to delete them
?>
                <table class="table table-striped" style="margin-bottom: 24%; width: 80%;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">email</th>
                      <th scope="col">username</th>
                      <th scope="col">Date</th>
                      <th scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
<?php
        //Select query to get all admin from the DateBase
        $i=1;
        if(true)
            {
                $sql = "SELECT `id`,`email`, `username`, `Date` FROM `user` WHERE `admin`=1";
                $result=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_assoc($result))
                {
                    $email=$row['email'];
                    echo "<tr>";
                    echo "<td scope='row'>".$i."</td>";
                    echo "<td><label name='email' value='".$row['email']."'>".$row['email']."<label></td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['Date']."</td>";
                    echo "<td><a class='btn btn-danger' href='delete_submit.php?page=admin&id=".$row['id']."'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
            }
        mysqli_free_result($result);

?>
                    </tbody>
        </table>
<div class='clearfix'></div>
<?php
    require '../include/temp/footer.php';
    mysqli_close($con);

?>