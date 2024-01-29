<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $psw1 = "343"; // password for the 1 user
        $psw2 = "223";  // password for the 2 user
        $psw3 = "434";  // password for the 2 user
        $psw4 = "535";  // password for the 4 user
        
        $hpass1 = password_hash($psw1, PASSWORD_DEFAULT);
        $hpass2 = password_hash($psw2, PASSWORD_DEFAULT);
        $hpass3 = password_hash($psw3, PASSWORD_DEFAULT);
        $hpass4 = password_hash($psw4, PASSWORD_DEFAULT);
        
     $ins1 ="INSERT INTO homeowner VALUES (NULL,'Nouf','35743545','Nouf@gmail.com','$hpass1')";  //user for home owner
     $ins2 ="INSERT INTO homeowner VALUES (NULL,'Lama','35743545','Lama@gmail.com','$hpass2')"; //user for home owner
     $ins3 ="INSERT INTO homeseeker VALUES (NULL,'Hamad','Ahmed','34','2','30000','HR','0987657','Hamad@gmail.com','$hpass3')"; //user for home seeker
     $ins4 ="INSERT INTO homeseeker VALUES (NULL,'Ziyad','Hamad','54','5','40000','ceo','456789','Ziyad@gmail.com','$hpass4')"; //user for home seeker
     
     mysqli_query($connection, $ins1); 
     mysqli_query($connection, $ins2); 
     mysqli_query($connection, $ins3); 
     mysqli_query($connection, $ins4); 

        ?>
    </body>
</html>
