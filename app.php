<?php 

if (!isset($_SESSION)) session_start();

$sname= "localhost";
$unmae= "root";
$password = "root";
$db_name = "properties_home";
$con = mysqli_connect($sname, $unmae, $password, $db_name);


if(isset($_GET['apply'])) {
    $prop_id = $_GET['apply'];
    $seeker_id = $_SESSION['id'];

    $sql = "INSERT INTO rentalapplication (property_id, home_seeker_id, 
    application_status_id) VALUES ($prop_id, $seeker_id, 3)";

    $query = mysqli_query($con, $sql);
    header('location:homeseeker.php');
}

if(isset($_POST['updateProperty'])) {
    $property_id = $_POST['prop_id'];
    $sql = "UPDATE property SET 
        property_category_id = {$_POST['category']},
        rooms = {$_POST['room']},
        location = \"{$_POST['location']}\",
        description = \"{$_POST['description']}\",
        name = \"{$_POST['name']}\", 
        max_tenants = {$_POST['tenants']},
        rent_cost = {$_POST['rent']}
        WHERE id = $property_id
    ";
    
    echo $sql;
    
    mysqli_query($con, $sql);
    
    if($_FILES['images']['name'][0] != '') {
        $images = $_FILES['images'];
        foreach(array_keys($images['name']) as $i){
            
            $name = rand().time().'__'.$images['name'][$i];
            $path = "images/".$name;
            move_uploaded_file($images['tmp_name'][$i], $path);
            
            $sql = "INSERT INTO propertyimage (property_id, path) VALUES ($property_id, \"$path\")";
            mysqli_query($con, $sql);
        }
    }
    
    header("location:property_details.php?id={$property_id}");
}

if(isset($_GET['delimg'])) {
    $image = $_GET['delimg'];
    
    $query = mysqli_query($con, "SELECT * FROM propertyimage WHERE id = $image ");
    $file = "./".mysqli_fetch_assoc($query)['path'];
    if(file_exists($file)) unlink($file);

    $sql = "DELETE FROM propertyimage WHERE id = $image ";
    mysqli_query($con, $sql);
    header("location:Edit_property.php?id={$_GET['prop']}");
}


if(isset($_GET['logout'])){
    if(isset($_SESSION))session_destroy();
    header("location:index.php");
}


