<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='listerDemendes.css'>
    
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
             include("header2.php");
          }
          else {
  
            include("header1.php");}
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
            <div class='member d-flex align-items-start'style='width: 500px ;     margin-left: 10px;
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
          <button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#$i' aria-controls='offcanvasExample' style='background-color:#777'>
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