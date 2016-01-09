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
    }
    return http;
}

function addComboBox()
{
    http = createRequestObject();
    http.open('GET', 'pages/listeIngredients.php', true);
    http.send(null);
}