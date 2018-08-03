<?php
    require '../include/temp/connect.php';
    session_start();
    require '../include/temp/header.php';
    require '../include/temp/navbar.php';
    require '../include/temp/func.php';
    $search="Search here";

?>
    <div style="max-height: 100%;display: inline-block;float: left;height: 543px;"></div>
    <div class="container">
        <div class="addpatient">
            <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>?page=SearchForPatient" method="post">
              <label>Enter The name of Patient or Enter 'All' to view all Patient</label><br>
              <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="name" class="form-control" placeholder="<?php echo $search;?>">
                 <select class="form-group mx-sm-3 mb-2 select" name="sort">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
              </div>
              <input type="submit" class="btn btn-primary mb-2" value="Search">
            </form>
        </div>
    </div>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $searchname= $_POST['name'];
        if(check_for_search($searchname))
        {
?>
    <div class="container">
        <table class="table table-striped" style="margin-bottom: 24%;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Disease</th>
              <th scope="col">State</th>
              <th scope="col">Age</th>
            </tr>
          </thead>
          <tbody>
<?php

            $searchname=strtolower(addslashes($searchname));
            $i=1;
            if($searchname=='all')
            {
                $sql="SELECT * FROM `patient` ORDER BY `fullname`".$_POST['sort']."";
                $result=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_assoc($result))
                {
                    $age = strstr($row['birthdate'], '-', true)-date('Y');
                    echo "<tr>";
                    echo "<td scope='row'>".$i."</td>";
                    echo "<td>".ucwords($row['fullname'])."</td>";
                    echo "<td>".ucwords($row['disease'])."</td>";
                    echo "<td>".ucwords($row['state'])."</td>";
                    echo "<td>".str_replace('-','',$age)."</td>";
                    echo "</tr>";
                    $i++;
                }
                $counter="INSERT INTO `count`(`search`) VALUES (1)";
                $result=mysqli_query($con,$counter);
            }
            else
            {
                $sql="SELECT * FROM `patient` WHERE `fullname` LIKE '%".$searchname."%' ";
                $result=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_assoc($result))
                {
                    $age = strstr($row['date'], '-', true)-date('Y');
                    echo "<tr>";
                    echo "<td scope='row'>".$i."</td>";
                    echo "<td>".ucwords($row['fullname'])."</td>";
                    echo "<td>".ucwords($row['disease'])."</td>";
                    echo "<td>".ucwords($row['state'])."</td>";
                    echo "<td>".str_replace('-','',$age)."</td>";
                    echo "</tr>";
                    $i++;
                }
                $counter="INSERT INTO `count`(`search`) VALUES (1)";
                $result=mysqli_query($con,$counter);
            }
?>
          </tbody>
        </table>
    </div>
<?php
        }
    }
?>

<div class='clearfix'></div>
<?php
    require '../include/temp/footer.php';
    mysqli_close($con);

?>