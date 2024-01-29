<?php


   $connection = mysqli_connect("localhost", "root", "root", "properties_home");

   $queryT = " UPDATE rentalapplication SET application_status_id  = '3' WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //decline this application
 
  $arr = array();
$arr['result'] = 'success';

echo json_encode($arr);


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

