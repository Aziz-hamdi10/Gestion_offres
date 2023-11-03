

    
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
            <li>  <a href="utilisateur2.php?filtrer=DISPO">Disponible</a></li>


            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid" id='of'>  
            

          <?php
    //function score
    function score($o,$email){
        $r=0;
        include('connexion.php');
        $reqscore1 = $conn->prepare("SELECT * FROM competenseso where codeo=".$o['codeoffre']." ");
        $reqscore1->execute();
        $compet = $reqscore1->fetchAll(PDO::FETCH_ASSOC);
        $req2 = $conn->prepare("SELECT * FROM competensesd where email='$email' ");
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
        $reqscore1 = $conn->prepare("SELECT * FROM demandeur where email='$email' ");
        $reqscore1->execute();
        $age = $reqscore1->fetchAll(PDO::FETCH_ASSOC);
        $reqscore1 = $conn->prepare("SELECT * FROM offre where codeoffre=".$o['codeoffre']." ");
        $reqscore1->execute();
        $off = $reqscore1->fetchAll(PDO::FETCH_ASSOC);
        
        if($age[0]['experience']>=$off[0]['experience']){

            for($i=0;$i<$age[0]['experience'];$i++){
                $r+=2;  
            }}
          
            if ($age[0]['diplome']!=$off[0]['diplome']){
                $r=0;
             
            }
           

        
      
return $r;
    }    
    function cmp($a, $b) {
        if ($a[1] == $b[1]) {
            return 0;
        }
        return ($a[1] > $b[1]) ? -1 : 1;
    }
    
     
            
$sth = $conn->prepare("SELECT * FROM offre ");
$sth->execute();
$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION["email"]))
{ $type=2 ;
  $email=$_SESSION["email"];
  $pass=$_SESSION["password"];
  $mat=array();
  for( $i=0;$i<count($resultat);$i++)
  {
    $mat[] = array($resultat[$i],score($resultat[$i],$email));
  


  }
}

usort($mat, "cmp");

for( $i=0;$i<count($mat);$i++)
{
    $resultat5[]=$mat[$i];
    $codeoffre=$resultat5[$i][0]['codeoffre'];
  $emailE=$resultat5[$i][0]['emailE'];

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
  '<img src = "data:image/png;base64,' . base64_encode ($resultat5[$i][0]["pic"]) . '" style="width:200px;"/>';
  echo"
  </div>
  <div class='right-content'>
    <h4>".$resultat5[$i][0]['titre']."</h4>
    <span class='author'>
    ";
    echo '<img src = "data:image/png;base64,' . base64_encode ($resultat4[0]["pic"]) . '" style="width:70px;min-width: 50px; border-radius: 50%;"/>';

    echo"
      <h6>".$resultat3[0]['nom_entreprise']."<br><a href='#'>@".$emailE."</a></h6>
    </span>
    <div class='line-dec'></div>
    <span class='bid'>
    Score<br><strong>".$mat[$i][1]."</strong><br><em>(Point )</em>
  </span>
    <span class='bid'>
      Salary<br><strong>".$resultat5[$i][0]['salaire']."</strong><br><em>(Dt)</em>
    </span>
    <span class='ends'>
      Etat<br><strong>".$resultat5[$i][0]['etat']."</strong><br><em>(July 18th, 2022)</em>
    </span>
    <div class='text-button'>
      <a href='offredetail.php?&type=$type&email=$email&pass=$pass&codeoffre=$codeoffre'>View Item Details</a>
    </div>
  </div>
</div>
</div> ";

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