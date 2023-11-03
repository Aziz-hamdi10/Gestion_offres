<?php
include("connexion.php");
session_start();
$email=$_SESSION['email'];
    $titre=$_POST['titre'];
    $desc=$_POST['description'];
    $diplome = $_POST['diplomes'];
  $pic=file_get_contents($_FILES['pictureO']['tmp_name']);
    $salaire = $_POST['salaire'];
    $exp = $_POST['experience'];
    $stmt = $conn->prepare("INSERT INTO offre (description,pic ,salaire, experience, titre, emailE, diplome) VALUES (:description,:pic, :salaire, :experience, :titre, :emailE, :diplome)");
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':pic', $pic);

    $stmt->bindParam(':salaire', $salaire);
    $stmt->bindParam(':experience', $exp);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':emailE', $email);
    $stmt->bindParam(':diplome', $diplome);
    

$stmt->execute();

$codeoffre = $conn->lastInsertId();
  
        $selected_options = $_POST['competences'];

        foreach ($selected_options as $option) {
            $stmt = $conn->prepare("INSERT INTO competensesO (numc, codeo) VALUES (:numc, :codeo)");
            $stmt->bindParam(':numc', $option);
            $stmt->bindParam(':codeo', $codeoffre);
            
        
        $stmt->execute();

        }

        header("Location:utilisateur1.php");


?>