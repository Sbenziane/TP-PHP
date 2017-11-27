<?php

$configuration = require('configuration.php');
function inscription($login,$mdp,$message):bool
{
	if (strlen($login) > $configuration['nbCaractereLogin'])
	{
    echo "Nombre de caractère depassé";
	return false;
	}
	$lignes = array($login, sha1($mdp), $message);
	// Création du fichier csv (le fichier est vide pour le moment)
	$fichier_csv = fopen($configuration['nomFichier'], 'w+');

    // les problèmes d'affichage des caractères internationaux (les accents par exemple)
	fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

	fputcsv($fichier_csv, $lignes, $configuration['delimiteur']);
    fclose($fichier_csv);
	return true;
}

function verifLogin($utilisateur):bool
{
	$login_existant = 0;
	// Création du fichier csv (le fichier est vide pour le moment)
	$fichier_csv = fopen($configuration['nomFichier'], 'r');
    while ($utilisateur = fgetcsv($fichier_csv,$configuration['delimiteur']))
		{
			if($utilisateur[0]== $utilisateur)
			{
				$login_existant = 1;
			}	
		}
	// Fermeture du fichier csv
	fclose($fichier_csv);
	if ($login_existant = 1)
	{
		return true;
	}else{
		return false;
		 }
}

function verifMdp($champs,$login):bool
{
	$mdp_correct = 0;
	// Création du fichier csv (le fichier est vide pour le moment)
	$fichier_csv = fopen($configuration['nomFichier'], 'r');
    while ($utilisateur = fgetcsv($fichier_csv,$configuration['delimiteur']))
		{
			if($utilisateur[0]== $login)
			{
				if (sha1($champs) == $utilisateur[1])
				{
					$mdp_correct = 1;
				}
			}	
		}
	// Fermeture du fichier csv
	fclose($fichier_csv);
	if ($mdp_correct = 1)
	{
		return true;
	}else{
		return false;
		 }
}

function getUser($login)
{
	$user;
	// Création du fichier csv (le fichier est vide pour le moment)
	$fichier_csv = fopen($configuration['nomFichier'], 'r');
    while ($utilisateur = fgetcsv($fichier_csv,$delimiteur))
		{
			if($utilisateur[0]== $login)
			{
			$user = array($utilisateur[0],$utilisateur[2]);
			}	
		}
	// Fermeture du fichier csv
	fclose($fichier_csv);
	return $user;
}

?>