<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 
  
  <link rel="stylesheet" href="assetsL/css/fontawesome.css">
 <link rel="stylesheet" href="home1.css" />
<header>
   
        <h2 class="logo">Workini</h2>
        <bav class="nav">
            <ul>
           <li><a href='utilisateur2.php'>Home</a></li> 
           <li><a href='#ofr'>Les offres</a></li> 
           
           <?php
                      $email=$_SESSION['email'];

           echo"           <li><a href='jobsubmitted.php?email=$email'>job submitted</a></li> 
           ";
           
           $sth = $conn->prepare("SELECT * FROM Demandeur where  Email='$email'");
           $sth->execute();
           $r = $sth->fetchAll(PDO::FETCH_ASSOC);
        $name=$r[0]['nom']." ".$r[0]['prenom'];
        if($r[0]['age']==-1)
        {
            echo"
            <li><a href='addcv.php'>Add cv</a></li> ";
        }
else{
    echo"
    <li> <a href='postuler.php?cin=$email'>Profile</a></li> ";

}

         

           echo"
         
        
          <li><a>Contact</a></li>  </ul>";
          
           
          
          $ch='togglemenu()';
          echo 
          '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '" class="user" onclick='.$ch. ' />';
       
          print_r( "
          <div class='sub-menu-wrap' id='sub-menu' >
              <div class='sub-menu' >
                  <div class='userinfo'>");
                 
                  echo 
                  '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '"  onclick='.$ch. ' />';
               
                  print_r("
                      <h2>$name</h2>
                  </div>
                  <hr>
                  <a1 class='sub-menu-link'>
                      <img src='profile.png'>
                      <p>Edit profile</p>
                  </a1>
                  <a1 class='sub-menu-link'>
                      <img src='setting.png'>
                      <p>Settings</p>
                      <span></span>
                  </a1>
                  <a1 class='sub-menu-link'>
                      <img src='help.png'>
                      <p>Help & Support</p>
                      <span></span>
  
                  </a1>
                  <a1 class='sub-menu-link'>
                      <img src='logout.png'>
                      
                <a href='homeL.php' name='logout'>Logout</a>
                      <span></span>
  
                  </a1>")
          ?>
        
            </div>
        </div>
        <div class="zrapper">
	<div class="notification_zrap" >
        	<div class="notification_icon">
			<i class="fas fa-bell"></i></div>
            <div class="dropdown" style='width:220px; '>
        <?php
        $sth = $conn->prepare("SELECT * FROM notification where Email='$email'");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        for($i=0;$i<count($resultat);$i++)
        { $ch=$resultat[$i]["objet"];
            $e=$resultat[$i]["acteur"];

            $req2=$conn->prepare("select * from offre where codeoffre='$e'");
            $req2->execute();
            $ro=$req2->fetchAll(PDO::FETCH_ASSOC);
            $desc=$resultat[$i]['description'];
            $req=$conn->prepare("select * from utilisateur where Email='$e'");
            $req->execute();
            $r=$req->fetchAll(PDO::FETCH_ASSOC);
            $req3=$conn->prepare("select * from DEMANDEUR where Email='$email'");
            $req3->execute();
            $r3=$req3->fetchAll(PDO::FETCH_ASSOC);
            $ac=$r3[0]["nom"]." ".$r3[0]["prenom"];
            echo"<a href='deletenot.php?id=".$resultat[$i]['id']." 'class='not'></a>
            <div class='notify_item'>
            <div class='notify_img'>";
            echo'<img src = "data:image/png;base64,' . base64_encode ($r[0]["pic"]) . 'alt="profile_pic" style="width: 50px"/>';
             echo"   
            </div>
            <div class='notify_info'>
           
                <p class='des'style='color:black;'>$e $desc $ac <span>.$ch.</span></p>
                <a style='width:100px;' href='deletenot.php?id=".$resultat[$i]['id']."'>Delete</a>

                <span class='notify_time'>".$resultat[$i]['date']."</span>
            </div>
        </div>
    
        ";

        }
        ?>
	
		
		

		
		</div>
	</div>
</div>

</bav>

    </header>