<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form-v1 by Colorlib</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

	<div class="page-content">
		<div class="form-v1-content">
			<h1>Ajouter une offre d'emploi</h1>
			<form class="form-register" name ="form" action="#" method="post">
				<div id="form-total">
					<p>Veuillez remplier soigneusement le formulaire ci-dessous avec les informations sur votre offre d'emploi.</p>

					<!-- SECTION 1 : informations generales-->
					<div class="inner">
						<!--titre-->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Titre de l'offre<span class="required">*</span> </legend>
									<input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'offre" required>
								</fieldset>
							</div>
                        </div>
                        <!--description-->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Description de l'offre<span class="required">*</span></legend>
									<textarea name="description" id="description" rows="5" cols = "30" class="form-control" style="border: none;" >  </textarea> 
								</fieldset>
							</div>
						</div>

                        <!-- diplomes demandés -->
						<div class="form-holder ">
							<div class="diplomes">
								<fieldset>
									<legend>Cochez le diplome demandé :</legend>
									<input type="checkbox" name="diplomes" value="licence" /> <label for="licence">Licence</label><br>
									<input type="checkbox" name="diplomes" value="maîtrise" /> <label for="maitrise">Maîtrise</label><br>
									<input type="checkbox" name="diplomes" value="mastère" /> <label for="mastere">Mastere</label><br>
									<input type="checkbox" name="diplomes" value="doctorat" /> <label for="doctorat">Doctorat</label>
								</fieldset>
							</div>
						</div>

                        <!-- competences demandés -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Choisir les compétences demandées <span class="required">*</span> :</legend>
									<select name="competences" id="competences" multiple>
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

                        <!-- experience requise -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Nombre d'années d'expérience requis :</legend>
									<input type="number" min="1" max="100" step="1" name="experience" id="experience" placeholder="Nombre d'années d'expérience requis"  class="form-control" minlength="8" maxlength="8" size="30"> <br>
								</fieldset>
							</div>
						</div>

                        <!--salaire-->
						<div class="form-row form-row-date">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend >Salaire proposé <span class="required">*</span> </legend>
									<input type="number" name="salaire" id="salaire" required> <br>
								</fieldset>
							</div>
						</div>
					</div>
					<p id="erreur2"></p>
				</div>
			</form>
			<div class="button">
				<input type="reset" value="Réinitialiser" onclick="annuler()" name="BoutonEffacer"/>
				<input type="submit" value="Envoyer" onclick="submit_offre()"/>
				<input type="button" value="Offres effectuées" onclick="lister_offres()">
			</div>
		</div>
	</div>
    <script src="form.js"></script>

</body>
</html>