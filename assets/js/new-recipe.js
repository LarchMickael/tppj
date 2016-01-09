$(document).ready(function(){
    addComboBox();
});

function verifyForm(){
	console.log("verifyForm is running");
	var errorTab = [];
	var titleregex = new RegExp(/^(([A-Z][A-Za-z0-9]+\s?)([a-z0-9]+\s?)+)$/);
	var ingredientRegEx = new RegExp( /^((([A-Za-z0-9]+\s){2}[A-Za-z0-9]+)\s?)+$/ );
	var instructionsRegEx = new RegExp(/^(((-\s)([A-Za-z0-9]+\s?)+)\s?)+/);

	if(!titleregex.test(document.getElementById('recipe_title').value)){
		errorTab.push("Le titre doit commencer par une majuscule.\n\n");
	}

	if(document.getElementById('nbr_pers').value == ""){
		errorTab.push("Le nombre de portions doit être renseigné.\n\n");
	}

	if(document.getElementById('prep_time_min').value == ""){
		errorTab.push("Le temps de préparation doit être renseigné.\n\n");
	}	

	/*if(!ingredientRegEx.test(document.getElementById('recipe_ingredients').value)){
		errorTab.push("La liste d'ingrédient doit être au format ingrédient(tout attaché) catégorie(tout attaché) unité(tout attaché) avec une ligne par ingrédient. Exemple : Carotte Légumes grammes\nBoeuf Viande grammes\n\n");
	}*/

	if(!instructionsRegEx.test(document.getElementById('instructions').value)){
		errorTab.push("La liste d'ingrédient est mal formatée.\nExemple : \n- Eplucher les patates\n- Couper les patates.\n\n");
	}

	if(document.getElementById('categorie').value == ""){
		errorTab.push("La catégorie doit être renseigné.\n\n");
	}

	console.log(document.getElementById('categorie').value);

	if(errorTab.length == 0){
		document.getElementById('recipeForm').submit();
	} else {
		alert(errorTab);
	}
}

var http; // Notre objet XMLHttpRequest

function createRequestObject()
{
    var http;
    if (window.XMLHttpRequest)
    { // Mozilla, Safari, IE7 ...
        http = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    { // Internet Explorer 6
        http = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
    }
    return http;
}

function makeAjaxCall(fileUrl)
{
    http = createRequestObject();
    http.open('GET', fileUrl, false);
    http.onreadystatechange = handleAJAXReturn;
    http.send(null);
    return http.responseText;
}

function handleAJAXReturn()
{
    if (http.readyState == 4)
    {
        if (http.status == 200)
        {
        	console.log("DEBUG : Tout va bien");
        }
        else
        {
            alert('Pas glop pas glop');
        }
    }
}

function addComboBox(){
	console.log("addComboBox started");
	var nbIng = (document.getElementById('nbIngredient').getAttribute('value')*1)+1;
	document.getElementById('nbIngredient').setAttribute('value', nbIng);	
	var liste = makeAjaxCall('1-models/DAO/ingredients-list.php?data='+nbIng);
	$('#ingComboBoxes').append(liste);

}

function setUnit(object) {
	var value = object.value;
	var test = makeAjaxCall('1-models/DAO/get-unit.php?data='+value);
	object.parentNode.lastChild.innerHTML = test;
	console.log("setUnit has running");
}