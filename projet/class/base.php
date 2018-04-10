<?php

class Base{
	function connexionBase(){
		
		try {
			return new PDO('mysql:dbname=site;host=localhost', 'megastriker', 'megastriker');
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
	}


}
?>