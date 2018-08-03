<!DOCTYPE html>
<?php
    if(empty($_SESSION['username']) && empty($_SESSION['email']))
    {
        header('location:../login.php');
    }
?>
    <html>
        <head>
           <meta charset="UTF-8">
           <title><?php
                        $sql = "SELECT `item` FROM `navbar` WHERE 1";
                        $result=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($result))
                            {
                                if($_GET['page']==str_replace(" ","",$row['item']))
                                    {
                                        echo $row['item'];
                                    }
                            }
                    ?></title>
           <link rel="stylesheet" href="../layout/css/bootstrap.min.css" />
           <link rel="stylesheet" href="../layout/css/fontawesome-all.min.css" />
           <link rel="stylesheet" href="../layout/css/backend.css" />
        </head>
        <body>