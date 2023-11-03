<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form-v1 by Colorlib</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
session_start();
Include("connexion.php");
        if(isset($_POST['envoyer']))
        {	$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$age=$_POST['age'];
			$Adresse=$_POST['adresse'];
			$image = file_get_contents($_FILES["image"]["tmp_name"]);
			
			$etat=$_POST['etatCivil'];
			$dip="";
			$selectedCheckboxes = $_POST["diplomes"];
			
			$comp="";
			$selectedOptions = $_POST["competences"];
			foreach ($selectedOptions as $option) {
				$comp+=$option+' ';  }
				$university= $_POST["universite"];
				$anneeexp=$_POST["experience"];
				$phone=$_POST["phone"];
				$email=$_POST["email"];
				$linkdin=$_POST["linkedin"];
				$username= $_SESSION['username'];
				$password=$_SESSION['pass'];
				$type="Demandeur";
$req=$conn->prepare("insert into utilisateur values('$username','$email','$password',$image,'$type'");

$req->execute();



            header("Location:home.php");
      
	}
        ?>
	<div class="page-content">
		<div class="form-v1-content">
			<h1>Curriculum Vitale</h1>
			<form class="form-register" name ="form" action="#" method="post" enctype="multipart/form-data">
				<div id="form-total">
					<!--<p>Veuillez saisir vos informations et confirmer vos données afin que nous puissions créer votre compte.  </p>-->
					<p>Veuillez remplier soigneusement le formulaire ci-dessous avec les informations sur votre Curriculum vitale.</p>
					<!-- SECTION 1 : informations generales-->
					<div class="inner">
						<div class="wizard-header">

							<h3 >Informations générales</h3>
						</div>
						<div class="form-row">
							<!--nom-->
							<div class="form-holder">
								<fieldset>
									<legend>Nom<span class="required">*</span> </legend>
									<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
								</fieldset>
							</div>
							<!--prenom-->
							<div class="form-holder">
								<fieldset>
									<legend>Prénom <span class="required">*</span> </legend>
									<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
								</fieldset>
							</div>
						</div>

						<!--age-->
						<div class="form-row form-row-date">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend >Age <span class="required">*</span> </legend>
									<input type="number" name="age" id="age" required> <br>
								</fieldset>
							</div>
						</div>

						<!--adresse-->
						<div class="form-row">
							<div class="form-holder form-holder-2 ">
								<fieldset>
									<legend>Adresse</legend>
									<textarea name="adresse" id="adresse" rows="5" cols = "30" class="form-control" style="border: none;" >  </textarea> 
								</fieldset>
							</div>
						</div>
					</div>

					<!--etat civil-->
					<div class="inner">
						<div class="form-holder">
							<div class="etat">
							<fieldset>
								<legend>Etat Civil</legend>
								<input type="radio" name="etatCivil" value="celibataire" id="celibataire" onclick= "desactiver()" /> <label class="bank-images label-above bank-1-label" for="celibataire">célibataire</label><br> 
								<input type="radio" name="etatCivil" value="marié" id="marie" onclick= "activer()" /> <label class="bank-images label-above bank-1-label"for="marie">marié</label><br>
								<input type="radio" name="etatCivil" value="divorcé" id="divorce" onclick= "activer()" /> <labelclass="bank-images label-above bank-1-label" for="divorce">divorcé</label><br>
								<input type="radio" name="etatCivil" value="veuf" id="veuf" onclick= "activer()" /><label class="bank-images label-above bank-1-label" for="veuf">veuf</label><br>
							</fieldset>
							</div>
						</div> 
					</div>		

					<!--PHOTO-->

					<div class="inner">
						<div class="form-holder ">
							<div class="photo">
								<fieldset>
									<legend>Attachez une photo d'identité :</legend>
									<input type="file" name="image"id="fichier1" />
									
								</fieldset>
							</div>
						</div>
					</div> 
					<br> <br>

					<!-- SECTION 2 : cursus et competences -->
					<div class="inner">
						<div class="wizard-header">
							<h3 >Cursus et compétences</h3>
						</div>

						<!-- diplomes -->
						<div class="form-holder ">
							<div class="diplomes">
								<fieldset>
									<legend>Cochez vos diplomes :</legend>
									<input type="checkbox" name="diplomes" value="licence" /> <label for="licence">Licence</label><br>
									<input type="checkbox" name="diplomes" value="maîtrise" /> <label for="maitrise">Maîtrise</label><br>
									<input type="checkbox" name="diplomes" value="mastère" /> <label for="mastere">Mastere</label><br>
									<input type="checkbox" name="diplomes" value="doctorat" /> <label for="doctorat">Doctorat</label>
								</fieldset>
							</div>
						</div>

						<!-- competences -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Compétences<span class="required">*</span> :</legend>
									<select name="competences[]" id="competences" multiple>
										<optgroup label="Langues" class="form-control">
											<option value="arabe" class="form-control">arabe </option>
											<option value="Français">Français</option>
											<option value="Anglais">Anglais</option>
										</optgroup>
										<optgroup label="programmation web" class="form-control">
											<option value="HTML5">HTML5 </option>
											<option value="CSS3">CCS3</option>
											<option value="JavaScript">JavaScript</option>
											<option value="PHP5">PHP5</option>
										</optgroup>
									</select> 
								</fieldset>
							</div>
						</div>

						<!-- univ -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Université auquelle vous apparteniez :</legend>
									<select name="universite" id="universite">
										<option value="Tunis">Tunis </option>
										<option value="Manar">Manar</option>
										<option value="carthage">Carthage</option>
										<option value="sousse">Sousse</option>
										<option value="sfax">Sfax</option>
										<option value="Jendouba">Jendouba</option>
										<option value="kairouan">Kairouan</option>
										<option value="Gabes">Gabes</option>
									</select>										
								</fieldset>
							</div>
						</div>

						<!-- experience -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Nombre d'années d'expérience :</legend>
									<input type="number" min="1" max="100" step="1" name="experience" id="experience" placeholder="Nombre d'années d'expérience"  class="form-control" minlength="8" maxlength="8" size="30"> <br>
								</fieldset>
							</div>
						</div>
					</div>

					<!-- SECTION 3 : contact-->
					<div class="inner">
						<div class="wizard-header">
							<h3>Contact</h3>
						</div>

						<!-- email -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Adresse Email<span class="required">*</span></legend>
									<input type="text" name="email" id="email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
								</fieldset>
							</div>
						</div>

						<!-- num tel -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Numéro de telephone</legend>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="+1 888-999-7777" required>
								</fieldset>
							</div>
						</div>

						<!-- linkedin -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Lien LinkedIn :</legend>
									<input type="url" name="linkedin" id="linkedin" placeholder="lien linkedin" size="30" maxlength="40"> 
								</fieldset>
							</div>
						</div>
					</div>
					<p id="erreur1"></p>
				</div>
			
			<div class="button">
				<input type="reset" value="Réinitialiser" onclick="annuler()" name="BoutonEffacer"/>
				<input type="submit" name="envoyer" value="Envoyer" onclick="submit_cv()"/>
				<input type="button" value="Offres correspondantes" onclick="lister_offres()">

			</div>
            </form>
		</div>
	</div>
	<script src="form.js"></script>
</body>
</html>