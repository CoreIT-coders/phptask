<?php
error_reporting(0);
//include Import File
    require '../include/temp/connect.php';
    session_start();
            if(empty($_SESSION['username']) && empty($_SESSION['email']))
            {
                header('location:../login.php');
            }
    require '../include/temp/func.php';
    //define var for error handling
    $nameerror="";
    $diseaseerror="";
	$iraq_state=array('Baghdad','Basrah','Arbil','Anbar','Babylon','Dohuk','Qadisiyah','Diyala','Muthana',
             'Theqar','Sulaimaniya','Salaheddin','Kirkuk','Karbala','Maysan','Najaf','Nineweh','Wassit');
		//check the Request method    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //Get the value from the Form
        $name=      $_POST['name'];
        $disease=   $_POST['disease'];
        $state=     $_POST['state'];
        $birthdate= $_POST['year'].'-'.$_POST['month'];
        //Check if the value validate
        $flag=check_new_patient($name,$disease,$state);
        if($flag)
        {
            $name=strtolower(addslashes($name));
            $disease=strtolower(addslashes($disease));
            $state=strtolower(addslashes($state));
            $insert="INSERT INTO `patient`(`User`,`fullname`, `disease`, `state`, `birthdate`)
            VALUES ('".$_SESSION['username']."','".$name."','".$disease."','".$state."','".$birthdate."')";
            if(mysqli_query($con,$insert))
            {
				$counter="INSERT INTO `count`(`patient`) VALUES (1)";
                mysqli_query($con,$counter);
                header('REFRESH:2;URL=../public/Home.php?page=Home');
?>				
			<div class="container alert alert-success text-center" role="alert">
			  <h4 class="alert-heading">Add New Pation</h4>
			  <hr style="width:50%;">
			  <p class="mb-0">One Record Add Thank you</p>
			</div>
<?php
            }
        
        //if the information Dose not validate
                else
                {
?>
    <div class="container alert alert-danger text-center" role="alert">
      <h2 class="alert-heading">Warning</h2>
      <hr style="width:50%;">
      <p class="mb-0">you have Enter some incoorect Information Please try agine</p>
    </div

<?php
                }
        }
    }
        require '../include/temp/header.php';
        require '../include/temp/navbar.php';
?>

<div class="container">
    <div class="addpatient">
        <h3>Add New Patient</h3>
        <p>Please insert The correct information to ensure the public service</p>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>?page=AddNewPatient" method="POST">
                <div class="formstyle form-control">
                    <label>Enter The Patient Full Name</label><br>
                    <input type="text" name="name" placeholder="Full Name" required>
                    <?php echo"<label class='text-danger'>&nbsp;&nbsp;&nbsp;".$nameerror."</label>"?><br>
                    <label>Enter The Disease For Patient</label><br>
                    <input type="text" name="disease" placeholder="The Disease" required>
                    <?php echo"<label class='text-danger'>&nbsp;&nbsp;&nbsp;".$diseaseerror."</label>"?><br>
                    <label>Enter The State of Patient</label><br>
                    <select name="state">
								<?php
									foreach($iraq_state as $x)
										{
											echo "<option>".$x."</option>";
										}
								?>
						
					</select><br>
                    <label>Enter Date of Birth For Patient</label><br>
                    Year&nbsp;<select name="year">
                        <?php
                                for($i=date('Y')-100;$i<=date('Y')-2;$i++)
                                    {echo "<option>".$i."</option>";}
                        ?>
                    </select>
                    
                    Month&nbsp;<select name="month">
                        <?php
                                for($i=1;$i<=12;$i++)
                                    {echo "<option>".$i."</option>";}
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Add New Patient">
            </form>
    </div>
</div>

<?php
    require '../include/temp/footer.php';
    mysqli_close($con);
?>