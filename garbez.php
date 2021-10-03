<?php

	require("Connection.php");
	require("Create.php");
	
	/*
	$sql = 'CREATE TABLE authen(
		id INT(10) AUTO_INCREMENT PRIMARY KEY,
		nameuser VARCHAR(50) NOT NULL,
		wordname VARCHAR(50) NOT NULL
	) ENGINE=MyISAM';
	
	Create::table(Connection::get_connection(), $sql);
	*/
	
	/*
	$sql = 'CREATE TABLE userinfo(
		ser INT(10) AUTO_INCREMENT PRIMARY KEY,
		id INT(10) NOT NULL,
		name VARCHAR(100) DEFAULT "",
		profession VARCHAR(100) DEFAULT "",
		address VARCHAR(100) DEFAULT "",
		email VARCHAR(100) DEFAULT "",
		mobile VARCHAR(100) DEFAULT "",
		img VARCHAR(10) DEFAULT ""
	) ENGINE=MyISAM';
	
	Create::table(Connection::get_connection(), $sql);
	*/
	
	/*
	$sql = 'CREATE TABLE testinfo(
		ser INT(10) AUTO_INCREMENT PRIMARY KEY,
		id INT(10) NOT NULL,
		testname VARCHAR(100) NOT NULL,
		score INT(10) NOT NULL
	) ENGINE=MyISAM';
	
	Create::table(Connection::get_connection(), $sql);
	*/
	
	/*
	$sql = 'CREATE TABLE questioninfo(
		ser INT(10) NOT NULL,
		questionno TEXT NOT NULL,
		answer TEXT NOT NULL
		
	) ENGINE=MyISAM';
	
	Create::table(Connection::get_connection(), $sql);
	*/
	
	
	
	
?>