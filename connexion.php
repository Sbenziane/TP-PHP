<?php
require ('function.php');
$login = "";
$mdp = "";
if (isset($_POST['connexion'])) 
{

	if ((isset($_POST['login']) && isset($_POST['mdp']))) 
	    {
			$login = $_POST['login'];
			$mdp = $_POST['mdp'];
			if (verifLogin($login))
			{
				if (verifMdp($mdp,$login))
				{
			session_start();
			$_SESSION['login'] = $login;
			$_SESSION['message'] = $message;
			setcookie("cahce-conect", $_SESSION['login'], time()+36000); 
			header('Location: membre.php');
			exit();
				}else
					{
				$erreur = 'Mot de passe non valide';	
					}
			}else{
				$erreur = 'Compte non reconnu.';
				 }
		}
		
}
?>
Connexion à l'espace membre :<br />
<i>15 Caractère max.</i>
<form action="connexion.php" method="post">
Login : <input type="text" maxlength="<?php echo $nbCaractereLogin;?>" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Mot de passe : <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>"><br />

<input type="submit" name="connexion" value="Connexion">
</form>
<a href="inscription.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
