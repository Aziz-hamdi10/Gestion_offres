<?php


echo'  <section class="home-packages" id="home-packages">
<h1 class="heading-title">nos offres</h1>
<div class="box-container">';
$sth = $conn->prepare("SELECT * FROM offre ");
$sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultat)<=3){

    
    for( $i=0;$i<count($resultat);$i++)
    {            $codeoffre=$resultat[$i]['codeoffre'];

        $x=$resultat[$i]["titre"];
$ch=$resultat[$i]["description"];
        echo '<div class="box">
        <div class="image">
        <img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . '" width = "50px" height = "50px"/>';
        
       echo" </div>
        <div class='content'>
            <h3>$x</h3>
            <p>$ch</p>
            ";
            if(isset($_SESSION['email']))
            { $email=$_SESSION['email'];
                $pass=$_SESSION['password'];
                echo"
                <a href='ofrredetails.php?type=2&email=$email&pass=$pass&codeoffre=$codeoffre' class='btn'>More Details</a>
              ";
            }
            else{
                echo"
                <a href='ofrredetails.php?type=1&codeoffre=$codeoffre' class='btn'>More Details</a>
           ";

            }
            echo"     </div>
            </div>";
      
    }}
    else
    { for( $i=0;$i<3;$i++)
        { 
            $codeoffre=$resultat[$i]['codeoffre'];

            $x=$resultat[$i]["titre"];
    $ch=$resultat[$i]["description"];
    echo '<div class="box">
        <div class="image">
        <img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . '" width = "50px" height = "50px"/>';
            echo " </div>
            <div class='content'>
                <h3>$x</h3>
                <p>$ch</p>
                ";
                if(isset($_SESSION['email']))
                { $email=$_SESSION['email'];
                    $pass=$_SESSION['password'];
                    echo"
                    <a href='ofrredetails.php?type=2&email=$email&pass=$pass&codeoffre=$codeoffre' class='btn'>More Details</a>
                  ";
                }
                else{
                    echo"
                    <a href='ofrredetails.php?type=1&codeoffre=$codeoffre' class='btn'>More Details</a>
                 ";
    
                                }echo"                </div>
        </div>";

    }
}
?>

</div> 

</section> 
<?php
if(count($resultat)>3)
    {  
         $k=count($resultat)-3;
                for( $j=3;$j<count($resultat);$j+=3)
                 { 
                    $codeoffre=$resultat[$j]['codeoffre'];

                    if($k>3){
                                $x=3;
                            }
                    else
                            {
                                $x=$k;
                           
                            }
                            $p=$x+$j;
                    echo"<section class='packages'><div class='box-container'>";
                            for( $i=$j;$i<$p;$i++){
                                                         
                                                          $x=$resultat[$i]["codeoffre"];
                                                            $ch=$resultat[$i]["description"];
                                                            echo '<div class="box">
        <div class="image">
        <img src = "data:image/png;base64,' . base64_encode ($resultat[$i]["pic"]) . '" width = "50px" height = "50px"/>';
                                                             echo "
                                                                       </div>
                                                                         <div class='content'>
                                                                         <h3>$x</h3>
                                                                        <p>$ch</p>
                                                                        ";
                                                                        if(isset($_SESSION['email']))
                                                                        { $email=$_SESSION['email'];
                                                                            $pass=$_SESSION['password'];
                                                                            echo"
                                                                            <a href='ofrredetails.php?type=2&email=$email&pass=$pass&codeoffre=$codeoffre' class='btn'>More Details</a>
                                                                          ";
                                                                        }
                                                                        else{
                                                                            echo"
                                                                            <a href='ofrredetails.phptype=1&codeoffre=$codeoffre' class='btn'>More Details</a>
                                                                      ";
                                                            
                                                                        }
                                                                        echo"                                                                        </div>
                                                                         </div>";
                                                        }
                             $k-=3;
                             if($i==count($resultat))
                             {
                                echo"
                                </div>
                                ";
                                ?>

                                <div class='load-more'><a id='btn' class='btn' onclick='myfn(" <?php echo count($resultat)  ; ?>")'>load-more</a></div>

                                </section>;
<?php
                             }
                            echo"
                                </div>

                                </section>";
                    }       
    }

     
              
   
      
  


?>
<script>
function myfn(p) {
  let boxes=[...document.querySelectorAll('.packages .box-container .box')];
  var div = document.querySelector('.packages .load-more .btn');
  var j=0;
  if(p-3-y>=3)
  {
    mzl=3;
  }
  else
  {
    mzl=p-3-y;

  }
  while(j<mzl)
  {
    boxes[j+y].style.display='inline-block';
    j++;
  }
  y+=3;
  if(y+3>=p)
  { div.style.display="none";
  }

}
    </script>