<?php
include("connexion.php");
session_start();
$email=$_SESSION['email'];
$cd=$_GET['codeoffre'];
$req1=$conn->prepare("delete from offre where codeoffre='$cd' and emailE='$email'");
$req1->execute();
$req1=$conn->prepare("delete from demande where code_offre='$cd'");
$req1->execute();

header("Location:utilisateur1.php");


?>