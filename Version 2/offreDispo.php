

    
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    



    <!-- Additional CSS Files -->
    
<link rel="stylesheet" href="cssoffreF.css">
   
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>




<div class="currently-market" class="header-text">
    <div class="container" >
      <div class="row" id='nav'>
        <div class="col-lg-6" >
          <div class="section-heading" id='ofr' >
            <div class="line-dec"></div>
            <h2><em>Offres</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters" >
            <ul>
            <li>  <a href="utilisateur2.php#ofr">all offre</a></li>
            <li>  <a href="utilisateur2.php?filtrer=PRICES">Prices</a></li>
            <?php
if(isset($_SESSION['email']))
{
echo'            <li>  <a href="utilisateur2.php?filtrer=CV">Score</a></li>
';
}
?>            

            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid" id='of'>  
          <?php

$sth = $conn->prepare("SELECT * FROM offre where etat='Disponible' ");
$sth->execute();
$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION["email"]))
{ $type=2 ;
  $email=$_SESSION["email"];
  $pass=$_SESSION["password"];
  for( $i=0;$i<count($resultat);$i++)
  {
    $codeoffre=$resultat[$i]['codeoffre'];
  
    $codeoffre=$resultat[$i]['codeoffre'];
    $emailE=$resultat[$i]['emailE'];
    $req3 = $conn->prepare("SELECT * FROM employeur where email='$emailE' ");
    $req3->execute();
    $resultat3 = $req3->fetchAll(PDO::FETCH_ASSOC);
    $req4 = $conn->prepare("SELECT * FROM utilisateur where email='$emailE' ");
    $req4->execute();
    $resultat4 = $req4->fetchAll(PDO::FETCH_ASSOC);
    
  echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
  <div class='item' sty>
    <div class='left-image'>
    ";
    echo 
    '<img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . '" style="width:200px;"/>';
    echo"
    </div>
    <div class='right-content'>
      <h4>".$resultat[$i]['titre']."</h4>
      <span class='author'>
      ";
      echo '<img src = "data:image/png;base64,' . base64_encode ($resultat4[0]["pic"]) . '" style="width:70px;min-width: 50px; border-radius: 50%;"/>';

      echo"
        <h6>".$resultat3[0]['nom_entreprise']."<br><a href='#'>@".$emailE."</a></h6>
      </span>
      <div class='line-dec'></div>
      <span class='bid'>
        Salary<br><strong>".$resultat[$i]['salaire']."</strong><br><em>(Dt)</em>
      </span>
      <span class='ends'>
        Etat<br><strong>".$resultat[$i]['etat']."</strong><br><em>(July 18th, 2022)</em>
      </span>
      <div class='text-button'>
        <a href='offredetail.php?&type=$type&email=$email&pass=$pass&codeoffre=$codeoffre'>View Item Details</a>
      </div>
    </div>
  </div>
  </div> ";

  }
}
else
{
  for( $i=0;$i<count($resultat);$i++)
  { $type=1;
    $codeoffre=$resultat[$i]['codeoffre'];
  
    $codeoffre=$resultat[$i]['codeoffre'];
    $emailE=$resultat[$i]['emailE'];
    $req3 = $conn->prepare("SELECT * FROM employeur where email='$emailE' ");
    $req3->execute();
    $resultat3 = $req3->fetchAll(PDO::FETCH_ASSOC);
    $req4 = $conn->prepare("SELECT * FROM utilisateur where email='$emailE' ");
    $req4->execute();
    $resultat4 = $req4->fetchAll(PDO::FETCH_ASSOC);
  echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
  <div class='item' sty>
    <div class='left-image'>
    ";
    echo 
    '<img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . '" style="width:200px;"/>';
    echo"
    </div>
    <div class='right-content'>
      <h4>".$resultat[$i]['titre']."</h4>
      <span class='author'>
      ";
     echo '<img src = "data:image/png;base64,' . base64_encode ($resultat4[0]["pic"]) . '" style="width:70px;min-width: 50px; border-radius: 50%;"/>';
      echo"
              <h6>".$resultat3[0]['nom_entreprise']."<br><a href='#'>@".$emailE."</a></h6>
      </span>
      <div class='line-dec'></div>
      <span class='bid'>
        Salary<br><strong>".$resultat[$i]['salaire']."</strong><br><em>(Dt)</em>
      </span>
      <span class='ends'>
        Etat<br><strong>".$resultat[$i]['etat']."</strong><br><em>(July 18th, 2022)</em>
      </span>
      <div class='text-button'>
        <a href='offredetail.php?&type=$type&codeoffre=$codeoffre'>View Item Details</a>
      </div>
    </div>
  </div>
  </div> ";

  }


}
?>

 
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="vendorL/jquery/jquery.min.js"></script>
  <script src="vendorL/bootstrap/js/bootstrap.min.js"></script>
  <script src="assetsL/js/isotope.min.js"></script>
  <script src="assetsL/js/owl-carousel.js"></script>
  <script src="assetsL/js/counter.js"></script>
  <script src="assetsL/js/custom.js"></script>