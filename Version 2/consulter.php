<?php
include('connexion.php');
if($_GET['v']=='False'){
    $email=$_GET['email'];
    $sth = $conn->prepare("SELECT * FROM utilisateur where Email='$email'");
    $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($resultat[0]['type']=="Employeur")
        {
            header("Location:utilisateur1.php");
        }        

        else{

            header("Location:utilisateur2.php");

        }
}
else{

$emaile=$_GET['emaile'];
$codeoffre=$_GET['codeoffre'];
$emailD=$_GET['email'];
$etat=0;
$desc="A DEMAND CONSULTATION";
$stmt=$conn->prepare("insert into demande values(:email,:code_offre,:etat,:email_demandeur)");
            $stmt->bindParam(':email', $emaile);
            $stmt->bindParam(':code_offre', $codeoffre);
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':email_demandeur', $emailD);
            $stmt->execute();	
            $stmt=$conn->prepare("insert into notification(email,acteur,objet,description) values(:email,:acteur,:objet,:description)");
            $stmt->bindParam(':email', $emaile);
            $stmt->bindParam(':acteur', $emailD);
            $stmt->bindParam(':objet', $_GET['titreoffre']);
            $stmt->bindParam(':description', $desc);

            $stmt->execute();	
            header("Location:utilisateur2.php");
        }
            

?>