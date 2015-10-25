var express = require('express');
var exphbs = require('express3-handlebars');
var fs = require('fs');

//Configuration serveur
app = express();
app.use(express.static('public'))
.set('views', 'public/')
.engine('handlebars', exphbs({defaultLayout: 'main'}))
.set('view engine', 'handlebars');
exphbs.ExpressHandlebars.prototype.layoutsDir = 'public/layout/';



//Routage
app.get('/', function (req, res){
    var contFr = JSON.parse(fs.readFileSync('public/contenu/fr.json', 'utf8'));
    res.render('accueil', {contFr: contFr});
})
.post('/')


//Démarrage serveur
app.listen(5000);