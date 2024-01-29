<?php  // login page 
session_start();
$connection = mysqli_connect("localhost", "root", "root", "properties_home");
if($_SERVER["REQUEST_METHOD"] == "POST"){  // when the user submit the form 
    $email = $_POST['email']; 
  //  $psw = password_hash($_POST['pwd'], PASSWORD_DEFAULT);  // hass the password
    $psw = $_POST['pwd']; // hass the password

    //$selO ="SELECT FROM homeowner WHERE email_address = '$email' && password = '$psw' "; 
    $sel = "SELECT * FROM homeowner WHERE email_address = '$email' "; 
     $res = mysqli_query($connection, $sel);
     $row = mysqli_fetch_array($res);
         if(mysqli_num_rows($res)>0 && password_verify($psw, $row['password'])){
             $id= $row["id"];
             $_SESSION["id"]=$id;
             $_SESSION["user"] = "homeowner";
		 $_SESSION["login"] = true;

       header('location:HomeOwner.php'); // go to the log in page 
    
             
         }
         else{
			$msg = '<h4 style="color:red;">Incorrect username or password!</h4>';
                        echo $msg;
		}
    
}
  
        
      

        

?>

<!DOCTYPE html>
<html>

<head>
    <title>log-in</title>
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
  <li><a href="index.php">Home</a></li>
  <li>Login</li>
   </ul>

<main>



<form name="form1" id="formID" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
    <legend><h3>Log-in</h3></legend>
    
      
        
        <label for="email">Email address:</label><br>
      <input required type="email" id="email" name="email" value="" accesskey="e" ><br>
        
        <label for="pwd">Password:</label><br>
         <input required type="password" id="pwd" name="pwd"><br><br>
      
    
       <input required  class ="b" type="submit"  value="Log-in" >
       
     </fieldset>
   </form>
  
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
