<div class="wrap">
	<div>
		<div id=\"home_text\">
			<p> 
				<?php echo $content['accueil_welcome'];
				if(isset($user)) {
					if ($user->use_firstname != null) {
						echo " ".$user->use_firstname;
					} else {
						echo " ".$content['accueil_noname'];
					}
				} ?>.
			</p>
			<p>
				<?php echo $content['accueil_purpose']; ?>
			</p>
			<p>
				<?php echo $content['accueil_desc']; ?>
			</p>
		</div>
		<div id="home_btn_wrap"><a id="home_btn" href='?page=menu-choice' title="<?php echo $content['accueil_go_title']; ?>"><?php echo $content['accueil_go_text']; ?></a></div>
	</div>
</div>