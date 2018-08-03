
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Container</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample07" style="">
          <ul class="navbar-nav mr-auto">
        <?php
            $nav="SELECT * FROM `navbar` WHERE 1";
            $result=mysqli_query($con,$nav);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                    {
                      if($row['visb']==1)
                      {
                        if($_GET['page']==str_replace(" ","",$row['item']))
                          {
                          echo "<li class='nav-item'><a class='nav-link activee' style='float:left' href='../public/".str_replace(" ","",$row['item']).".php?page=".str_replace(" ","",$row['item'])."'>".$row['item']."</a></li>";
                          }
                       else
                          {
                            echo "<li class='nav-item'><a class='nav-link' style='float:left' href='../public/".str_replace(" ","",$row['item']).".php?page=".str_replace(" ","",$row['item'])."'>".$row['item']."</a></li>";
                          }
                      }
                    }
            }
            mysqli_free_result($result);
        ?>
        <?php
            if($_SESSION['admin']==1)
        {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="../admin/adminarea.php" id="dropdown1" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">Admin Tool</a>
              <div class="dropdown-menu" aria-labelledby="dropdown1">
                <a class='dropdown-item' href='../admin/adminarea.php?page=AdminArea'>Admin Area</a>
                <div class='dropdown-divider'></div>
        <?php
            $nav="SELECT * FROM `navbar` WHERE 1";
            $result=mysqli_query($con,$nav);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                    {
                      if($row['visb']==2)
                      {
                      echo"<a class='dropdown-item' href='../admin/".str_replace(" ","",$row['item']).".php?page=".str_replace(" ","",$row['item'])."'>".$row['item']."</a>";
                      }
                    }
            }
             mysqli_free_result($result); 
       }

        ?>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav mr-right">
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <?php if(isset($_SESSION['admin']))
                         {
                          echo $_SESSION['username'];
                         }
          ?>
        </a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="../admin/Profile.php?page=Profile" >Profile</a>
                <a class="dropdown-item" href="../include/temp/logout.php" ><button class="btn btn-outline-success my-2 my-sm-0" type="button">Log out</button></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div style='margin: 56px;'></div>