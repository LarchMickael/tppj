<?php if(!isset($_GET['works'])) {?>
	<div id="inscriptionFormWrap">
		<form id="inscriptionForm" method="post" action="?page=registration&treatment=true">
			<fieldset>
				<div id="fieldsetDiv" >
					<span>
						<label class="inscriptionLabel" for="login"><?php echo $content['inscription_login_label']; ?></label>
						<input id="login" name="login" type="email">
					</span>
					<span>
						<label class="inscriptionLabel" for="password"><?php echo $content['inscription_password_label']; ?></label>
						<input id="password" name="password" type="password">
					</span>
					<span>
						<label class="inscriptionLabel" for="passwordconfirm"><?php echo $content['inscription_passwordconfirm_label']; ?></label>
						<input id="passwordconfirm" name="passwordconfirm" type="password">
					</span>
					<span>
						<label class="inscriptionLabel" for="firstname"><?php echo $content['inscription_firstname_label']; ?></label>
						<input id="firstname" name="firstname" type="text">
					</span>
					<span>
						<label class="inscriptionLabel" for="lastname"><?php echo $content['inscription_lastname_label']; ?></label>
						<input id="lastname" name="lastname" type="text">
					</span>
				</div>
			</fieldset>
			<div id="inscriptionButton">
				<input type="button" value="<?php echo $content['inscription_button_text']; ?>" onclick="verifyForm()" />
			</div>
		</form>
	</div>
<?php } else if ($_GET['works'] == true) { ?>
	<div id="inscriptionFormWrap" >
		<div>Vous avez été correctement inscrit !</div>
		<div>Bienvenue sur TPPJ \o/</div>
		<div>Vous allez être redirigez vers l'accueil :)</div>
		<div><img src="http://www.popstickers.fr/4637/homer-hourra-des-simpsons.jpg" alt="incription reussi" onload="sleepRedirect()"></div>
	</div>
<?php } ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="assets/js/new-registration.js"></script>