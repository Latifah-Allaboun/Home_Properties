<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


session_start();
   $connection = mysqli_connect("localhost", "root", "root", "properties_home");
  
   
 $propertyID = $_POST["id"];
 
  $queryIMG = " DELETE FROM  propertyimage WHERE property_id = $propertyID  ; " ;  
 mysqli_query( $connection, $queryIMG) ;
 
  $queryAPPLICATION = " DELETE FROM  RentalApplication WHERE property_id = $propertyID  ; " ;  
 mysqli_query( $connection, $queryAPPLICATION) ;
 
 
 $query = " DELETE FROM  property WHERE id = $propertyID  ; " ;  
 mysqli_query( $connection, $query) ;
 	// header('Location:homeowner.php');
 
   //  exit;

$arr = array();
$arr['result'] = 'success';

echo json_encode($arr);