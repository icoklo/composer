<?php

namespace Kontroler;

class Registracija{

	public function __construct()
	{

	}

	public function funkcija(){
		echo "<h2> Naziv klase: ".__CLASS__."</h2>";
		echo "<h2> Naziv funkcije: ".__FUNCTION__."</h2>";

		echo "<a href='http://composer.loc/home'> Pocetna </a> <br/> <br/> ";
		echo "<a href='http://composer.loc/home/korisnici'> Korisnici </a>";

	}


}