function verifyForm(){
	console.log("verifyForm is running");
	document.getElementById('inscriptionForm').submit();
}

function sleepRedirect(){
	console.log("sleepRedirect run");
	window.setTimeout("window.location.replace('index.php')" , 3000 );
}