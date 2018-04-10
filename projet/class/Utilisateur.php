<?php
	class Utilisateur{
		private $nom;
		private $prenom;
		private $age;
		private $adressse;
	
		function __construct($nom, $prenom, $age, $adresse){
			require_once "base.php";
			if(!isset($_SESSION["existe"])){
				session_start();
				$_SESSION["existe"] = 1;
			}
			$this->baseCo = new Base();
			$this->base = $this->baseCo->connexionBase();
			if(!is_int((int)$age)){
				echo "l'age doit etre un entier";
				return;
			}
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->age = $age;
			$this->adresse = $adresse;
		}
		
		function inscription(){
			$write = $this->base->prepare("INSERT INTO compte(prenom, nom, age, adresse) VALUES(:prenom, :nom, :age, :adresse)");
			$write->execute(array("prenom" => $this->prenom, "nom" => $this->nom, "age" => $this->age, "adresse" => $this->adresse));
		}
		
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getAge(){
			return $this->age;
		}
		function getAdresse(){
			return $this->adresse;
		}

		function setNom($nom){
			$this->nom = $nom;
		}
		function setPrenom($prenom){
			 $this->prenom = $prenom;
		}
		function setAge($age){
			if(!is_int((int)$age)){
				echo "l'age doit etre un entier";
				return;
			}
			$this->age = $age;
		}
		function setAdresse(){
			$this->adresse = $adresse;
		}
		
		function initSession(){
			$base = $this->base;
			unset($this->base);
			$_SESSION["utilisateur"] = serialize($this);
			$this->base = $base;
		}
		
		static function lireSession(){
			if(!isset($_SESSION["existe"])){
				session_start();
				$_SESSION["existe"] = 1;
			}
			if(isset($_SESSION['utilisateur'])){
				return unserialize($_SESSION['utilisateur']);
			}else{
				echo "cette variable de session n'existe pas";
				return null;
			}
		}
		
		
	}

?>