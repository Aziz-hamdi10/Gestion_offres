<?php
include("connexion.php");
session_start();
$id=$_GET['id'];
$req1=$conn->prepare("delete from notification where id='$id' ");
$req1->execute();


header("Location:utilisateur1.php");


?>