<?php

class Base{
	public function connexionBase(){
		
		try {
			return new PDO('mysql:dbname=sitelivre;host=localhost', 'root', 'root');
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
	}


}
?>