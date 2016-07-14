<?php

namespace Kontroler;
use Models\User as User;

// handlanje gresaka
class RadSKorisnicima
{

	public function unosKorisnika(){
		$app=\Slim\Slim::getInstance();
		if(isset($_POST["ime"]) AND isset($_POST["prezime"])){
			// ako su ime i prezime uneseni 
			if($_POST["ime"] AND $_POST["prezime"]){
				$imeKorisnika = $_POST["ime"];
				$prezimeKorisnika = $_POST["prezime"];
				$user = new \Models\User;
				$user->ime = $imeKorisnika;
				$user->prezime = $prezimeKorisnika;
				$user->save();
				$poruka = "Korisnik ".$imeKorisnika." ".$prezimeKorisnika." je unesen.";
				$polje = array('poruka' => $poruka);
				echo json_encode($polje);
			}
			else{
				$app->halt(400, 'Niste unijeli ime i prezime!');
			}
		}
		else{
			$app->halt(400, 'Niste unijeli ime i prezime!');
		}

	}

	public function editKorisnika($id){

		// echo "id ".$id;

		$pronadiKorisnika = User::find($id);
		$poruka = "";
		$polje = array();
		$app = \Slim\Slim::getInstance();
		// ako je pronaden korisnik
		if($pronadiKorisnika){
			$staroIme = $pronadiKorisnika->ime;
			$staroPrezime = $pronadiKorisnika->prezime;

			$pronadiKorisnika->ime = $_POST["ime"];
			$pronadiKorisnika->prezime = $_POST["prezime"];

			$pronadiKorisnika->save();
			// Moze i ovakav način
			$poruka = "Staro ime: {$staroIme} staro prezime: {$staroPrezime}, Novi podaci: {$pronadiKorisnika->fullName()}.";
			$polje = array('poruka' => $poruka);
			echo json_encode($polje);
			return;
		}
		else{
			/* $polje = array('poruka' => $poruka);
			echo json_encode($polje); */
			$poruka = "Korisnik sa id: ". $id . " ne postoji";
			$app->halt(404, $poruka);
		}

	}

	public function ispisPodatakaKorisnika($id){
		// ispis podataka odredenog korisnika
		$app = \Slim\Slim::getInstance();
		$korisnik = "";
		$poruka = "";
		$polje = array();
			// jedan korisnik
		$korisnik = User::find($id);

		if($korisnik){
			$polje = array('id' => $korisnik->id, 'Ime' => $korisnik->ime, 'Prezime' => $korisnik->prezime);
			echo json_encode($polje);
		}
		else {
			$poruka = "Korisnik sa id: ". $id . " ne postoji";
			$app->halt(400, $poruka);
		}
	}

	public function ispisSvihKorisnika(){
		$polje = array();
		$poljeZaIspisSvihKorisnika = array();
		$korisnici = User::all();
		if($korisnici){

			foreach ($korisnici as $korisnik) {
					// ako se polje definira ovako tada se u svakom koraku for petlje u to polje upisuje nova vrijednost
					// i to polje sadrzi samo jedan element
					// $polje = array('id' => $korisnik->id, 'Ime' => $korisnik->ime, 'Prezime' => $korisnik->prezime);

					// ovo je dobar nacin za definiranje polja koje se sastoji od vise elemenata (vise od jednog elementa)
				$polje[] = array('id' => $korisnik->id, 'Ime' => $korisnik->ime, 'Prezime' => $korisnik->prezime);

			}
			$poljeZaIspisSvihKorisnika=array('korisnici'=>$polje);
			echo json_encode($poljeZaIspisSvihKorisnika);
		}
		else{
			// ili ispis sljedece poruke ili ispis praznog polja
			// $poruka = "Nema korisnika u bazi";
			// $polje = array('poruka' => $poruka);
			echo json_encode($polje);
		}
	}
}