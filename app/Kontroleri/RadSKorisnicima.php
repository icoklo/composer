<?php

namespace Kontroler;
use Models\User as User;

class RadSKorisnicima
{

	public function unosKorisnika(){
		$imeKorisnika=$_POST["ime"];
		$prezimeKorisnika=$_POST["prezime"];

		$user=new \Models\User;
		$user->ime=$imeKorisnika;
		$user->prezime=$prezimeKorisnika;
		$user->save();
		echo "Korisnik ".$imeKorisnika. " ".$prezimeKorisnika." je unesen.";
	}

	public function editKorisnika(){
		$idKorisnika=$_GET["id"];
		echo "id ".$idKorisnika;
		$pronadiKorisnika=User::find($id);
		if(isset($pronadiKorisnika)){
			$staroIme=$pronadiKorisnika->ime;
			$staroPrezime=$pronadiKorisnika->prezime;

			$pronadiKorisnika->ime=$_POST["ime"];
			$pronadiKorisnika->prezime=$_POST["prezime"];
			$pronadiKorisnika->save();
			echo "Staro ime: ".$staroIme. " staro prezime: ". $staroPrezime. ", Novi podaci: ". $pronadiKorisnika->fullName();
			return;
		}
		else{
			echo "Korisnik sa id: ". $id . " ne postoji";
		}
		
	}

	public function ispisiPodatkeKorisnika($id){
		$pronadiKorisnika=User::find($id);
		if(isset($pronadiKorisnika)){
			echo $pronadiKorisnika->ime . $pronadiKorisnika->prezime;
		}
		else{
			echo "Korisnik sa id: ". $id . " ne postoji";
		}
		
	}

	public function ispisiSveKorisnike(){
		$korisnici=User::all();
		if(isset($korisnici)){

			foreach ($korisnici as $korisnik) {
				echo $korisnik->fullName(). "\n";
			}
		}
		else{
			echo "Nema korisnika u bazi";
		}
		
	}

}