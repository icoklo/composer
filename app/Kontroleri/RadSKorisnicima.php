<?php

namespace Kontroler;
use Models\User as User;

// handlanje gresaka
// ako je sve u redu sa zahtjevom, tj ako developer nista ne podesi tada se kod slim-a uvijek vraca http status kod 200
// bez obzira jeli se desila greska ili ne, ako se zeli vratiti neki drugi http status kod tada to treba postaviti sam developer
// struktura json-a koji vraca poruke korisniku
class RadSKorisnicima extends Kontroler
{

	public function provjeriPostParametre(){
		if(isset($_POST["ime"]) AND isset($_POST["prezime"])){

			// ako su za ime i prezime unesene neke vrijednosti
			if($_POST["ime"] AND $_POST["prezime"]){
				return true;
			}
			else {
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function unosKorisnika(){

		if($this->provjeriPostParametre==true){
			$imeKorisnika = $_POST["ime"];
			$prezimeKorisnika = $_POST["prezime"];
			$user = new \Models\User;
			$user->ime = $imeKorisnika;
			$user->prezime = $prezimeKorisnika;
			$user->save();
			$poruka = "Korisnik ".$imeKorisnika." ".$prezimeKorisnika." je unesen.";

				// pristup metodi ispis() iz klase Kontroler
			$this->ispisiPoruku($poruka,200);
		}
		else{
			$this->ispisiPoruku("Niste unijeli ime i prezime!",400);
		}


	}

	public function editKorisnika($id){

		// echo "id ".$id;
		$pronadiKorisnika = User::find($id);
		$poruka = "";

		// ako je pronaden korisnik
		if($pronadiKorisnika){
			if($this->provjeriPostParametre()==true){
				$staroIme = $pronadiKorisnika->ime;
				$staroPrezime = $pronadiKorisnika->prezime;

				$pronadiKorisnika->ime = $_POST["ime"];
				$pronadiKorisnika->prezime = $_POST["prezime"];

				$pronadiKorisnika->save();
			// Moze i ovakav način
				$poruka = "Stari podaci: {$staroIme} {$staroPrezime}, Novi podaci: {$pronadiKorisnika->fullName()}.";
				$this->ispisiPoruku($poruka,200);
			}
			else{
				$this->ispisiPoruku("Niste unijeli novo ime i prezime!",400);
			}
		}
		else{
			/* $polje = array('poruka' => $poruka);
			echo json_encode($polje); */
			$poruka = "Korisnik sa id: ". $id . " ne postoji";
			$this->ispisiPoruku($poruka,400);
		}
	}

	public function ispisPodatakaKorisnika($id){

		// ispis podataka odredenog korisnika
		$korisnik = "";
		$poruka = "";

		// jedan korisnik
		$korisnik = User::find($id);

		if($korisnik){
			$this->ispisPodataka($korisnik);
		}
		else {
			$poruka = "Korisnik sa id: ". $id . " ne postoji";
			// $app->halt(400, $poruka);
			$this->ispisiPoruku($poruka,400);
		}
	}

	public function ispisSvihKorisnika(){

		$korisnici = User::all();
		if($korisnici){
			$this->ispisPodataka($korisnici);
		}
		else{
			// ili ispis sljedece poruke ili ispis praznog polja
			// $poruka = "Nema korisnika u bazi";
			// $polje = array('poruka' => $poruka);
			$this->ispisPodataka($korisnici);
		}
	}
}