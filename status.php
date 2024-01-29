<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();
   $connection = mysqli_connect("localhost", "root", "root", "properties_home");
  
$rentalid  =  $_GET["propertyID"] ;
$seekerid  = $_GET["HomeSeekerID"] ;     
$action = $_GET["action"];

if($action=="accept"){
    
   $queryT = " UPDATE rentalapplication SET application_status_id  = '1'  WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //accept

$queryT2 = " UPDATE rentalapplication SET application_status_id = '3' WHERE property_id = '$rentalid' AND home_seeker_id <> '$seekerid' AND application_status_id = '2' ; " ;  
 mysqli_query( $connection, $queryT2) ; //decline other application
 


 header('Location:HomeOwner.php');
    exit; 
}

else{
     $queryT = " UPDATE rentalapplication SET application_status_id  = '3' WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //decline this application
 

 header('Location:HomeOwner.php');
    exit; 
}


