<?php

namespace Kontroler;

class Korisnici{

	public function __construct()
	{

	}

	public function funkcija(){
		echo "<h2> Naziv klase: ".__CLASS__."</h2>";
		echo "<h2> Naziv funkcije: ".__FUNCTION__."</h2>"; 

		echo "<a href='http://composer.loc/home/registracija'> Registracija </a> <br/> <br/>";
		echo "<a href='http://composer.loc/home'> Pocetna </a>";
	}


}