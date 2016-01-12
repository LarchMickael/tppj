<div class="wrap">
	<div id="wrap_recipe">
		<div id="recipes">
			<form id="recipeForm" method="post" action="?page=modrecipe">
				<fieldset>
					<legend><?php echo $content['fieldset_legend']; ?></legend>
					<!-- ID de la recette -->
					<span class="span_form" style="display: none">
						<label class="span_form_label" for="rec_id">ID de la recette</label>
						<input id="rec_id" name="rec_id" type="text" value="<?php echo $recipes->rec_id ?>" />
					</span>
					<!-- Titre de la recette -->
					<span class="span_form">
						<label class="span_form_label" for="rec_title">Titre de la recette</label>
						<input id="rec_title" name="rec_title" type="text" value="<?php echo $recipes->rec_title ?>" />
					</span>
					<!-- Lien de la recette -->
					<span class="span_form">
						<label class="span_form_label" for="rec_link">Lien de la recette</label>
						<input id="rec_link" name="rec_link" type="text" value="<?php echo $recipes->rec_link ?>" />
					</span>
					<!-- Recette tppj -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Recette tppj ?</label>
						<select name="rec_tppj" id="rec_tppj">
						<?php if($recipe->rec_tppj = 0) { ?>
							<option selected value="0">Non</option>
							<option value="1">Oui</option>
						<?php } else { ?>
							<option value="0">Non</option>
							<option selected value="1">Oui</option>
						<?php } ?>
						</select>
					</span>
					<!-- Type de repas -->
					<span class="span_form">
						<label class="span_form_label" >Type de repas ?</label>
						<?php  foreach ($mealsFullList as $meal) {
									if(isValSet($mealsList, $meal['mea_id'])){
											?> <input checked type="checkbox" name='mea_id[]' id='<?php echo $meal["mea_label"] ?>' value='<?php echo $meal["mea_id"] ?>' /> <?php
											?> <label class="span_form_label" for="<?php echo $meal["mea_label"] ?>"><?php echo $meal["mea_label"] ?></label> <?php
									} else {
											?> <input type="checkbox" name='mea_id[]' id='<?php echo $meal["mea_label"] ?>' value='<?php echo $meal["mea_id"] ?>' /> <?php
											?> <label class="span_form_label" for="<?php echo $meal["mea_label"] ?>"><?php echo $meal["mea_label"] ?></label> <?php
									}
						} ?>
					</span>
					<!-- Type de plat -->
					<span class="span_form">
						<label class="span_form_label" >Type de plat ?</label>
					<?php foreach ($coursesFullList as $course) {
									if(isValSet($coursesList, $course['crs_id'])){
										?> <input checked type="checkbox" name='crs_id[]' id='<?php echo $course["crs_label"] ?>' value='<?php echo $course["crs_id"] ?>' /> <?php
										?> <label class="span_form_label" for="<?php echo $course["crs_label"] ?>"><?php echo $course["crs_label"] ?></label> <?php
									} else {
										?> <input type="checkbox" name='crs_id[]' id='<?php echo $course["crs_label"] ?>' value='<?php echo $course["crs_id"] ?>' /> <?php
										?> <label class="span_form_label" for="<?php echo $course["crs_label"] ?>"><?php echo $course["crs_label"] ?></label> <?php
									}
						} ?>
					</span>

					<!-- Type de régime alimentaire -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Type de régime alimentaire ?</label>
						<select name="die_id" id="die_id">
						<?php foreach ($dietsFullList as $diet) {
							if(sizeof($dietsList) == $diet['die_id']) {
								?> <option selected value="<?php echo $diet['die_id'] ?>"><?php echo $diet['die_label'] ?></option> <?php
							} else {
								?> <option value="<?php echo $diet['die_id'] ?>"><?php echo $diet['die_label'] ?></option> <?php
							}
						} ?>
						</select>
					</span>
					<!--Pays d'origine -->
					<span class="span_form">
						<label class="span_form_label" for="rec_tppj">Pays d'origine ?</label>
						<select name="cou_code" id="cou_code">
						<?php foreach ($countriesFullList as $country) {
							if($country['cou_code'] == $recipes->cou_code) {
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
