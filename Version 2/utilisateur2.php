
<?php
session_start();
$email= $_SESSION['email'];
$passsowrd= $_SESSION['password'];
include ("connexion.php");

   $sth = $conn->prepare("SELECT * FROM utilisateur where password='$passsowrd' and Email='$email'");
   $sth->execute();
       $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
   
       if(isset($_POST['logout'])){
        header("Location:home.php");

       }

      

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="home1.css" />
  <link rel="stylesheet" href="assetsL/css/fontawesome.css">
  <link rel="stylesheet" href="assetsL/css/listes1.css">
    <link rel="stylesheet" href="assetsL/css/owl.css">

  <!-- Demo styles -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
<?php
include("header1.php");
?>
    <div class="banner">
            <div class="bntext"><h8>Find Now ur Dream Job ! | Find Now ur Dream Job ! | Find Now ur Dream Job !</h8></div>
        </div>
 

  
</div>
	
                
<section  class="home">
    
    <div class="swiper home-slider">
      <div class="swiper-wrapper">
      <div class="swiper-slide slide" style="background: url(work2.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> Found your dream job Now</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
          <div class="swiper-slide slide" style="background: url(work2.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> Found your dream job Now</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
          <div class="swiper-slide slide" style="background: url(work3.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> Found your dream job Now</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
          <div class="swiper-slide slide" style="background: url(work4.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> Found your dream job Now</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
          <div class="swiper-slide slide" style="background: url(work5.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> Found your dream job Now</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
          <div class="swiper-slide slide" style="background: url(work6.jpg) no-repeat;">
              <div class="content">
                  <span>
                      Found , Work , travel 
                  </span>
                  <h3> Found your dream job Now</h3>
                  <div class="input-group">
    <input type="email" class="input" id="Email" name="Email" placeholder="uiverse@verse.io" autocomplete="off">
    <input class="button--submit" value="Search" type="submit">
</div>
 


                 </div>
          </div>      
          <div class="swiper-slide slide" style="background: url(work1.jpg) no-repeat;">
              <div class="content">
                  <span>
                     2
                  </span>
                  <h3> travel around world</h3>
                  <a href="package.php "class="btn">discover more</a>
              </div>
          </div>
      
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>







  <!-- Swiper JS -->
  <?php
include("listes.php");
?>


  <?php
  if(isset($_GET["filtrer"]))
  {
    $f=$_GET["filtrer"];
    if($f=="DISPO")
    {
        include("offreDISPO.php");

    }
    else
    {
        if($f=="CV")
{
    include("offreCV.php");

}
else{
    include("offrePrices.php");


}

        
    }

  }
  else{
include("offre.php");
  }

?>


 


<!-- Initialize Swiper -->

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

</body>
<footer>
        
    <div class="row">
        <div class="col">
        <div class="logo">SiteName</div>


        </div>
        <div class="col">
            <h3>office <div class="underline"><span></span></div></h3>
            <ul>
                <li>
            <a href="https://www.fifa.com/fr">Work.tn</a></li>
            <br><br>
            <li>
            <a href="https://www.fifa.com/fifaplus/fr/tournaments/mens/worldcup/qatar2022"></a></li>
    </ul>
        </div>
        <div class="col">
            <h3>links <div class="underline"><span></span></div></h3>
            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="#afrique">Les offres</a></li>
                <li><a href="#asia">Services</a></li>
                <li><a href="#europe">About us</a></li>
                

                
            </ul>
        </div>
        <div class="col">
            <h3>NewsLetter <div class="underline"><span></span></div></h3>
            <porm>
                <i class="far fa-envelope"></i>
                <input type="email" placeholder="Enter your email id" required>
                <button type="submit"><i class="fas fa-arrow-right"></i></button>
        </porm>
        <div class="social-icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube"></i>
        </div>
    </div>
</div>
 <hr>
 <div class="row d-flex justify-content-center align-items-center">
    <div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined">
        <a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/data-protection-portal/data-protection-policy" style="--textColor:#FFF; --secondaryColor:#DAC96D; " >Politique de confidentialité</a>
    </div><div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/terms-of-service" style="--textColor:#FFFFFF; --secondaryColor:#DAC96D;">Conditions d'utilisation</a></div>
        <div class="col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><a class="footer_LegalItems__ZWnDD" href="https://www.fifa.com/fifaplus/en/articles/advertise-with-us" style="--textColor:#FFFFFF; --secondaryColor:#DAC96D;">PUBLICITÉ</a>
        </div><div class="d-flex justify-content-start align-items-center col-xs col-md-auto ff-mt-16 text-sm ff-mb-0 text-uppercase undefined"><div id="ot-sdk-btn" class="col-xs  text-sm ff-mb-0 text-uppercase ot-sdk-show-settings footer_CookieButtonLabel__3Njj_">Preference Center</div></div></div>
 <hr>
 <p class="copyright">Copyright .</p>
</footer>

</html>
