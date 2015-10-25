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
contFr = JSON.parse(fs.readFileSync('public/contenu/fr.json', 'utf8'));


//Routage
app.get('/', function (req, res){
    var cont = contFr;
    res.render('accueil', {cont: cont});
})
.get('/choixdumenu', function(req, res) {
    var cont = contFr;
    res.render('choixdumenu', {cont: cont});
})
.get('/nouvellerecette', function(req, res){
    var cont = contFr;
    res.render('nouvellerecette', {cont: cont});
})
.use(function(req, res){
    res.redirect('/');
});


//Démarrage serveur
app.listen(5000);