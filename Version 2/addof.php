<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form-v1 by Colorlib</title>
    <link rel="stylesheet" href="addoffre.css"/>
</head>
<body>

	<div class="page-content" style="	height:1150px ;">
		<div class="form-v1-content" >
			<h1>Ajouter une offre d'emploi</h1>
			<form class="form-register" name ="form" action="addoffre.php" method="post" enctype="multipart/form-data" >
				<div id="form-total">

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
									<legend>Cochez le diplome demandé <span class="required">*</span> :</legend>
									<input type="checkbox" name="diplomes" value="licence" /> <label for="licence">Licence</label><br>
									<input type="checkbox" name="diplomes" value="maîtrise" /> <label for="maitrise">Maîtrise</label><br>
									<input type="checkbox" name="diplomes" value="master" /> <label for="mastere">Mastère</label><br>
									<input type="checkbox" name="diplomes" value="doctorat" /> <label for="doctorat">Doctorat</label>
								</fieldset>
							</div>
						</div>

                        <!-- competences demandés -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Choisir les compétences demandées <span class="required">*</span> :</legend>
									<select name="competences[] " id="competences" multiple>
										<optgroup label="Langues" class="form-control">
											<option value="3" class="form-control">arabe </option>
											<option value="2">Français</option>
											<option value="1">Anglais</option>
										</optgroup>
										<optgroup label="programmation web" class="form-control">
											<option value="4">HTML </option>
											<option value="5">CCS</option>
											<option value="6">JavaScript</option>
											<option value="7">PHP</option>
										</optgroup>
									</select> 
								</fieldset>
							</div>
						</div>

                        <!-- experience requise -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Nombre d'années d'expérience requis  <span class="required">*</span>:</legend>
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

					<div class="form-row form-row-date">
							<div class="form-holder form-holder-2">
								<fieldset>

									<legend >Picture<span class="required">*</span> </legend>
									<input type='file' name='pictureO' id='pictureO'>
                    <br>

								</fieldset>
							</div>
						</div>
					</div>
					
					<p id="erreur2"></p>
					<div class="button">
				<input type="reset" value="Réinitialiser" onclick="annuler()" name="BoutonEffacer"/>
				<input type="button" id='btn1' name='btn' value="Envoyer" onclick="submit_offre()"/>
			            </div>
				</div>
			
            </form>

		</div>
	</div>
    <script src="add.js"></script>

</body>
</html>