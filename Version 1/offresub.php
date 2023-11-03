<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='listerDemendesF.css'>
    
    <link href="bst.min.css" rel="stylesheet">
    <link href='assets1/css/profilecssF.css' rel='stylesheet'>
    <link href='assets1/vendor/bootstrap-icons/bootstrap-icons.css' rel='stylesheet'>
  <link href='assets1/vendor/boxicons/css/boxicons.min.css' rel='stylesheet'>

    <script src='main.js'></script>
</head>
<body>
  <?php
  include ("connexion.php");
  session_start();
  $email= $_SESSION['email'];
  $passsowrd= $_SESSION['password'];
  $sth = $conn->prepare("SELECT * FROM utilisateur where   Email='$email'");
  $sth->execute();
      $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    
      if($resultat){
  
          $_SESSION['email']=$email;
          $_SESSION['password']=$passsowrd;
          
          if( $resultat[0]["type"]=="Employeur")
          {
             include("headerE.php");
          }
          else {
  
            include("headerD.php");}
          }  
  ?>
     <!-- ======= Team Section ======= -->
     <section id="team" class="team section-bg" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <?php
        $codeoffre=$_GET['codeoffre'];
        echo'
          <h2>Demandes ' .$codeoffre.'</h2>
          <p></p>
        </div>

        <div class="row">';
        function score($o,$email){
          $r=0;
          include('connexion.php');
          $cd=$o['code_offre'];
          $reqscore1 = $conn->prepare("SELECT * FROM competenseso where  codeo='$cd' ");
          $reqscore1->execute();
          $compet = $reqscore1->fetchAll(PDO::FETCH_ASSOC);
          $req2 = $conn->prepare("SELECT * FROM competensesd where email='".$o['email_demandeur']."' ");
          $req2->execute();
          $compd = $req2->fetchAll(PDO::FETCH_ASSOC);
          for( $i=0;$i<count($compd);$i++){
              $j=0;
              while($j<count($compet)){
      if($compet[$j]['numc']==$compd[$i]['numc'])
      {   
      $r+=5;
      $j++;
      
      }
      else
      $j++;
      
              }
      
          }
      
      
          $reqscore1 = $conn->prepare("SELECT * FROM offre where codeoffre=".$o['code_offre']." ");
          $reqscore1->execute();
          $off = $reqscore1->fetchAll(PDO::FETCH_ASSOC);
        $r+=$off[0]['salaire']/100;
             
      
          
        
      return $r;
      } 
      
    function cmp($a, $b) {
      if ($a[1] == $b[1]) {
          return 0;
      }
      return ($a[1] > $b[1]) ? -1 : 1;
  }
  $mat=array();

  $sth = $conn->prepare("SELECT * FROM demande where email='$email' and code_offre='$codeoffre' ");
$sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
  for( $i=0;$i<count($resultat);$i++)
  {
    $e=$resultat[$i]['email_demandeur'];

    $mat[] = array($resultat[$i],score($resultat[$i],$e));
  


  }
  usort($mat, "cmp");


$sth = $conn->prepare("SELECT * FROM demande where email='$email' and code_offre='$codeoffre' ");
$sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0;$i<count($mat);$i++){
      $resultat5[]=$mat[$i];
      $e=$resultat5[$i][0]['email_demandeur'];
      $req=$conn->prepare("select * from utilisateur where Email='$e'");
      $req->execute();
      $r=$req->fetchAll(PDO::FETCH_ASSOC);
      $req1=$conn->prepare("select * from demandeur where Email='$e'");
      $req1->execute();
      $r1=$req1->fetchAll(PDO::FETCH_ASSOC);
      $ac=$r1[0]["nom"]." ".$r1[0]["prenom"];
      $offre=$resultat5[$i][0]['code_offre'];
      $req2=$conn->prepare("select * from offre where codeoffre='$offre'");
      $req2->execute();
    
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
      echo"
      <div  >
            <div class='member d-flex align-items-start'style='width:700px ;     margin-left: 250px;
            '>
              <div class='paic'>";
              echo'<img src = "data:image/png;base64,' . base64_encode ($r[0]["pic"]) . 'alt="profile_pic" style="width: 60px ;height:60px"/>';

              echo"
             </div>
              <div class='member-info'>
                <h4>$ac</h4>
                <span>Product Manager</span>
                <p >a demande l'accé a l'offre du <span class='pr'>".$r2[0]['description']."</span></p>
                <p >Score :".score($resultat5[$i][0],$e)." </p>

             

                ";
              
                echo"
                <a href='Accepter.php?v=False&emaild=$e&emaile=$email&codeoffre=$offre&titreoffre=".$r2[0]['description']."  'class='btn' style='background-color:red'>Refuser</a>
                <a href='Accepter.php?v=True&emaild=$e&emaile=$email&codeoffre=$offre&titreoffre=".$r2[0]['description']."  'class='btn'style='background-color:green'>Accepter</a>
          <button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#$i'  style='background-color:#777'>
  Profile
</button>
";


echo"

                <div class='social'>
                  <a href=''><i class='ri-twitter-fill'></i></a>
                  <a href=''><i class='ri-facebook-fill'></i></a>
                  <a href=''><i class='ri-instagram-fill'></i></a>
                  <a href=''> <i class='ri-linkedin-box-fill'></i> </a>
                
                </div>
              </div>
            </div>
          </div>  <br>
                  <br>
      ";



    }
    for($i=0;$i<count($mat);$i++)
    {

      $e=$resultat5[$i][0]['email_demandeur'];
      $req1=$conn->prepare("select * from demandeur where Email='$e'");
      $req1->execute();
      $r=$req1->fetchAll(PDO::FETCH_ASSOC);
      $req1=$conn->prepare("select * from utilisateur where Email='$e'");
      $req1->execute();
      $r1=$req1->fetchAll(PDO::FETCH_ASSOC);
      $pic=$r1[0]['pic'];
    echo"<div class='offcanvas offcanvas-start' tabindex='-1' id='$i' aria-labelledby='offcanvasExampleLabel'>
     <div class='offcanvas-header'>
       <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Profile</h5>
       <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
     </div>
     <div class='offcanvas-body'>
       ";
       
    
       echo"
       <header id='header' style='width:400px;'>

   
         <div class='profile'style='margin-right:20px;margin-bottom:80px;'>
          ";
         
         echo'<img src = "data:image/png;base64,' . base64_encode ($pic) . ' alt="profile_pic" class="img-fluid rounded-circle"/>';
   echo" 
   
           <h1 class='text-light'><a href='index.html'>".$r[0]['nom']." ". $r[0]['prenom']."</a></h1>

           <div class='social-links mt-3 text-center'>
        
           <a href='#' class='facebook'><i class='bx bxl-facebook'></i></a>
           <a href='#' class='instagram'><i class='bx bxl-instagram'></i></a>
           <a href='#' class='linkedin'><i class='bx bxl-linkedin'></i></a>
 ";
 $req2=$conn->prepare("select * from competensesd where email='$e'");
      $req2->execute();
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);

      $skills="";
      for($j=0;$j<count($r2);$j++)
      { $numc=$r2[$j]['numc'];
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $skills=$skills.$desc."<br>";
      }
  

 echo"
 


   

         <div>
         <h2 style='color:white;margin-top:20px;font-size:2rem;'>About</h2>

         <div class='row'>

         <div class='col-lg-6'>
      
         <ul>  <li><i class='bi bi-chevron-right'></i> <strong>CIN:</strong> <span>".$r[0]['cin']."</span></li>        </ul>
         </div>
         <div class='col-lg-6'>
      
         <ul>  <li><i class='bi bi-chevron-right'></i> <strong>Phone:</strong> <span>".$r[0]['numero']."</span></li>        </ul>
         </div>
         </div>
         <div class='row'>

         <div class='col-lg-6'>
      
         <ul>  <li><i class='bi bi-chevron-right'></i> <strong>City:</strong> <span>".$r[0]['adresse']."</span></li>        </ul>
         </div>
      
          <div class='col-lg-6'>
<ul>
          <li><i class='bi bi-chevron-right'></i> <strong>Diplome:</strong> <span>".$r[0]['diplome']."</span></li>
          </ul>
          </div>
          </div>
          <div class='row'>

          <div class='col-lg-6'>
          <ul>

          <li><i class='bi bi-chevron-right'></i> <strong>PhEmailone:</strong> <span>$e</span></li></ul>

          </div>
          <div class='col-lg-6'>
          <ul>

          <li><i class='bi bi-chevron-right'></i> <strong>Experience:</strong> <span>".$r[0]['experience']."</span></li>
          </ul>

          </div>
        </ul>
        <div class='row'>

      </div>
      <h2 style='color:white;margin-top:0px;font-size:2rem;'>Skills: </h2>
      <p > <span class='typed' data-typed-items>".$skills."</span></p>

";
$req2=$conn->prepare("select * from competensesd where email='$e'");
      $req2->execute();
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
      for($j=0;$j<count($r2);$j++)
      { $numc=$r2[$j]['numc'];
        
        $req3=$conn->prepare("select * from competenses where numc='$numc'");
        $req3->execute();
      $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
      $desc=$r3[0]['description'];
      $score=$r2[$j]['score'];
  echo"
  <div class='progress' style='width:250px; height:20px ;     background-color:#040b14;   
  ' >
  <strong class='skill' style='font-size:1rem;     margin-right: 16px ;color:white
  '>$desc</strong>
  <div class='progress-bar' role='progressbar' style='width: $score%;' aria-valuenow='$score' aria-valuemin='0' aria-valuemax='100'>$score%</div>
 
</div>
<br>
<br>
";
      }

echo"
           </header>

       
             </div>
     </div>
   </div>
   ";
    }
       

  
    
  
?>

        
</div>

</div>


</body>
<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
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

</html>