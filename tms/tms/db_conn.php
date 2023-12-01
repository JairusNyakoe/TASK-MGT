<?php
	define("DB_HOST", "127.0.0.1");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "tms");
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
    }
?>