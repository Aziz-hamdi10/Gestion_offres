

    
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    



    <!-- Additional CSS Files -->
    
<link rel="stylesheet" href="assets3/css/cssoffre1.css">
   
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>




<div class="currently-market" class="header-text">
    <div class="container" >
      <div class="row" id='nav'>
        <div class="col-lg-6" >
          <div class="section-heading" >
            <div class="line-dec"></div>
            <h2><em>Offres</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters" >
            <ul>
            <li>  <a href="homeL.php">all offre</a></li>
            <li>  <a href="homeL.php">Prices</a></li>
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
          if(isset($_GET['conn']))
          {
            $sth = $conn->prepare("SELECT * FROM offre ");
            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($_SESSION["email"]))
            { $type=2 ;
              $email=$_SESSION["email"];
              $pass=$_SESSION["password"];
              for( $i=0;$i<count($resultat);$i++)
              {
                $codeoffre=$resultat[$i]['codeoffre'];
              
              echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
              <div class='item' sty>
                <div class='left-image'>
                  <img src='assets3/images/market-01.jpg' alt='' style='border-radius: 20px; min-width: 195px;'>
                </div>
                <div class='right-content'>
                  <h4>TITLE OFFRE</h4>
                  <span class='author'>
                    <img src='assets3/images/author.jpg' alt='' style='min-width: 50px; border-radius: 50%;'>
                    <h6>NOM SOCIETE<br><a href='#'>@Emailsociete</a></h6>
                  </span>
                  <div class='line-dec'></div>
                  <span class='bid'>
                    BUDGET<br><strong>2.44 ETH</strong><br><em>($8,200.50)</em>
                  </span>
                  <span class='ends'>
                    Etat<br><strong>Disponible\Non</strong><br><em>(July 18th, 2022)</em>
                  </span>
                  <div class='text-button'>
                    <a href='offredetail.php?&type=$type&email=$email&pass=$pass&codeoffre=$codeoffre'>View Item Details</a>
                  </div>
                </div>
              </div>
              </div> ";
              $x=$resultat[$i]["codeoffre"];
              $ch=$resultat[$i]["description"];
              }
            }
            else
            {
              for( $i=0;$i<count($resultat);$i++)
              { $type=1;
                $codeoffre=$resultat[$i]['codeoffre'];
              
              echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
              <div class='item' sty>
                <div class='left-image'>
                  <img src='assets3/images/market-01.jpg' alt='' style='border-radius: 20px; min-width: 195px;'>
                </div>
                <div class='right-content'>
                  <h4>TITLE OFFRE</h4>
                  <span class='author'>
                    <img src='assets3/images/author.jpg' alt='' style='min-width: 50px; border-radius: 50%;'>
                    <h6>NOM SOCIETE<br><a href='#'>@Emailsociete</a></h6>
                  </span>
                  <div class='line-dec'></div>
                  <span class='bid'>
                    BUDGET<br><strong>2.44 ETH</strong><br><em>($8,200.50)</em>
                  </span>
                  <span class='ends'>
                    Etat<br><strong>Disponible\Non</strong><br><em>(July 18th, 2022)</em>
                  </span>
                  <div class='text-button'>
                    <a href='offredetail.php?type=$type&codeoffre=$codeoffre'>View Item Details</a>
                  </div>
                </div>
              </div>
              </div> ";
              $x=$resultat[$i]["codeoffre"];
              $ch=$resultat[$i]["description"];
              }
            
            
            }

          }
          else{

          
$sth = $conn->prepare("SELECT * FROM offre ");
$sth->execute();
$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION["email"]))
{ $type=2 ;
  $email=$_SESSION["email"];
  $pass=$_SESSION["password"];
  for( $i=0;$i<count($resultat);$i++)
  {
    $codeoffre=$resultat[$i]['codeoffre'];
  
  echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
  <div class='item' sty>
    <div class='left-image'>
      <img src='assets3/images/market-01.jpg' alt='' style='border-radius: 20px; min-width: 195px;'>
    </div>
    <div class='right-content'>
      <h4>TITLE OFFRE</h4>
      <span class='author'>
        <img src='assets3/images/author.jpg' alt='' style='min-width: 50px; border-radius: 50%;'>
        <h6>NOM SOCIETE<br><a href='#'>@Emailsociete</a></h6>
      </span>
      <div class='line-dec'></div>
      <span class='bid'>
        BUDGET<br><strong>2.44 ETH</strong><br><em>($8,200.50)</em>
      </span>
      <span class='ends'>
        Etat<br><strong>Disponible\Non</strong><br><em>(July 18th, 2022)</em>
      </span>
      <div class='text-button'>
        <a href='offredetail.php?&type=$type&email=$email&pass=$pass&codeoffre=$codeoffre'>View Item Details</a>
      </div>
    </div>
  </div>
  </div> ";
  $x=$resultat[$i]["codeoffre"];
  $ch=$resultat[$i]["description"];
  }
}
else
{
  for( $i=0;$i<count($resultat);$i++)
  { $type=1;
    $codeoffre=$resultat[$i]['codeoffre'];
  
  echo"<div class='col-lg-6 currently-market-item all msc blc' id='titre' >
  <div class='item' sty>
    <div class='left-image'>
      <img src='assets3/images/market-01.jpg' alt='' style='border-radius: 20px; min-width: 195px;'>
    </div>
    <div class='right-content'>
      <h4>TITLE OFFRE</h4>
      <span class='author'>
        <img src='assets3/images/author.jpg' alt='' style='min-width: 50px; border-radius: 50%;'>
        <h6>NOM SOCIETE<br><a href='#'>@Emailsociete</a></h6>
      </span>
      <div class='line-dec'></div>
      <span class='bid'>
        BUDGET<br><strong>2.44 ETH</strong><br><em>($8,200.50)</em>
      </span>
      <span class='ends'>
        Etat<br><strong>Disponible\Non</strong><br><em>(July 18th, 2022)</em>
      </span>
      <div class='text-button'>
        <a href='offredetail.php?type=$type&codeoffre=$codeoffre'>View Item Details</a>
      </div>
    </div>
  </div>
  </div> ";
  $x=$resultat[$i]["codeoffre"];
  $ch=$resultat[$i]["description"];
  }


}}

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