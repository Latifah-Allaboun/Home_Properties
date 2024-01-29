<!DOCTYPE html>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}

if (!isset($_GET['id'])) {
    echo "No property id was provided in url";
    exit();
}

if($_SESSION['user'] != 'homeowner') {
    echo "ONLY Owners can edit property";
    exit();
}

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
        <link rel="Stylesheet" href="general.css">
        <link rel="Stylesheet" href="property_details.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <br>
                <h2>
                    <?php echo $info['name'] ?>
                </h2>
                <a href="app.php?logout=true">Log out</a>
            </div>

            <br><br>

            <div class="propinfo" style="max-width:50rem">
                <form name="form1" id="formID" action="app.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>
                            <h4>Property Information :</h4>
                        </legend>
                        <div class="formrow">
                            <label for="propertyname"> Property name:</label>
                            <input required type="text" id="propertyname" name="name" value=" <?php echo $info['name'] ?> " accesskey="n">
                        </div>
                        
                        <div class="formrow">
                            <label>Category:</label>
    
                            <select name="category">
                                <?php 
                                    $query = mysqli_query($con, "SELECT * FROM propertycategory");
                                    $items = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                    foreach($items as $item){
                                        if($item['category'] == $info['category']){
                                            echo "<option selected value='{$item['id']}'>{$item['category']}</option>";
                                        }
                                        else {
                                            echo "<option selected value='{$item['id']}'>{$item['category']}</option>";
                                        }
                                    }
                                ?>
                            </select> 
                        </div>
                        
                        <div class="formrow">
                            <label for="numbe rooms">Number of rooms:</label>
                            <input required type="number" id="room" name="room" accesskey="d" value="<?php echo $info['rooms'] ?>">
                        </div>

                        <div class="formrow">
                            <label for="Rent">Rent:</label>
                            <input required type="number" id="rent" name="rent" accesskey="i" value=<?php echo $info['rent_cost'] ?>>
                        </div>

                        <div class="formrow">
                            <label for="location"> Location:</label>
                            <input required type="text" id="location" name="location" value=" <?php echo $info['location'] ?> " accesskey="j">
                        </div>
                        <div class="formrow">
                            <label for="tenants">Max number of tenants:</label>
                            <input required type="number" id="tenants" name="tenants" accesskey="i" value=<?php echo $info['max_tenants'] ?>>
                        </div>
                        <div class="formrow">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="5" > <?php echo $info['description'] ?> </textarea>
                        </div>    
                        
                        <div class="formrow">
                            <label style="font-size:1.4rem;">Upload Images</label>
                            <input required type="file" name="images[]" accept="image/*" multiple>
                        </div>

                        <br /> <br />
                        
                        <input required hidden name="prop_id" value="<?php echo $info['id']?>">
                        <input required class="b" type="submit" name="updateProperty" value="Save" accesskey="s">
                        <br /><br /><br />
                    </fieldset>
                </form>

            </div>


            <div class="gallery">
                <?php
            $query = mysqli_query($con, "SELECT * FROM propertyimage WHERE property_id = {$info['id']}");
            $images = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($images as $image) {
                echo "<div id='p1' class='pic'>
                    <img src='{$image['path']}' alt='property img'>
                    <div style='text-align:center'>
                    <a href='app.php?delimg={$image['id']}&prop={$info['id']}' class='delet'>Delete</a>
                    </div>
                </div>";
            }
            ?>

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