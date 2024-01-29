


<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ApplyRent
 *
 * @author danahiphone
 */


        
        $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
           echo "Connect!!!!!!!!!!";
           
           
         if ($_SERVER['REQUEST_METHOD'] == "GET") {
      //  $location = $_POST['location'];
        
                                     
              
                          $pID= $_GET['propertyID'];
                          $HomeSeekerID = $_GET['HomeSeekerID'];
           //  $pID = $_GET['property_id'];
            //  $HSid = $_GET['home_seeker_id'];
              $appStatus = 2;
        
        
        $Insertquery = "INSERT INTO rentalapplication (id, property_id, home_seeker_id, application_status_id)
                   VALUES (NULL, '$pID', $HomeSeekerID, '$appStatus') ";
                  $result = mysqli_query($connection, $Insertquery);

         
               header("Location: HomeSeeker.php");

    }
        }
  
  
        
        
