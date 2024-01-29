<?php
 session_start();
$connection = mysqli_connect("localhost", "root", "root", "properties_home");
if($_SERVER["REQUEST_METHOD"] == "POST"){  // when the user submit the form        
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']); 
    $age = $_POST['age'];
    $nof = $_POST['family'];
    $inc = $_POST['income'];
    $jop = mysqli_real_escape_string($connection, $_POST['jop']);
    $pNo = $_POST['phoneNo'];
    $psw = $_POST['pwd'];  // hass the password
    $hpass = password_hash($psw, PASSWORD_DEFAULT);
    $sel = "SELECT email_address FROM homeseeker WHERE email_address = '$email'"; // check for the user if they have account or not
    $res = mysqli_query($connection, $sel);
    if(mysqli_num_rows($res)>0){
      // $error[] = "User Arelady Exit";
        $_SESSION["user"] = "homeseeker";
       // echo '<p> user exit</p>';
        $msg = '<h4 style="color:red;">user exit!</h4>';
                        echo $msg;
      header('location: loginS.php'); // go to the log in page 

    } 
    else{
    
     $ins ="INSERT INTO homeseeker VALUES (NULL,'$name','$lname','$age','$nof','$inc','$jop','$pNo','$email','$hpass')";
      mysqli_query($connection, $ins);  
       $_SESSION["user"] = "homeseeker"; // know the type of user
       header('location: loginS.php'); // go to the log in page 
    }
  
      

    
   
        
    
    
     
    
    
     
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign-up</title>
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
  <li><a href="../proj/index.php">Home</a></li>
  <li>Sign-up</li>
   </ul>

        <main>



            <form name="form1" id="formID"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                <fieldset>
                    <legend><h3>Sign-up</h3></legend>
                    <?php
                    if(isset($erorr)){
                        foreach ($erorr as $erorr){
                            echo '<label style="color: red">'.$erorr.'</label>';
                        }
                    }
                    
                    ?>

                    <label for="firstname"> First name:</label><br>
                    <input required type="text" id="firstnameid" name="name" value="" accesskey="n"><br>

                    <label for="lastname"> Last name:</label><br>
                    <input required type="text" id="lastnameid" name="lname" value="" accesskey="l"><br>

                    <label for="age">Age:</label><br>
                    <input required type="number" id="age" name="age" accesskey="d"><br>
                    <label for="age">Number of family members:</label><br>
                    <input required type="number" id="family" name="family" accesskey="f"><br>

                    <label for="income">income:</label><br>
                    <input required type="number" id="income" name="income" accesskey="i"><br>

                    <label for="job"> Job:</label><br>
                    <input required type="text" id="job" name="job" value="" accesskey="j"><br>

                    <label for="phoneNo">Phone Number:</label><br>
                    <input required type="tel" id="phoneNo" name="phoneNo" accesskey="p"><br>

                    <label for="email">Email address:</label><br>
                    <input required type="email" id="email" name="email" value="" accesskey="e"><br>

                    <label for="pwd">Password:</label><br>
                    <input required type="password" id="pwd" name="pwd"><br><br>
                    
                   


                    <input required class="b" type="submit" value="Sign-up" >

                </fieldset>
            </form>
            <br /><br /><br /><br /><br />


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




