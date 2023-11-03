
<link href="css/bootstrap.min.css" rel="stylesheet">


<link href="css/indexF.css" rel="stylesheet">
<link href="css/indexF.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg"  style="      background-color: #3D405B;" >                
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="Tiya Golf Club">
                        <span class="navbar-brand-text">
                            Khademny
                            <small>Tunisia</small>
                        </span>
                    </a>

                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> Login</a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav" >
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="utilisateurD.php">Home</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll"  href="utilisateurD.php">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#home-packages">offres</a>

                            </li>
                          
                            <?php
                            $email=$_SESSION['email'];
    $sth = $conn->prepare("SELECT * FROM Demandeur where  Email='$email'");
    $sth->execute();
    $r = $sth->fetchAll(PDO::FETCH_ASSOC);
 $name=$r[0]['nom']." ".$r[0]['prenom'];
 if($r[0]['age']==-1)
 {
     echo"
     <li class='nav-item'>
     <a class='nav-link click-scroll' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'>Add cv</a>
     </li> 
     
     ";
 }
else{
echo"
<li class='nav-item'>
<a class='nav-link click-scroll' data-bs-toggle='offcanvas' href='#offcanvasExample' role='button' aria-controls='offcanvasExample'>
  Profile
</a>
</li> 
";
echo"  <li class='nav-item'>
<a class='nav-link click-scroll' href='jobsubmitted.php?email=$email'>job submitted</a>
</li>"
;

}
                            ?>
                         

                       

                         
                        </ul>

                        <div class="d-none d-lg-block ms-lg-3">
                        <?php
                     
                    
                    $ch='togglemenu()';
                    echo 
                    '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '" class="user" onclick='.$ch. ' />';
                 
                    print_r( "
                    <div class='sub-menu-wrap' id='sub-menu'>
                        <div class='sub-menu'>
                            <div class='userinfo'>
                            ");

                            echo 
                            '<img src = "data:image/png;base64,' . base64_encode ($resultat[0]["pic"]) . '"  onclick='.$ch. ' />';
                         
                               print_r(" <h2>$name</h2>
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
                                
                          <a href='index1.php' name='logout'>Logout</a>
                                <span></span>
            
                            </a1>");
                        ?>


                        
                    </div>
                </div>
            </nav>