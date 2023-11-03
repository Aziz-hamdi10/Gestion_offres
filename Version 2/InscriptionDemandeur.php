<?php
include('connexion.php');
$e=$_SESSION['email'];
$pic= $_SESSION['image'];
$type= $_SESSION['type'];
$p= $_SESSION['pass'];

$stmt=$conn->prepare("insert into utilisateur(Email,password,pic,type)values( :email, :password,:pic,:type)");
$stmt->bindParam(':email', $e);
$stmt->bindParam(':password', $p);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':pic', $pic);
$stmt->execute();
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$cin=$_SESSION['cin'];
$date_nai="12-7-2022";
$etatcivil=0;
$adresse="wardia";
$numero="96342252";
$age="21";
$stmt=$conn->prepare("insert into demandeur values(:cin, :nom, :prenom,:date_nai,:etatcivil,:adresse,:numero,:Email,:age)");
$stmt->bindParam(':cin', $cin);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':Email', $e);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':etatcivil', $etatcivil);
$stmt->bindParam(':date_nai', $date_nai);

$stmt->execute();
?>