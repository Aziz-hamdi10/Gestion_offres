<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='listerDemendes.css'>

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
             include("header2.php");
          }
          else {
  
            include("header1.php");}
          }  
  ?>
     <!-- ======= Team Section ======= -->
     <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Your job submitted</h2>
          <p></p>
        </div>

        <div class="row">
     <?php

$sth = $conn->prepare("SELECT * FROM demande where email_demandeur='$email' ");
$sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0;$i<count($resultat);$i++){

      $e=$resultat[$i]['email_demandeur'];
      $req=$conn->prepare("select * from utilisateur where Email='$e'");
      $req->execute();
      $r=$req->fetchAll(PDO::FETCH_ASSOC);
      $req1=$conn->prepare("select * from demandeur where Email='$e'");
      $req1->execute();
      $r1=$req1->fetchAll(PDO::FETCH_ASSOC);
    

      $ac=$r1[0]["nom"]." ".$r1[0]["prenom"];
      $offre=$resultat[$i]['code_offre'];
   
      $req2=$conn->prepare("select * from offre where codeoffre='$offre'");
      $req2->execute();
    
      $r2=$req2->fetchAll(PDO::FETCH_ASSOC);
    
      echo"
      <div  >
            <div class='member d  -flex align-items-start'>
              <div class='paic'>";
              echo'<img src = "data:image/png;base64,' . base64_encode ($r2[0]["pic"]) . 'alt="profile_pic" style="width: 60px ;height:60px"/>';

              echo"
             </div>
              <div class='member-info'>
              <h4>".$r2[0]['titre']."</h4>
                <p >a demande l'accé a l'offre du <span class='pr'></span></p>
                ";
                if($resultat[$i]['etat']==0 )
                {
echo"                <a href='postuler.php?cin=$e  'class='btn'style='background-color:#777'>Loading</a>
";
                }
                else{
                    if($resultat[$i]['etat']==1)
                    {
                        echo"                        <a href='postuler.php?cin=$e  'class='btn'style='background-color:green'>Aceepted</a>
                        ";
                    }
                    else{
                        echo"
                    
                        <a href='postuler.php?cin=$e  'class='btn'style='background-color:red'>Refused</a>
    ";
         

                    }

                }
                echo"
                <a class='btn'style='width:100px;' href='deletejobsub.php?email=$email&codeoffre=$offre''>Delete</a>


                <div class='social'>
                  <a href=''><i class='ri-twitter-fill'></i></a>
                  <a href=''><i class='ri-facebook-fill'></i></a>
                  <a href=''><i class='ri-instagram-fill'></i></a>
                  <a href=''> <i class='ri-linkedin-box-fill'></i> </a>
                </div>
              </div>
            </div>
          </div>
      ";



    }

?>

        
</div>

</div>


</body>
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