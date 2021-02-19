<?php
	class database{
		//définition des variables static du serveur,l'utilisateur,le mot de passe, le nom de la base de donnée et la connexion au serveur.
		static $serveur="localhost";
		static $user="root";
		static $pass="alleria666";
		static $dbname="users";
		static $dbco;
		
		//Fonction statique de connexion au serveur si elle n'est pas déja faite
		static function connexionServeur()
		{
			if(self::$dbco==NULL){
				self::$dbco=new PDO('mysql:host='.self::$serveur.';dbname='.self::$dbname,self::$user,self::$pass);
			}
		}
		
		//TODO Fonction pour se connecter au site 
		static function getUtilisateur($Mail)
		{	
			self::connexionServeur();
			
			//Commande Qui selectionne mail et password dans la table users quand mail et password de la base de donnéee sont égals au mail et password du formulaire.
			$sql='SELECT DISTINCT Mail,Password, Pseudo
				  FROM `users`
				  WHERE Mail=:Mail;';
			$data= self::$dbco->prepare($sql);
			$data->bindvalue(":Mail",$Mail);
			
			$data->execute();
			$connexion=$data->fetch(PDO::FETCH_OBJ);
			return $connexion;
		}
		
		static function connexionSite($v2, $v1) {
			self::connexionServeur();
			
			$comparatifUser = self::getUtilisateur($v1);
			print_r($comparatifUser);
			if (!empty($comparatifUser)) {
			if ( $comparatifUser->Mail == $v2['Mail'] AND $comparatifUser->Password == $v2['MDP']) {
			 echo "Bonjour " . $comparatifUser->Pseudo ;
			}	
			}
				
			if (empty($comparatifUser)) {
				echo "Utilisateur inexistant";
			}
			
			
		}
		
	}
			
		
		
	