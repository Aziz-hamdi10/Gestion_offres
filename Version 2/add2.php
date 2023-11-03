<?php
include("connexion.php");
session_start();
$email=$_SESSION['email'];
    $age=$_POST['age'];
    $etatcivil=$_POST['etatCivil'];
    $diplome = $_POST['diplomes'];
    $adresse = $_POST['adresse'];
    $universite = $_POST["universite"];
    $exp = $_POST['experience'];
    $phone = $_POST['phone'];
    $linkedin = $_POST['linkedin'];

    $Facebook = $_POST['Facebook'];
    $exp = $_POST['experience'];
    $stmt = $conn->prepare("UPDATE Demandeur SET age=?, adresse=?, etatcivil=?, numero=?, experience=?, diplome=?,facebook=?,linkedin=? ,university=?WHERE email=?");
    $stmt->execute([$age, $adresse, $etatcivil, $phone, $exp, $diplome,$Facebook,$linkedin,$universite, $email]);

$stmt->execute();
$selected_options = $_POST['competences'];

foreach ($selected_options as $option) {
    switch ($option) {
        case 1:
$score=$_POST['1'];
            break;
        case 2:
            $score=$_POST['2'];
            break;
        case 3:
            $score=$_POST['3'];
            break;
        case 4:
            $score=$_POST['4'];
            break;
        case 5:
            $score=$_POST['5'];
            break;
        case 6:
            $score=$_POST['6'];
            break;
        case 7:
            $score=$_POST['7'];

            break;
        default:
            echo "Invalid day of week";
            break;
    }

    $stmt = $conn->prepare("INSERT INTO competensesd (numc,email,score) VALUES (:numc,:email,:score)");
    $stmt->bindParam(':numc', $option);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':score', $score);
$stmt->execute();
}

       /* $selected_options = $_POST['competences'];

        foreach ($selected_options as $option) {
            echo "<tr><td>" . $option . "</td></tr>";
        }*/

        header("Location:utilisateurD.php");


?>