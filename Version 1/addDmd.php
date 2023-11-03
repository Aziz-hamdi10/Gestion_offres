<?php
session_start();
Include("connexion.php");
        	$pic=file_get_contents( $_FILES['PictureD']['tmp_name']);
			$email=$_POST['email1'];
			$password=$_POST['password'];
			$type="Demandeur";
            $stmt=$conn->prepare("insert into utilisateur(Email,password,pic,type)values(:email, :password,:pic,:type)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':pic', $pic);
            $stmt->execute();	
            $cin=$_POST['cin'];
            $nom=$_POST['FnameD'];
            $prenom=$_POST['SnameD'];
            $date_nai="12-7-2022";
            $etatcivil=0;
            $adresse="wardia";
            $numero="96342252";
            $age="-1";
            $exp='0';
            $diplome="";
            $stmt=$conn->prepare("insert into demandeur(cin,nom,prenom,date_nai,etatcivil,adresse,numero,email,age,experience,diplome) values(:cin, :nom, :prenom,:date_nai,:etatcivil,:adresse,:numero,:Email,:age,:experience,:diplome)");
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':Email', $email);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':etatcivil', $etatcivil);
            $stmt->bindParam(':date_nai', $date_nai);
            $stmt->bindParam(':experience', $exp);
            $stmt->bindParam(':diplome', $diplome);



            $stmt->execute();
            header("Location:index1.php");



?>