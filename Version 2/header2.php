
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 
  
  <link rel="stylesheet" href="assetsL/css/fontawesome.css">
 <link rel="stylesheet" href="home1.css" />
<header>
   
        <h2 class="logo">Workini</h2>
        <bav class="nav">
            <ul>
           <li ><a href='utilisateur1.php'>Home</a></li> 

           <?php
                     $email=$_SESSION['email'];

           echo"
           <li><                           <a  href='empoffre.php?email=".$email."'>Your offres</a>"
           ?>
</li> 
          <li> <a  href='addoffre.php'>add Offre</a></li>   <?php
          echo"

          <li><a href='listerDemendes.php'>Demandes</a></li>  </ul>";
        
          $sth = $conn->prepare("SELECT * FROM Employeur where  Email='$email'");
          $sth->execute();
          $r = $sth->fetchAll(PDO::FETCH_ASSOC);

          $name=$r[0]['nom_entreprise'];
          $ch='togglemenu()';
          echo 
          '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '" class="user" onclick='.$ch. ' />';
       
          print_r( "
          <div class='sub-menu-wrap' id='sub-menu'>
              <div class='sub-menu'>
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
	<div class="notification_zrap">
        	<div class="notification_icon">
			<i class="fas fa-bell"></i></div>
            <div class="dropdown">
        <?php
        $sth = $conn->prepare("SELECT * FROM notification where Email='$email'");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        for($i=0;$i<count($resultat);$i++)
        { $ch=$resultat[$i]["objet"];
            $e=$resultat[$i]["acteur"];
            $desc=$resultat[$i]['description'];

            $req=$conn->prepare("select * from utilisateur where Email='$e'");
            $req->execute();
            $r=$req->fetchAll(PDO::FETCH_ASSOC);
            $ac=$r[0]["Email"];
            echo"<a href='notification.php?acteur=$e' class='not'> </a>
            <div class='notify_item'>
            <div class='notify_img'>";
            echo'<img src = "data:image/png;base64,' . base64_encode ($r[0]["pic"]) . 'alt="profile_pic" style="width: 50px"/>';
             echo"   
            </div>
            <div class='notify_info'>
                <p class='des'style='color:black;'>$ac $desc <span>.$ch.</span></p>
                <a style='width:100px;' href='deletenot2.php?id=".$resultat[$i]['id']."'>Delete</a>

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
    