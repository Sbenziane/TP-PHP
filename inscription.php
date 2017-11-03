
<?php
// Créer une nouvelle session ou recupère la session éxistante
session_start();
if (!isset($_SESSION['login'])) {
require 'index.php';
require 'function.php';
$login = "";
$mdp = "";
$message = "";
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['mdp_confirm']) && isset($_POST['message']))) 
	{
		// on teste les deux mots de passe
		if ($_POST['mdp'] != $_POST['mdp_confirm']) 
		{
			$erreur = 'Les deux mots de passe sont différents.';
		}
		else 
		{
		inscription($login,$mdp,$message);
		}
	}


?>
Inscription à l'espace membre :<br />
<form action="inscription.php" method="post">
Login : <i>15 Caractère max.</i><br /><input type="text" name="login" maxlength="<?php echo $nbCaractereLogin; ?>"  value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"> <br />
Mot de passe : <br /><input type="password" name="mdp" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
Confirmation du mot de passe :<br /> <input type="password" name="mdp_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
Message a afficher dans la liste des membre : <br /><input type="text" name="message"><br>

<input type="submit" name="inscription" value="Inscription"><br>
</form>
<?php
if (isset($erreur))
{	echo '<br />',$erreur;
	exit();
}

}
?>

