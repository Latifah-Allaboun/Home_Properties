
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}

if (!isset($_GET['id'])) {
    echo "No applicant id was provided in url";
    exit();
}

if($_SESSION['user'] != 'homeowner') {
    echo "ONLY Owners can view applicant's information";
    exit();
}

include('app.php');

$query = mysqli_query($con, "SELECT * From homeseeker  
  WHERE id = {$_GET['id']}");
  $info = mysqli_fetch_assoc($query);

//include('app.php');

?>

<!DOCTYPE html>

<html>

<head>
    <title>Applicant's Information </title>
	<meta charset="utf-8">
	<link rel="Stylesheet" href="general.css">
	<link rel="stylesheet" href="Signup.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="General.css">-->
	<script src="Signup.js"></script>  

</head>

<body>
<header>

   <img src="logo3.png" alt="logo" id="logo">
      <div id="under-header"></div>  
</header>

     <!--breadcrumb-->
        <ul class="breadcrumb">
  <li><a href="HomeOwner.php">Homeowner</a></li>
  <li>Applicant’s Information</li>
   </ul>

        <main>
            
             <?php
                   
                   /*$HomeSeekerInfo = "SELECT * FROM homeseeker WHERE id = '$id' ";
                   
                   $reslutInfo = mysqli_query($connection , $HomeSeekerInfo);
                   
                    while ($rows = mysqli_fetch_assoc($reslutInfo)) {

                  */ ?>
            </div>

            <div id="AI">
                <br>
                <h4> Applicant’s Information  : </h4>
                <p>First Name : <?php echo $info['first_name']?></p>
                <p>Last Name : <?php echo $info['last_name']?> </p>
                <p> Age: <?php echo $info['age']?></p>
                <p>Number of family members : <?php echo $info['family_members']?></p>
                <p>income: <?php echo $info['income']?></p>
                <p> Job: <?php echo $info['job']?> </p>
                <p> Phone Number: <?php echo $info['phone_number']?></p>
                <p> Email address: <?php echo $info['email_address']?></p><br>
            </div>
            
                         <?php
    
                        //mysqli_close($connection);

            ?>
            
             <?php
                   // } ?>


        </main>

    <footer>
         <div class="foot">

              <div class="w3-xlarge w3-section">
                  <i class="fa fa-facebook-official w3-hover-opacity"></i>
                  <i class="fa fa-instagram w3-hover-opacity"></i>
                  <i class="fa fa-snapchat w3-hover-opacity"></i>
                  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                  <i class="fa fa-twitter w3-hover-opacity"></i>
                  <i class="fa fa-linkedin w3-hover-opacity"></i>
              </div>
                <p>@2023 Home Properties</p>
        </div>
    </footer>
</body>

</html>