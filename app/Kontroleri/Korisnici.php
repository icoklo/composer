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
		echo "<h2> Korisnici: </h2>"; 
		
		$baza=new \Models\Baza();
		$baza->spojiSeNaBazu();
		//$korisnici=\Models\User::all();
		$korisnici=User::all();

		foreach ($korisnici as $korisnik) {
			//echo "<p>". $korisnik->ime . " ". $korisnik->prezime . "</p>";
			echo "<p>". $korisnik->vratiImeIPrezime($korisnik->ime,$korisnik->prezime)."</p>";
		}

		echo "<h2> Linkovi: </h2>";
		echo "<a href='http://composer.loc/home/registracija'> Registracija </a> <br/> <br/>";
		echo "<a href='http://composer.loc/home'> Pocetna </a>";

	}


}