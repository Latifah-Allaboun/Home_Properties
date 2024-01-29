/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

function home() {
window.location.replace("index.php");    
    
}

/*

function breadcrumb() {
   // return new URL(window.location.href).pathname.split('/')
                   //                              .map(token=>token?token:'Home')
                        //   
                        //                                               .join(' > ')
                        
     pageName = window.location.href.split('/');  
     
      homeOwnerPage = false;
     homeSeekerPage = false;
     
     for(let i =0; i<pageName.length ; i++){
         if(pageName[i] == "HomeOwner.php")
             homeOwnerPage = true;
         else if(pageName[i] == "HomeSeeker.php")
                  homeSeekerPage = true;

     }
     
     if(homeSeekerPage)
       document.getElementById("pageID").innerHTML ="HomeSeeker.php";
   else
window.location.replace("HomeSeeker.php");    

    alert((homeOwnerPage));
    
}
 * 
 */