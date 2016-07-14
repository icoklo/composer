<?php // pazi na prazan prostor ili na novi red prije <?php oznake
namespace Config;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher as Dispatcher;
use Illuminate\Container\Container as Container;

	/* ne radi,
	public function spojiSeNaBazu(){
		$capsule = new Capsule;

		$capsule->addConnection([
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'icoklo',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_bin',
			'prefix'    => '',
			]);

		$capsule->setEventDispatcher(new Dispatcher(new Container));
		$capsule->bootEloquent();
	}*/

// Postavi podatke za bazu podataka

		// Database information
	$settings = array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'port'      => 3306,
		'database'  => 'icoklo',
		'username'  => 'root',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_bin',
		'prefix'    => '',
		);

		// Bootstrap Eloquent ORM

	//echo "baza";

	$container = new \Illuminate\Container\Container;
		// connFactory je potreban za povezivanje na bazu
	$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
		// conn je potreban za uspostavljanje veze prema bazi sa određenim postavkama
	$conn = $connFactory->make($settings);

		// $resolver je potreban za rješavanje veze prema bazi, moze se dobiti instanca veze prema bazi itd
	$resolver = new \Illuminate\Database\ConnectionResolver();
		// dodavanje veze u resolver
	$resolver->addConnection('default', $conn);
		// postavljanje defaultne veze prema bazi
	$resolver->setDefaultConnection('default');
		// postavlja se odgovarajuca instanca connection resolver-a
	\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);



