<?php

//$idData = $_POST['id'];
//echo $id_seeker ;
//$idData= trim($idData);
//if($_SESSION["user"] == "homeseeker"){
   
//$id = $_SESSION['id'];

//}
//$id = $_SESSION['id'];


$connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
       // echo "Connect!!!!!!!!!!";
       // echo 'outside';
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //    echo 'insideeeeeeee';
              $idCat = $_POST['idCat'];
             $H_id = $_POST['homeSekkerID'];

             //$intID = (int)$H_id;

             
           //    echo 'Output  '.$idCat ;
         $myObj = array();
               
   /* $sqlQueryCat = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id ,  property.id
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id
                      WHERE propertycategory.id =".$idCat;*/
         
         $sqlQueryCat="select *, p.id as property_id from Property p join PropertyCategory c on p.property_category_id=c.id where p.id not in (select property_id from RentalApplication where home_seeker_id=$H_id) and c.id=$idCat";
                 $resultFin =  mysqli_query($connection, $sqlQueryCat);
                        

                while($rows= mysqli_fetch_assoc($resultFin)) {
      
                                $myObj[] = $rows;
                                
                                
                }       

      

     header('Content-Type: text/plain');

        print_r(json_encode($myObj));
                
            }
                mysqli_close($connection);


}