<?php

namespace Kontroler;
use Models\User as User;

class Korisnici{

	public function __construct()
	{

	}

	// TODO sloziti da ovo proradi i ispisati nekaj iz baze
	
	public function funkcija(){
		echo "<h2> Naziv klase: ".__CLASS__."</h2>";
		echo "<h2> Naziv funkcije: ".__FUNCTION__."</h2>"; 
		echo "<h2> Korisnici: </h2>"; 
		//$korisnici=User::all();
		echo "1";
		echo "2";
		try{
			$korisnik=User::findOrFail(1);
		}
		catch(Exception $e){
			echo "Exception: ".$e;
		}

		//$korisnik=Models\Capsule::select('select * from users where id=1', array(1));
		
		echo "korisnik:". $korisnik->ime;
		/*foreach ($korisnici as $korisnik) {
			echo "<p>". $korisnik->vratiImeIPrezime(). "</p>";
		}*/

		echo "<a href='http://composer.loc/home/registracija'> Registracija </a> <br/> <br/>";
		echo "<a href='http://composer.loc/home'> Pocetna </a>";

	}


}