<?php
include("connexion.php");
session_start();
$email=$_SESSION['email'];
$cd=$_GET['codeoffre'];
$req1=$conn->prepare("delete from demande where code_offre='$cd' and email_demandeur='$email'");
$req1->execute();

header("Location:jobsubmitted.php?email=$email");


?>x