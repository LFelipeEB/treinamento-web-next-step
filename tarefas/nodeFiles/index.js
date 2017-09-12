/*
 *
 *Este exemplo é um exemplo claro de como transformar uma simples aplicação em um caos
 *
 */


var express = require('express');
var express_app = express();
var bodyParser = require("body-parser");

express_app.use(bodyParser.urlencoded({ extended: false }));
express_app.use(bodyParser.json());

express_app.set('views', __dirname + '/view');
express_app.engine('html', require('ejs').renderFile);
express_app.set('view engine', 'ejs');

express_app.use('/node_modules', express.static('node_modules'));

const fs = require('fs');
const FILE = __dirname+"/files/database.lfe";

express_app.get("/", function (req, res) {
    res.render("form.html");
});

express_app.post("/", function (req, res) {
    console.log(req.body);

    fs.readFile(FILE, function(err, data) {
        if (err) throw err;
        var dados = data.toString();
        var jsonDados = JSON.parse(dados);
        console.log("Foi Lido :" + jsonDados);


        jsonDados.push(req.body);

        var jsonToString = JSON.stringify(jsonDados);
        console.log("ESCREVENDO :" + jsonToString);


        fs.writeFile(FILE, jsonToString,function (err) {
            if (err) throw err;
            res.redirect('/results');
        });


    });
});

express_app.get("/contatos", function (req, res) {
    fs.readFile(FILE, function(err, data) {
        if (err) throw err;
        var dados = data.toString();
        var jsonDados = JSON.parse(dados);
        console.log("Foi Lido :" + jsonDados);

        res.render('results.html', {data: jsonDados});
    });


});

express_app.listen(3001, function () {
    console.log("Start");
});