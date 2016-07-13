<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

	protected $table = 'users';
	
	public function vratiImeIPrezime($ime,$prezime)
	{
		// $korisnici=User::
		echo "Ime i prezime: " . $ime . " ". $prezime;
		
	}
}