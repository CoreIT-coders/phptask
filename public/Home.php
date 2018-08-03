<?php
    require '../include/temp/connect.php';
    session_start();
    require '../include/temp/header.php';
    require '../include/temp/navbar.php';
    require '../include/temp/slide.php';
?>







<?php
    require '../include/temp/aboutus.php';
    require '../include/temp/footer.php';
    mysqli_close($con);
?>