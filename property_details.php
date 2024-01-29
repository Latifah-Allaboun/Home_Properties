<!DOCTYPE html>
<?php 
  if(!isset($_SESSION)) session_start();
  if(!isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
  }

  if(!isset($_GET['id'])){
    echo "No property id was provided in url";
    exit();
  }
  $prop_id  = $_GET['id'];
  include('app.php');
  
  $query = mysqli_query($con, "SELECT property.* , propertycategory.category FROM property
  JOIN propertycategory on propertycategory.id = property.property_category_id
  WHERE property.id = {$_GET['id']}");
  
  $info = mysqli_fetch_assoc($query);

  $query = mysqli_query($con, "SELECT * FROM homeowner WHERE id = {$info['homeowner_id']}");
  $owner = mysqli_fetch_assoc($query);

?>

<html>
  <head>
    <title>property-details</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="property_details.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="General.css">-->
    <script src="Signup.js"></script>
    <script src="../public_html/logOut.js"></script>


  </head>

  <body onload="breadcrumb()">
    <header>
      <img src="logo3.png" alt="logo" id="logo">
      <div id="under-header"></div>
    </header>

    <!--breadcrumb-->
    <ul class="breadcrumb">
      <li><a href="../proj/index.php">Home</a></li>
      <!--  <li id="li-element"><a href="" id ="pageID"></a></li>-->
      <li>property details</li>
    </ul>

    <div class="mymain">

      <div class="top-main">
        <?php 
          if($_SESSION['user'] != 'homeowner') {
            $query = mysqli_query($con, "SELECT * FROM rentalapplication 
            WHERE property_id = $prop_id 
            AND home_seeker_id = {$_SESSION['id']}");
            if(mysqli_num_rows($query) == 0) echo "<a href='app.php?apply={$info['id']}'>Apply</a>";
            else echo "<a href=''>Applied</a>";
          }
          else echo "<a href='Edit_property.php?id={$info['id']}'>Edit</a>";
        ?>
        <h2> <?php echo $info['name'] ?> </h2>
        <a href="app.php?logout=true">Log out</a>
      </div>

      <br><br>
      
      <div class="propinfo">
        <br>
        <h3>Property Information : </h3>
        <p> <?php echo $info['category'] ?> </p>
        <p> <?php echo $info['rooms'] ?>  rooms</p>
        <p>rent  <?php echo $info['rent_cost'] ?>  SAR</p>
        <p>location  <?php echo $info['location'] ?> </p>
        <p>maximum  <?php echo $info['max_tenants'] ?>  tenants</p>
        <p> <?php echo $info['description'] ?>  </p>
        <br>
        
        <?php if($_SESSION['user'] != 'homeowner') echo "
          <h3>Owner Information : </h3>
          <p>Name : {$owner['name']}</p>
          <p>Phone : {$owner['phone_number']}</p>
          <p>email : {$owner['email_address']}</p> <br><br>";
        ?>
      </div>


      <div class="gallery">
        <?php 
          $query = mysqli_query($con, "SELECT * FROM propertyimage WHERE property_id = {$info['id']}");
          $images = mysqli_fetch_all($query, MYSQLI_ASSOC);
          foreach($images as $image) {
           // echo "<div id='p1' class='pic'> <img src='{$image['path']}' alt='property img'></div>";
           echo '<img src="ImgDB/'.$image['path'].'" alt="property img">';
          }
        ?>
        <!-- <div id="p2" class="pic"> <img src="bedroom.jpg" alt="bedroom img"></div> -->
        <!--
          <div id="p3" class="pic"> <img src="kitchen.jpg" alt="kitchen img"></div>
          <div id="p4" class="pic"> <img src="pool.jpg" alt="pool img"></div>
        -->
      </div>

      <br><br><br><br>
      <br><br><br><br>
    </div>

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