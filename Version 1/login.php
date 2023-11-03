<?php
 $email=$_GET['email'];
 $passsowrd=$_GET['pass'];
 session_start();
 include("connexion.php");

 $sth = $conn->prepare("SELECT * FROM utilisateur where password='$passsowrd' and Email='$email'");
     $sth->execute();
         $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
       
         if($resultat){
     
             $_SESSION['email']=$email;
             $_SESSION['password']=$passsowrd;
             
             if( $resultat[0]["type"]=="Employeur")
             {
                 header("Location:utilisateurE.php");
             }
             else {

                 header("Location:utilisateurD.php");}

     
                }
         else 
         {
             $error="Adresse Mail ou Mots passe incorrecter";
             header("Location:index1.php?&error=$error");

         }

?>