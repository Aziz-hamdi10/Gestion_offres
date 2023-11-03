<?php
 $email=$_GET['email'];
 $passsowrd=$_GET['password'];
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
                $_SESSION["type"]='e';
                 header("Location:utilisateur1.php");
             }
             else {
                $_SESSION["type"]='d';
                 header("Location:utilisateur2.php");}

     }
         else 
         {
             $error="Adresse Mail ou Mots passe incorrecter";
             header("Location:homeL.php?wrap=wrap active-btn&error=$error");

         }

?>