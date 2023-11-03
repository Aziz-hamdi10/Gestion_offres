<?php
session_start();
Include("connexion.php");
        	$pic=file_get_contents( $_FILES['picture']['tmp_name']);
			$email=$_POST['emailE'];
			$password=$_POST['motE'];
			$type="Employeur";
            $stmt=$conn->prepare("insert into utilisateur(Email,password,pic,type)values(:email, :password,:pic,:type)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':pic', $pic);
            $stmt->execute();	
            $names=$_POST['nomentreprise'];
            $Fname=$_POST['nomgerant'];
            $Sname=$_POST['prenomgerant'];
            $stmt=$conn->prepare("insert into employeur values(:nom_entreprise, :nom_gerant,:prenom_gerant,:Email)");
$stmt->bindParam(':nom_entreprise', $names);
$stmt->bindParam(':nom_gerant', $Fname);
$stmt->bindParam(':prenom_gerant', $Sname);
$stmt->bindParam(':Email', $email);
$stmt->execute();


header("Location:homeL.php");



?>