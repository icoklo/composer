<?php

namespace Kontroler;
use Models\User as User;

class Korisnici{

	public function __construct()
	{

	}

	public function funkcija(){
		echo "<h2> Naziv klase: ".__CLASS__."</h2>";
		echo "<h2> Naziv funkcije: ".__FUNCTION__."</h2>"; 
		echo "<h2> Svi korisnici: </h2>"; 
		
		/*$a = $b + $c;
		if($b AND $c)
		{

		}
		else
		{

		} */

		// metodaUnutarKlase

		// OvoJeKlasa

		//$korisnici=\Models\User::all();
		$korisnici=User::all();

		foreach ($korisnici as $korisnik) {
			//echo "<p>". $korisnik->ime . " ". $korisnik->prezime . "</p>";
			echo "<p> Ime i prezime: ". $korisnik->fullName()."</p>";
		}

		echo "<h2> Linkovi: </h2>";
		echo "<a href='http://composer.loc/home/registracija'> Registracija </a> <br/> <br/>";
		echo "<a href='http://composer.loc/home'> Pocetna </a>";

	}


}