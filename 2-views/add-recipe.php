<div class="wrap">
	<div id="wrap_recipe">
		<div id="recipes">
			<form id="recipeForm" method="post" action="?page=add-recipe&treatment=true">
				<fieldset>
					<legend><?php echo $content['fieldset_legend']; ?></legend>
					<span class="span_form">
						<label class="span_form_label" for="recipe_title"><?php echo $content['input_recipe_title_label']; ?></label>
						<input id="recipe_title" name="recipe_title" type="text" required pattern="[A-Z][A-Za-z0-9]+" maxlength="30" placeholder="<?php echo $content['input_recipe_placeholder']; ?>" />
					</span>
					<span class="span_form">
						<label class="span_form_label" for="nbr_pers"><?php echo $content['input_nbr_pers_label']; ?></label>
						<select name="nbr_pers" id="nbr_pers">
							<option value=""><?php echo $content['input_nbr_pers_option0']; ?></option>
							<option value="1/2"><?php echo $content['input_nbr_pers_option1']; ?></option>
							<option value="2/3"><?php echo $content['input_nbr_pers_option2']; ?></option>
							<option value="3/4"><?php echo $content['input_nbr_pers_option3']; ?></option>
							<option value="4/5"><?php echo $content['input_nbr_pers_option4']; ?></option>
							<option value="5/6"><?php echo $content['input_nbr_pers_option5']; ?></option>
							<option value="6/7"><?php echo $content['input_nbr_pers_option6']; ?></option>
							<option value="7/8"><?php echo $content['input_nbr_pers_option7']; ?></option>
						</select>
					</span>
					<span class="span_form">
						<label class="span_form_label" for="prep_time"><?php echo $content['input_prep_time_label']; ?></label>
						<input id="prep_time_hour" name="prep_time_hour" type="number" min="0" max="10" step="1" value="0" required/>
						<span><?php echo $content['input_prep_time_unit_hour']; ?></span>
						<input id="prep_time_min" name="prep_time_min" type="number" min="0" max="55" step="5" value="0" required/>
						<span><?php echo $content['input_prep_time_unit_min']; ?></span>
					</span>
					<span class="span_form">
						<label class="span_form_label" for="ingComboBoxes" onclick="addComboBox();"><?php echo $content['input_ingredients_label']; ?></label>
						<div id="ingComboBoxes">
							<input type="hidden" name="nbIngredient" id="nbIngredient" value=0>
						</div>
					</span>
					<span class="span_form">
						<label class="span_form_label" for="instructions"><?php echo $content['input_instructions_label']; ?></label>
						<textarea id="instructions" name="instructions" required="required" placeholder="<?php echo $content['input_instructions_placeholder']; ?>" cols="55" wrap="hard"></textarea>
					</span>
					<span class="span_form">
						<label class="span_form_label" for="categorie"><?php echo $content['input_categorie_label']; ?></label>
						<select name="categorie" id="categorie">
							<option value=""><?php echo $content['input_categorie_option0']; ?></option>
							<option value="Omnivore"><?php echo $content['input_categorie_option1']; ?></option>
							<option value="Vegetalien"><?php echo $content['input_categorie_option2']; ?></option>
							<option value="Vegetarien"><?php echo $content['input_categorie_option3']; ?></option>
						</select>
					</span>
					<input id="recipe_btn" type="button" value="<?php echo $content['input_recipe_button']; ?>" onclick="verifyForm()" />
				</fieldset>
			</form>
		</div>
		<div id="ingredient">
			<fieldset>
				<legend><?php echo $content['ing_input_legend']; ?></legend>
				<form method="post" name="body" action="">
					<span class="span_form">
						<input type="text" name='nameIng' id='nameIng' placeholder="<?php echo $content['ing_input_nom_placeholder']; ?>" />
					</span>
					<span class="span_form">
						<input type="text" name='catIng' id="catIng" placeholder="<?php echo $content['ing_input_cat_placeholder']; ?>" />
					</span>
					<span class="span_form">
						<select name="ing_unity" id="ing_unity">
							<option value="ml"><?php echo $content['ing_input_unity_option1']; ?></option>
							<option value="unité"><?php echo $content['ing_input_unity_option2']; ?></option>
							<option value="gr"><?php echo $content['ing_input_unity_option3']; ?></option>
						</select>
					</span>
					<input id="ingredient_btn" type="submit" value="<?php echo $content['input_ing_button']; ?>" />
				</form>
			</fieldset>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="assets/js/new-recipe.js"></script>
