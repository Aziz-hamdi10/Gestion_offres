<?php
 
   
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $wrap="wrap";
   //On essaie de se connecter
   try{
   // pour tester l'erreur on se connecte à une base inexistancte "achats"
   $conn = new PDO("mysql:host=$servername;dbname=bdprjweb", $username, $password);
   //On définit le mode d'erreur de PDO sur Exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   
   /*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci*/
   catch(PDOException $e){
   echo "Erreur : " . $e->getMessage();
   }
 ?> 