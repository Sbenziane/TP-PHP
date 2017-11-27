<?php
session_start();
if (!isset($_SESSION['login'])) {
	?>
	
	<html>
<head>
<title>Page vide - deconnecter</title>
</head>

<body>
Tu n'es pas connecter ^^<br>
<a href="connexion.php">connexion</a>
</body>
</html>
	<?php
	exit();
}
?>
<html>
<head>
<title>Page vide -connecter</title>
</head>

<body>
Tu es connecter ^^<br>
<a href="membre.php">Profil</a>
</body>
</html>