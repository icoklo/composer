<?php

namespace Kontroler;

// napraviti klasu u kojoj ce biti definirana metoda za ispis i koja se koristi u mojoj klasi RadSKorisnicima kako bi se
// olaksao ispis podataka, da se ne ponavlja stalno isti dio koda, ta funkcija bi trebala primati parametre (podaciZaIspis,poruka,status)

// funkcije unutar klase nazivati po camel case notaciji: imeFunkcije
// obicne funkcije unutar php skripte nazivati stilom: ime_funkcije

class Kontroler{

	protected $app;

	public function __construct()
	{
		// instanca Slima
		$this->app = \Slim\Slim::getInstance();
		$this->app->response->headers->set('Content-Type', 'application/json');
	}

	// funkcija za ispis poruke korisnike, npr. nakon uspjesnog unosa novog korisnika
	protected function ispisiPoruku($poruka,$status=200){

		$polje = array('kod' => $status, 'poruka' => $poruka);
		echo json_encode($polje);
		$this->app->response->status($status);
	}

	// funkcija za ispis dohvacenih podataka iz baze podataka, konkretno ovdje se radi o dohvacenim korisnicima iz baze
	protected function ispisDohvacenihPodataka($podaciZaIspis){
		$ispis = array();

		// pomocno polje koje se koristi kod ispisa vise elemenata
		$pomocnoPolje = array();

		// samo jedan element u polju
		if(sizeof($podaciZaIspis)==1){
			$ispis = array('id' => $podaciZaIspis->id, 'Ime' => $podaciZaIspis->ime, 'Prezime' => $podaciZaIspis->prezime);
		}
		// vise elemenata u polju ili niti jedan element u polju
		else{

			foreach ($podaciZaIspis as $korisnik) {
				// ako se polje definira ovako tada se u svakom koraku for petlje u to polje upisuje nova vrijednost
				// i to polje sadrzi samo jedan element
				// $polje = array('id' => $korisnik->id, 'Ime' => $korisnik->ime, 'Prezime' => $korisnik->prezime);

				// ovo je dobar nacin za definiranje polja koje se sastoji od vise elemenata (vise od jednog elementa)
				$pomocnoPolje[] = array('id' => $korisnik->id, 'Ime' => $korisnik->ime, 'Prezime' => $korisnik->prezime);
			}
			$ispis=array('korisnici'=>$pomocnoPolje);

		}
		echo json_encode($ispis);
	}
}