<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form-v1 by Colorlib</title>
    <link rel="stylesheet" href="addoffre.css"/>
</head>
<body>

	<div class="page-content">
		<div class="form-v1-content">
			<h1>Curriculum Vitale</h1>
			<form class="form-register" name ="form" action="add2.php" method="post">
				<div id="form-total">
					<!--<p>Veuillez saisir vos informations et confirmer vos données afin que nous puissions créer votre compte.  </p>-->
					<p>Veuillez remplier soigneusement le formulaire ci-dessous avec les informations sur votre Curriculum vitale.</p>
					<!-- SECTION 1 : informations generales-->
					<div class="inner">
						<div class="wizard-header">

							<h3 >Informations générales</h3>
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
									<legend>Cochez vos diplomes <span class="required">*</span>:</legend>
									<input type="radio" name="diplomes" value="licence" /> <label for="licence">Licence</label><br>
									<input type="radio" name="diplomes" value="maitrise" /> <label for="maitrise">Maîtrise</label><br>
									<input type="radio" name="diplomes" value="mastere" /> <label for="mastere">Mastere</label><br>
									<input type="radio" name="diplomes" value="doctorat" /> <label for="doctorat">Doctorat</label>
								</fieldset>
							</div>
						</div>

						<!-- competences -->
						<div class="form-holder ">
							<div class="competences">
								<fieldset>
									<legend>Cochez vos compétences <span class="required">*</span>:</legend>
									<input type="checkbox" name="competences[]" id="arabe-checkbox" value="3" />
									<label for="arabe-checkbox">arabe</label><br>
									<input type="checkbox" name="competences[]" id="francais-checkbox" value="2" />
									<label for="francais-checkbox">Français</label><br>
									<input type="checkbox" name="competences[]" id="anglais-checkbox" value="1" />
									<label for="anglais-checkbox">Anglais</label><br>
									<input type="checkbox" name="competences[]" id="html5-checkbox" value="4" />
									<label for="html5-checkbox">HTML5</label><br>
									<input type="checkbox" name="competences[]" id="css3-checkbox" value="5" />
									<label for="css3-checkbox">CSS3</label><br>
									<input type="checkbox" name="competences[]" id="javascript-checkbox" value="6" />
									<label for="javascript-checkbox">JavaScript</label><br>
									<input type="checkbox" name="competences[]" id="php5-checkbox" value="7" />
									<label for="php5-checkbox">PHP</label>
								</fieldset>

								<script>
								// get all the checkboxes
								const checkboxes = document.querySelectorAll('input[type="checkbox"][name="competences[]"]');

								// add an event listener for each checkbox
								checkboxes.forEach(checkbox => {
									checkbox.addEventListener('change', () => {
									// get the checkbox value and input ID
									const value = checkbox.value;
									const inputId = `input-${value}`;

									// get the existing input element, or create a new one
									let input = document.getElementById(inputId);
									if (!input) {
										input = document.createElement('input');
										input.type = 'number';
										input.id = inputId;
										input.name = `${value}`;
										input.placeholder = 'Niveau de compétence';
										checkbox.parentNode.insertBefore(input, checkbox.nextSibling);
									}

									// show or hide the input element based on checkbox status
									input.style.display = checkbox.checked ? 'inline-block' : 'none';

									});
								});
								</script>

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
									<legend>Nombre d'années d'expérience <span class="required">*</span>:</legend>
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
						<!-- Facebook -->
						<div class="form-row">
							<div class="form-holder form-holder-2">
								<fieldset>
									<legend>Lien Facebook :</legend>
									<input type="url" name="Facebook" id="Facebook" placeholder="lien Facebook" size="30" maxlength="40"> 
								</fieldset>
							</div>
						
					</div>
					<p id="erreur1"></p>
				</div>
			<div class="button">
				<input type="reset" value="Réinitialiser" onclick="annuler()" name="BoutonEffacer"/>
				<input type="submit"  name='btn'value="Envoyer" onclick="submit_cv()"/>

			</div>
			</form>

		</div>
	</div>
	<script src="add.js"></script>
</body>
</html>