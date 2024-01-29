<?php
session_start();
   $connection = mysqli_connect("localhost", "root", "root", "properties_home");
  
$rentalid  =  $_POST["Pid"];
$seekerid  = $_POST["Sid"];     
//$action = $_GET["action"];


    
   $queryT = " UPDATE rentalapplication SET application_status_id  = '1'  WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //accept

$queryT2 = " UPDATE rentalapplication SET application_status_id = '3' WHERE property_id = '$rentalid' AND home_seeker_id <> '$seekerid' AND application_status_id = '2' ; " ;  
 mysqli_query( $connection, $queryT2) ; //decline other application
 
 $output = "Accept";
 //$arr = array();
//$arr['result'] = 'success';


echo json_encode($output) ;


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

