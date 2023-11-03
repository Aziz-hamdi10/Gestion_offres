
<link rel="stylesheet" href="offredetails.css">

<link rel='stylesheet' type='text/css' media='screen' href='listerDemendesF.css'>
 <link rel='stylesheet' type='text/css' media='screen' href='listerDemendesF.css'>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

<!-- Additional CSS Files -->

<?php
include("connexion.php");
session_start();
if($_GET["type"]==2)
{ 
 $email= $_GET["email"];
 $pass= $_GET["pass"];
 $codeoffre= $_GET["codeoffre"];
 $sth = $conn->prepare("SELECT * FROM utilisateur where password='$pass' and Email='$email'");
 $sth->execute();
     $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
     if($resultat){
 
         $_SESSION['email']=$email;
         $_SESSION['password']=$pass;
         
         if( $resultat[0]["type"]=="Employeur")
         {
            include("headerE.php");
         }
         else {
 
           include("headerD.php");}
}

$sth = $conn->prepare("SELECT * FROM offre where codeoffre=$codeoffre ");
$sth->execute();
$r = $sth->fetchAll(PDO::FETCH_ASSOC);
$emaile=$r[0]['emailE'];

$sth1 = $conn->prepare("SELECT * FROM employeur where Email='$emaile' ");
$sth1->execute();
$r1 = $sth1->fetchAll(PDO::FETCH_ASSOC);

}
else{
echo"<header>
<h2 class='logo'>SiteName</h2>

<nav class='nav'>
   <a  class='login' style=' padding-left:42px; padding-top:10px;'href='index1.php?error=Login svp !'>Login</a>
   
   
  
</nav>
</header>";
}
include("connexion.php");
$codeoffre= $_GET["codeoffre"];
$emailD=$_SESSION['email'];
$sth = $conn->prepare("SELECT * FROM offre where codeoffre=$codeoffre ");
$sth->execute();
$r = $sth->fetchAll(PDO::FETCH_ASSOC);
$emaile=$r[0]['emailE'];
$_SESSION['emailE']=$emaile;
$sth1 = $conn->prepare("SELECT * FROM employeur where Email='$emaile' ");
$sth1->execute();
$r1 = $sth1->fetchAll(PDO::FETCH_ASSOC);


$sth3 = $conn->prepare("SELECT * FROM competenseso where codeo=$codeoffre ");
$sth3->execute();
$r3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
$nb=count($r3);
if($_GET["type"]==1)
{
  echo"
<section class='more-info'>
   <div class='container'>
     <div class='row'>
       <div class='col-lg-5'>
         <div class='section-heading'>
           <h6>More Info</h6>
           <h4> <em>".$r[0]["titre"]."</em></h4>
        
         <p>".$r[0]["description"]."</p>
          </div>
         <ul><h6>Posted by :".$r1[0]['nom_entreprise']." <h6><br>
           <li>- Nom Gerant : ".$r1[0]['nom_gerant'].".</li>
           <li>- Prenom Gerant : ".$r1[0]['prenom_gerant'].".</li>
           <li>- Email : ".$r1[0]['Email'].".</li>
           </ul>
          
           <a href='index1.php'class='btn'style='background-color:#777'>Back</a>
           <a href='index1.php?error=Login svp !'class='btn'style='background-color:green'>consulter</a>
";
$sth3 = $conn->prepare("SELECT * FROM competenseso where codeo=$codeoffre ");
$sth3->execute();
$r3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
$nb=count($r3);
echo"
        
       </div>
       
       <div class='col-lg-6 offset-lg-1 align-self-center'>
         <div class='row'>
           <div class='col-6'>
             <div class='count-area-content'>
               <div class='count-digit'>".$r[0]["salaire"]."</div>
               <div class='count-title'>Salaire</div>
             </div>
           </div>
           <div class='col-6'>
             <div class='count-area-content'>
               <div class='count-digit'>".$r[0]["experience"]."</div>
               <div class='count-title'>Years Experience</div>
             </div>
             
           </div>";

           echo"
           
           <div class='col-6'>
             <div class='count-area-content'>
               <div class='count-digit'>".$nb."</div>
               <div class='count-title'>Skills</div>
             </div>
           </div>
           <div class='col-6'>
             <div class='count-area-content'>
             <div class='count-digit'>".$r[0]["diplome"]."</div>
             <div class='count-title'>Diplome</div>
             </div>
           </div>
         </div>
       </div>
       
     </div>
     
   </div>
   
 </section>
 ";
 

}
else{
  $tit=$r[0]["titre"];

  echo"
  <section class='more-info'>
     <div class='container'>
       <div class='row'>
         <div class='col-lg-5'>
           <div class='section-heading'>
             <h6>More Info</h6>
             <h4> <em>".$r[0]["titre"]."</em></h4>
          
           <p>".$r[0]["description"]."</p>
            </div>
           <ul><h6>Posted by :".$r1[0]['nom_entreprise']." <h6><br>
             <li>- Nom Gerant : ".$r1[0]['nom_gerant'].".</li>
             <li>- Prenom Gerant : ".$r1[0]['prenom_gerant'].".</li>
             <li>- Email : ".$r1[0]['Email'].".</li>
             </ul>
            
             <a href='consulter.php?v=False&email=$email'class='btn'style='background-color:#777'>Back</a>
             <a href='consulter.php?v=true&email=$email&codeoffre=$codeoffre&emaile=$emaile&titreoffre=$tit'class='btn'style='background-color:green'>consulter</a>
  ";
  $sth3 = $conn->prepare("SELECT * FROM competenseso where codeo=$codeoffre ");
  $sth3->execute();
  $r3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
  $nb=count($r3);
  echo"
          
         </div>
         
         <div class='col-lg-6 offset-lg-1 align-self-center'>
           <div class='row'>
             <div class='col-6'>
               <div class='count-area-content'>
                 <div class='count-digit'>".$r[0]["salaire"]."</div>
                 <div class='count-title'>Salaire</div>
               </div>
             </div>
             <div class='col-6'>
               <div class='count-area-content'>
                 <div class='count-digit'>".$r[0]["experience"]."</div>
                 <div class='count-title'>Years Experience</div>
               </div>
               
             </div>";
  
             echo"
             
             <div class='col-6'>
               <div class='count-area-content'>
                 <div class='count-digit'>".$nb."</div>
                 <div class='count-title'>Skills</div>
               </div>
             </div>
             <div class='col-6'>
               <div class='count-area-content'>
               <div class='count-digit'>".$r[0]["diplome"]."</div>
               <div class='count-title'>Diplome</div>
               </div>
             </div>
           </div>
         </div>
         
       </div>
       
     </div>
     
   </section>
   ";

}
 

?>


 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script >
var y=0;
function myfn() {
 let boxes=[...document.querySelectorAll('.packages .box-container .box')];
 for( var i =y;i<y+3;i++)
 {
   boxes[i].style.display='inline-block';
 }
 y+=3;
}

const x=document.getElementsByClassName('wrap');
function close1(){
   x[0].className='wrap';
}
function active(){
   x[0].className='wrap active';
}
function diactive1(){x[0].className='wrap active-btn';

}
function btnlogin(){
   x[0].className='wrap active-btn';
}
function regis2(){
   x[0].className='wrap t1';
}
var swiper = new Swiper(".home-slider", {
   loop:true,
 navigation: {
   nextEl: ".swiper-button-next",
   prevEl: ".swiper-button-prev",
 },
});
   

    
    let xa=1;
       let submenu=document.getElementById("sub-menu");
       function togglemenu(){
           if( xa%2==0)
           {
               submenu.className=("sub-menu-wrap-open-menu");
               xa++;
           }
           else
           {
               submenu.className=("sub-menu-wrap");
               xa++;

           }
         
       }
       $(document).ready(function(){
           $(".notification_icon .fa-bell").click(function(){
               $(".dropdown").toggleClass("active");
           })
       });
   </script>
 
</script>
