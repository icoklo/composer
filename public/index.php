<?php

// require 'vendor/autoload.php';
// include_once "./vendor/slim/slim/Slim/Slim.php";
require '../vendor/autoload.php'; // ../ je mapa iznad
require_once '../app/config/Baza.php'; // tako da dalje mogu bez problema raditi s bazom preko eloquent ORM-a

// include_once "./Pocetna.php";
// include_once "./controllers/Home.php";

// echo "<h1>Početna stranica, unesite neki url parametar ako želite testirati aplikaciju! </h1>";
// echo "<h2>Primjer url parametra za test: localhost/composer/pocetna/funkcija1  </h2>";

$app = new \Slim\Slim();

// $app->response->headers->set('Content-Type', 'application/json');
// $app->contentType('application/json; charset=utf-8');

/*$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});*/

/*$app->get('/pocetna/:name', function ($name) {
    //echo "Hello, " . $name;
    $nazivLowercase=strtolower($name);
    $pocetna=new Pocetna();
    if(strcmp($nazivLowercase, "funkcija1")==0){
    	$pocetna->funkcija1();
    }
	elseif (strcmp($nazivLowercase, "funkcija2")==0) {
		$pocetna->funkcija2();
	}
	elseif (strcmp($nazivLowercase, "funkcija3")==0) {
		$pocetna->funkcija3();
	}

});*/

// $app->get('/pocetna', "Pocetna:funkcija1"); // pozivanje funkcije1 iz klase Pocetna


//$app->get('/home/', "Home:funkcija"); // bez namespace

// kontroler sa namespace
$app->get('/home', "Kontroler\Home:funkcija");

// $app->get('/home/registracija', "K\Registracija:funkcija");

$app->get('/home/registracija', "Kontroler\\Registracija:funkcija");
$app->get('/home/korisnici', "Kontroler\\Korisnici:funkcija");

// Rad s bazom podataka
$app->post('/home/user', "Kontroler\\RadSKorisnicima:unosKorisnika");

$app->post('/home/user/:id', "Kontroler\\RadSKorisnicima:editKorisnika");

$app->get('/home/user/:id', "Kontroler\\RadSKorisnicima:ispisPodatakaKorisnika")->conditions(array('id' => '[0-9]+'));

$app->get('/home/user/list', "Kontroler\\RadSKorisnicima:ispisSvihKorisnika");

/*$app->get('/home/korisnici', function(){
	// Fetch all users

	$baza=new \Models\Baza();
	$baza->spojiSeNaBazu();

    $korisnici = \Models\User::all();
    echo $korisnici->toJson();

});*/

$app->run();

/*
NAPOMENE: kad se napravi neki novi file (.php ili nest drugo) onda treba pozvati naredbu composer update tako da on prikupi info o tom novom fajlu i da skuzi da
si napravil novi fajl, ali prvo moras u composer.json definirati za koje mape da composer provjerava stanje, a to se napravi pomoću opcije autoload, i za tu opciju autoloadanja (auto ucitavanja svih fajlova tak da ne moras koristiti include na vrhu skripte) imas vise mogucnosti
(PSR-0, PSR-4, Classmap i Files)

JSONView dodatak
i Postman dodatak za Chrome

*/