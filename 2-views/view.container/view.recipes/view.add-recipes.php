<div class="wrap">
	<div id="wrap_recipe">
		<div id="recipes">
			<form id="recipeForm" method="post" action="?page=addrecipe">
				<fieldset>
					<legend><?php echo $content['fieldset_legend']; ?></legend>
					<!-- Titre de la recette -->
					<span class="span_form">
						<label class="span_form_label" for="rec_title">Titre de la recette</label>
						<input id="rec_title" name="rec_title" type="text" placeholder="<?php echo $content['input_recipe_placeholder']; ?>" />
					</span>
					<!-- Lien de la recette -->
					<span class="span_form">
						<label class="span_form_label" for="rec_link">Lien de la recette</label>
						<input id="rec_link" name="rec_link" type="text" placeholder="Lien de la recette" />
					</span>
					<!-- Recette tppj -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Recette tppj ?</label>
						<select name="rec_tppj" id="rec_tppj">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</span>
					<!-- Type de repas -->
					<span class="span_form">
						<label class="span_form_label" >Type de repas ?</label>
						<?php  foreach ($mealsList as $meal) {
							?> <input type="checkbox" name='mea_id[]' id='<?php echo $meal["mea_label"] ?>' value='<?php echo $meal["mea_id"] ?>' /> <?php
							?> <label class="span_form_label" for="<?php echo $meal["mea_label"] ?>"><?php echo $meal["mea_label"] ?></label> <?php
						} ?>
					</span>
					<!-- Type de plat -->
					<span class="span_form">
						<label class="span_form_label" >Type de plat ?</label>
						<?php  foreach ($coursesList as $course) {
							?> <input type="checkbox" name='crs_id[]' id='<?php echo $course["crs_label"] ?>' value='<?php echo $course["crs_id"] ?>' /> <?php
							?> <label class="span_form_label" for="<?php echo $course["crs_label"] ?>"><?php echo $course["crs_label"] ?></label> <?php
						} ?>
					</span>
					<!-- Type de régime alimentaire -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Type de régime alimentaire ?</label>
						<select name="die_id" id="die_id">
						<?php foreach ($dietsList as $diet) {
							?> <option value="<?php echo $diet['die_id'] ?>"><?php echo $diet['die_label'] ?></option> <?php
						} ?>
						</select>
					</span>
					<!--Pays d'origine -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Pays d'origine ?</label>
						<select name="cou_code" id="cou_code">
						<?php foreach ($countriesList as $country) {
							if($country['cou_code'] == "FRA") {
								?> <option selected value="<?php echo $country['cou_code'] ?>"><?php echo $country['cou_name'] ?></option> <?php
							} else {
								?> <option value="<?php echo $country['cou_code'] ?>"><?php echo $country['cou_name'] ?></option> <?php
							}
						} ?>
						</select>
					</span>
				</fieldset>
				<input type="submit" value="Envoyer" >
		</div>
	</div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="assets/js/new-recipe.js"></script>
