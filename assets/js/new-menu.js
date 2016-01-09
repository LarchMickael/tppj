function verifyForm(){
	console.log("verifyForm is running");
	var errorTab = [];
	var mealTab =[];
	
	if(document.getElementById('omnivore').checked == true){
	} else if (document.getElementById('vegetalien').checked == true){
	} else if (document.getElementById('vegetarien').checked == true){
	} else {
		errorTab.push("Vous devez sélectionner un régime.\n\n")		
	}


	if(document.getElementById('morning').checked == false){
		mealTab.push(true);
	}
	if(document.getElementById('noon').checked == false){
		mealTab.push(true);
	}	
	if(document.getElementById('evening').checked == false){
		mealTab.push(true);
	}
	if(mealTab.length == 3){
		errorTab.push("Vous devez sélectionner au minimum un repas.\n\n")
	}

	if(document.getElementById('periode').value == ""){
		errorTab.push("Vous devez sélectionner une période.\n\n");
	}

	if(errorTab.length == 0){
		document.getElementById('menuForm').submit();
	} else {
		alert(errorTab);
	}

}