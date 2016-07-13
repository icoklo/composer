<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

	protected $table = 'users';

	// indicates if the model should be timestamped 
	public $timestamps = false;

	public function fullName()
	{
		// pristupas stupcima iz baze kao varijablama s istim imenom kakvo je i definirano u tablici iz baze 
		return $this->ime . " ". $this->prezime; 

	}
}