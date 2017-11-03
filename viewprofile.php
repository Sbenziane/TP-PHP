<?php
require 'index.php';
require ('function.php');
$id = $_GET['user'];
$ech = getUser($_GET['user']);
echo "<h1>Profil de ".$ech[0]."</h1>";
if ($ech[0]==$_SESSION['login'])
{
echo '<a href="membre.php">Modifier mon compte.</a><br>';
}
?>
<h3>Message</h3>
<?php echo $ech[2]; ?>