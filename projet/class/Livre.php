<?php
	class Livre{
		private $titre;
		private $auteur;
		private $editeur;
		
		function __construct($titre, $auteur, $editeur){
			require_once "base.php";
			if(!isset($_SESSION["existe"])){
				session_start();
				$_SESSION["existe"] = 1;
			}
			$this->baseCo = new Base();
			$this->base = $this->baseCo->connexionBase();
			$this->titre = $titre;
			$this->auteur = $auteur;
			$this->editeur = $editeur;
		}
		
		function inscription(){
			$write = $this->base->prepare("INSERT INTO livre(titre, auteur, editeur) VALUES(:titre, :auteur, :editeur)");
			$write->execute(array("titre" => $this->titre, "auteur" => $this->auteur, "editeur" => $this->editeur));
		}
		
		function getTitre(){
			return $this->titre;
		}
		function getAuteur(){
			return $this->auteur;
		}
		function getEditeur(){
			return $this->editeur;
		}
	
		function setTitre($titre){
			$this->titre = $titre;
		}
		function setAuteur($auteur){
			 $this->auteur = $auteur;
		}
		function setEditeur($editeur){
			$this->editeur = $editeur;
		}
		
		function initCookie(){
			setcookie("livre", serialize($this), time()+3600*24*30, 0);
		}
		
		static function lireCookie(){
			if(isset($_COOKIE['livre'])){
				return unserialize($_COOKIE['livre']);
			}else{
				echo "ce cookie n'existe pas";
			}
		}

		function initSession(){
			$_SESSION["livre"] = $this;
		}
		
		static function lireSession(){
			if(!isset($_SESSION["existe"])){
				session_start();
				$_SESSION["existe"] = 1;
			}
			if(isset($_SESSION['livre'])){
				return $_SESSION['livre'];
			}else{
				echo "cette variable de session n'existe pas";
			}
		}
		
	}

?>