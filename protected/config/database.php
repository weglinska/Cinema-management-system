<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	/*
	'connectionString' => 'mysql:host=localhost;dbname=testdrive',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	*/
        
        
	'connectionString' => 'pgsql:host=localhost;port=5432;dbname=kino',
	'emulatePrepare' => true,
	'username' => 'postgres',
	'password' => 'root',
	'charset' => 'utf8',
	
);