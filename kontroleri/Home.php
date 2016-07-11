<?php

class Home{

	public function __construct()
	{

	}

	public function funkcija(){
		echo "<h2> Naziv klase: ".__CLASS__."</h2>";
		echo "<h2> Naziv funkcije: ".__FUNCTION__."</h2>"; 
	}


}