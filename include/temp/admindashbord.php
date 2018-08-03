 
            <div class='dashbord addpatient'>
                <h3><?php echo $_SESSION['username']; ?></h3>
                <div class='admin-divider'></div>
                    <ul>
                        <li><a href='../public/Home.php?page=Home'>Home</a></li>
                        <?php
                            $sql = "SELECT `item` FROM `navbar` WHERE `visb`>1  ORDER BY `rank` ASC";
                            $result=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($result))
                                {
                                    if($_GET['page']==str_replace(" ","",$row['item']))
                                        {
                                            echo "<li class='activee'><a href='../admin/".str_replace(" ","",$row['item']).".php?page=".str_replace(" ","",$row['item'])."'>".$row['item']."</a></li>";
                                        }
                                    else
                                        {
                                            echo "<li><a href='../admin/".str_replace(" ","",$row['item']).".php?page=".str_replace(" ","",$row['item'])."'>".$row['item']."</a></li>";
                                        }                                
                                }
                        ?>
                        <div class='admin-divider'></div>
                        <a href="../include/temp/logout.php" ><button class="btn btn-outline-success my-2 my-sm-0" >Log out</button></a>
                    </ul>
            </div>