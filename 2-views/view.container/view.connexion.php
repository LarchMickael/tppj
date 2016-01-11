<?php if(empty($_SESSION)){ ?>
	<div class="connexionFormDiv">
		<h1>CONNEXION</h1>
		<form id="connexionForm" method="post" action="?page=connexion">
			<fieldset>
				<div id="fieldsetContent">
					<label for="login"><?php echo $content['connexion_login_label'] ?></label>
					<input type="email" name="use_login" id="login" placeholder="myemail@domain.com"/>
					<label for="password"><?php echo $content['connexion_password_label'] ?></label>
					<input type="password" name="use_password" id="password" placeholder="password" />
				</div>
			</fieldset>	
			<div id="coButtonDiv">
				<input type="button" value="<?php echo $content['connexion_button_text'] ?>" onclick="verifyForm()" />
				<a href="?page=registration"><?php echo $content['connexion_signin_text'] ?></a>
			</div>
		</form>
	</div>
<?php } else { ?>
	<div class="connexionFormDiv">
		<span>Vous êtes déjà connecté o/</span>
	</div>
<?php } ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="assets/js/new-connexion.js"></script>