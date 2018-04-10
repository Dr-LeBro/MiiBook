<?php
	class Livre{
		private $titre;
		private $auteur;
		private $editeur;
		
		public function __construct($titre, $auteur, $editeur,$prix){
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
			$this->prix = $prix;
		}
		
		public function ajout(){
			$write = $this->base->prepare("INSERT INTO book(titre, auteur, editeur, prix) VALUES(:titre, :auteur, :editeur, :prix)");
			$write->execute(array("titre" => $this->titre, "auteur" => $this->auteur, "editeur" => $this->editeur, "prix" => $this->prix));
		}
		
		public function getTitre(){
			return $this->titre;
		}
		
		public function getAuteur(){
			return $this->auteur;
		}
		
		public function getEditeur(){
			return $this->editeur;
		}
	
		public function setTitre($titre){
			$this->titre = $titre;
		}
		
		public function setAuteur($auteur){
			 $this->auteur = $auteur;
		}
		
		public function setEditeur($editeur){
			$this->editeur = $editeur;
		}
		
		public function getPrix()
		{
			return $this->prix;
		}

		public function setPrix($prix)
		{
			 $this->prix=$prix;
		}

		public function initCookie(){
			setcookie("livre", serialize($this), time()+3600*24*30, 0);
		}
		
		static function lireCookie(){
			if(isset($_COOKIE['livre'])){
				return unserialize($_COOKIE['livre']);
			}else{
				echo "ce cookie n'existe pas";
			}
		}

		public function initSession(){
			$_SESSION["livre"] = $this;
		}
		
		public static function lireSession(){
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