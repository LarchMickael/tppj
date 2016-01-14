<?php if(!isset($_GET['works']) || $_GET['works'] == false) { ?>
    <div class="wrap">
        <div>
            <form id="menuForm" method="post" action="?page=menu">
                <fieldset class="choice">
                    <legend><?php echo $content['choice_diet']; ?></legend>

                    <label for="omnivore"><?php echo $content['choice_diet_omni']; ?></label>
                    <input name="die_id" id="omnivore" type="radio" value=1 />

                    <label for="vegetalien"><?php echo $content['choice_diet_vegel']; ?></label>
                    <input name="die_id" id="vegetalien" type="radio" value=2 />

                    <label for="vegetarien"><?php echo $content['choice_diet_veger']; ?></label>
                    <input name="die_id" id="vegetarien" type="radio" value=3 />
                </fieldset>
                <fieldset class="choice">
                    <legend><?php echo $content['choice_meal']; ?></legend>
                    <label for="morning"><?php echo $content['choice_meal_morning']; ?></label>
                    <input type="checkbox" name="morning" value="true" id="morning" checked />
                    <label for="noon"><?php echo $content['choice_meal_noon']; ?></label>
                    <input type="checkbox" name="noon" value="true" id="noon" checked />
                    <label for="evening"><?php echo $content['choice_meal_evening']; ?></label>
                    <input type="checkbox" name="evening" value="true" id="evening" checked />
                </fieldset>
                <fieldset class="choice">
                    <legend><?php echo $content['choice_span']; ?></legend>
                    <label for="periode"><?php echo $content['choice_span_question']; ?></label>
                    <select name="periode" id="periode">
                        <option value=""><?php echo $content['choice_span_option0']; ?></option>
                        <option value="jour"><?php echo $content['choice_span_option1']; ?></option>
                        <option value="semaine"><?php echo $content['choice_span_option2']; ?></option>
                        <option value="mois"><?php echo $content['choice_span_option3']; ?></option>
                    </select>
                </fieldset>
                <input type="button" value="<?php echo $content['choice_button']; ?>" onclick="verifyForm()" />
            </form>
        </div>
    </div>
<?php } else if($_GET['works'] == true) {

} ?>
<script type="text/javascript" src="assets/js/new-menu.js"></script>