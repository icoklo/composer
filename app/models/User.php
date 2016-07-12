<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

	// TODO sloziti da ovo proradi i ispisati nekaj iz baze
	
	protected $table = 'users';

	public function vratiImeIPrezime()
	{
		// $korisnici=User::
		// echo "Ime i prezime:". $capsule->connection . " " . $this->prezime;
	}
}