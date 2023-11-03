<?php
include('connexion.php');
session_start();
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
$nome=$_SESSION['nomentreprise'];
$nomg=$_SESSION['nomgerant'];
$prenomgerant=$_SESSION['prenomgerant'];
$stmt=$conn->prepare("insert into employeur values( :nom_entreprise, :nom_gerant,:prenom_gerant,:Email)");
$stmt->bindParam(':nom_entreprise', $nome);
$stmt->bindParam(':nom_gerant', $nomg);
$stmt->bindParam(':prenom_gerant', $prenomgerant);
$stmt->bindParam(':Email', $e);
$stmt->execute();


?>