<?php
	class User
	{
		static function connexionUser($data)
		{
			$erreurs = "";
			$user = null;
			foreach($data as $attribut => $valeur)
			{
				if(!empty($valeur))
				{
					if(Database::recupUserByAttribut($attribut,$data->mail))
					{
						$user = Database::recupUserByAttribut($attribut,$data->mail);
					}
					else
					{
						$erreurs[] = "Mail Eronne";
						return $erreurs;
					}
				}
				else if ($attribut == "pseudo")
				{
					if($user->pseudo != $valeur)
					{
						$erreurs[] = "Pseudo Erronne";
					}
				}
				else
				{
					if($user->mot_de_passe != $valeur)
					{
						$erreurs[] = "Eronne";
					}
				}
			}
				
			if(empty($erreurs))
			{
				return true;
			}
			else
			{
				return $erreurs;
			}
		}
	}
		