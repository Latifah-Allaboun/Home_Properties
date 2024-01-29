
<?php
// Start the session
session_start();
?>

<?php

if (!isset($_SESSION['id'])){
     header('Location:login.php');
 
}

$id = $_SESSION['id'];

//$id =2;

if(!$_SESSION['login']==true){
       header('location: index.php');
   }
      
      
?>


<!DOCTYPE html>

<html>
     <?php
        
        $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
        //    echo "Connect!!!!!!!!!!";
        }
  
        ?>
    
   
   <head>
    <title>HomeSeekers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HomeownerStyle.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <script src="logOut.js"></script> 

             
             
    
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    
                    
                        <script>
                 $(document).ready(function(){
                $("select").change(function(){
                var idCatValue = $("#category").val();
                var home_seekr = <?php echo json_encode($id); ?>;
                var homeSeekerIDp = parseInt(home_seekr);
                   console.log(homeSeekerIDp);

                $.post("showRent.php",{ 
                   idCat:idCatValue,
                   homeSekkerID:homeSeekerIDp
                },
                   function(data){
                  var obj = JSON.parse(data); 
        $("#tableId").html("").css({"border-collapse": "collapse", "width": "70%","margin-left":"auto","margin-right":"auto","border":"solid 1px white" , "margin-bottom":"100px","background":"#C2C5AA","color":"black"});
          $("#tableId").append("<caption>Home for rent</caption>");
        $("#tableId").append("<tr>"+"<th>Property Name</th>"+
                             "<th>Category</th>"+
                             "<th> Rent</th>"+
                             "<th>Rooms</th>"+
                             "<th>Location</th>"+                             
            "<tr>"
                   ).css( {"background":"#C2C5AA","color": "white"}) ;       
        for(i=0; i<obj.length; i++){
                        
                     var res = $("<tr>").css({"color":"#936639"});
                    // console.log($.param(obj[i].id));
                    var Property_id = obj[i].property_id;
                    console.log(Property_id);
                     res.append("<td>"+"<a href=property_details.php?id="+Property_id+">"+obj[i].name+"</a>"+"</td>");
                     res.append("<td>"+obj[i].category+"</td>");
                    res.append("<td>"+obj[i].rent_cost +"</td>");
                    res.append("<td>"+obj[i].rooms +"</td>");
                     res.append("<td>"+obj[i].location + "</td>");
                     res.append("<td>"+"<a href=ApplyRent.inc.php?propertyID="+Property_id+"&&HomeSeekerID="+homeSeekerIDp+">"+"Apply"+"</a>"+ "</td>"+"</tr>");
                     $("#tableId").append(res);
                     }
                  });
                });
            });

         
    </script>
</head>

<body>
        <header>
        <img src="logo3.png" alt="logo" id="logo">
        <div id="under-header"></div>

    </header>
    
    
     <!--breadcrumb-->
        <ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Home seeker</li>
   </ul>
    
     
    <main>
        <button class="b"><a href="app.php?logout=true">Log-Out</a></button>

         <?php
                   
                   $HomeSeekerInfo = "SELECT * FROM homeseeker WHERE id = '$id' ";
                   
                   $reslutInfo = mysqli_query($connection , $HomeSeekerInfo) ;
                   
                    while ($rows = mysqli_fetch_assoc($reslutInfo)) {

                   ?>
            <div id="owner-info">
                <h1 id="welcome">&nbsp;Welcome <?php echo $rows['first_name']?>!</h1>
                
               <!-- <h3>&nbsp;Homeowner information</h3>-->
               <div id="infoPre">
                    
                       <pre id="SeekerId">
                    Name:<?php echo $rows['first_name']." ".$rows['last_name']?><br>
                   Phone number:<?php echo $rows['phone_number']?><br>
                   Email:<?php echo $rows['email_address']?>
                </pre>
                   
                
                   
               </div>
               
               <?php
                    } ?>
             
            </div>
            <table>
                <caption>Requested  Home</caption>

                <thead>
                <th>Property Name</th>
                <th>Category</th>
                <th>Rent</th>
                <th>Status</th>
                </thead>

                
                
                
             
                
                
                
                <?php
         
                 $rentalQuery2 ="SELECT rentalapplication.id , property.id , property.rent_cost , property.name , propertycategory.id , propertycategory.category , applicationstatus.id , applicationstatus.status ,
rentalapplication.property_id
FROM rentalapplication
JOIN property
ON rentalapplication.property_id = property.id
JOIN propertycategory
ON property.property_category_id= propertycategory.id
JOIN applicationstatus
ON applicationstatus.id = rentalapplication.application_status_id 
WHERE rentalapplication.home_seeker_id = '$id'";
   
                
           

            $result1 = mysqli_query($connection, $rentalQuery2);
                
                
            
                ?>
                 
                
                <tbody>
                    
                    <?php 
                    
                    
                  while ($rows = mysqli_fetch_assoc($result1)) {
?>
                    <tr>
                        <td><a class="property-name" href="property_details.php?id= <?php echo $rows['property_id'];?>" ><?php echo $rows['name'];?></a></td>
                        <td>
                            <?php echo $rows['category'];?>
                        </td>
                        <td><?php echo $rows['rent_cost'];?></td>
                        <td><?php echo $rows['status'];?></td>
                        

                    </tr>

                   
             
                </tbody>
      <?php 
              }
                   
                   ?>



            </table>
        </div>


        <div>
            <div class="select">

                <label>Search by category:</label>

                
             <!--   <form method="POST"> -->

                <select name="categoryN" id="category"  >
                  <?php
                $sql = "SELECT * FROM propertycategory";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo ' <option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
                </select>
               <!--  <button type = "submit">Search</button> -->

              <!--  </form>-->
            </div>
            
       
            <table id="tableId">
                
                     <?php
            
            $resultFin;
             if($_SERVER['REQUEST_METHOD'] == "POST") {
                 
                 $Property_CAT = $_POST['category'];
                 $sqlQueryCat = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id ,  property.id
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id
                      WHERE propertycategory.id = ".$Property_CAT;
                 $resultFin =  mysqli_query($connection, $sqlQueryCat);
                 
             }
             
             else {
                 
                 $sql2 = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id , property.id
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id " ;
                            $resultFin= mysqli_query($connection, $sql2);
                 
             }
             

   
          
            
            ?>
              
                <caption>Home for rent</caption>

                <thead>
                <th>Property Name</th>
                <th>Category</th>
                <th>Rent</th>
                <th>Rooms</th>
                <th>Location</th>

                </thead>

                
                <tbody id="tableBody">
                     <?php
                // LOOP TILL END OF DATA
                     
                while($rows= mysqli_fetch_assoc($resultFin))
                {
            ?>
                    <tr id="trID">
                        <td><a class="property-name" href="property_details.php?id= <?php echo $rows['id'];?>">
                            <?php echo $rows['name'];?></a></td>
                        <td><?php echo $rows['category'];?></td>
                        <td><?php echo $rows['rent_cost'];?></td>
                        <td><?php echo $rows['rooms'];?></td>
                        <td><?php echo $rows['location'];?></td>

              
                        <td>
                       
                        
                        
                        <a href="ApplyRent.inc.php?propertyID=<?php echo $rows['id'];?>&&HomeSeekerID=<?php echo $id ;?> ">Apply</a>


                        </td>

                    </tr>  



                </tbody>


              <?php
                }
                        mysqli_close($connection);

            ?>
            </table>


            
            
            
        </div>

    </main>
    <br /><br />
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



