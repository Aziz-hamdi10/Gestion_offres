
<?php
include('connexion.php');

$emaile=$_GET['emaile'];
$codeoffre=$_GET['codeoffre'];
$emailD=$_GET['emaild'];
$etat=0;
$v="refuse your demand";
if(($_GET['v']=='True')){
    $v="accepte your demand";
    echo"haha";
}
$stmt = $conn->prepare("INSERT INTO notification (email, acteur, objet, description) VALUES (:email, :acteur, :objet, :description)");
$stmt->bindParam(':email', $emailD);
            $stmt->bindParam(':acteur', $emaile);
            $stmt->bindParam(':objet', $_GET['titreoffre']);
            $stmt->bindParam(':description', $v);
            $stmt->execute();	
           
            
            if($v=="accepte your demand")
            {
                $stmt->execute();	
                $stmt = $conn->prepare("update demande set etat=1 where email_demandeur='$emailD' and code_offre='$codeoffre'");
                $stmt->execute();	
                $stmt = $conn->prepare("update offre set etat='Indisponible' where  codeoffre='$codeoffre'");
            $stmt->execute();
        }
            else{
                $stmt = $conn->prepare("update demande set etat='-1' where email_demandeur='$emailD' and code_offre='$codeoffre'");
                $stmt->execute();
            }
            header("Location:utilisateur1.php");
	

?>