
<?php
require 'index.php';
require ('function.php');

// on passe en HTML 
?>
<table style="border:2px solid black;">
<tr>


<td style="background-color:#EEEEEE; border:2px solid black;">id</td><td style="background-color:#DDDDDD; border:2px solid black;">Pseudo</td><td style="background-color:#CCCCCC; border:2px solid black;">Message</td>
</tr>

<?php
// on repasse en php :)
	$fichier_csv = fopen($configuration['nomFichier'], 'r');
	// Fermeture du fichier csv

while ($utilisateurs = fgetcsv($fichier_csv,$configuration['delimiteur'])) // on fait une boucle (on va chercher dans la Variable $data et on les classe dans ARRAY de la variable $donnee
{
?>


<?php echo '<tr>'; echo '<td style="background-color:#EEEEEE; border:2px solid black;">'; echo htmlentities($utilisateurs[0]); echo '</td>';echo '<td style="background-color:#CCCCCC; border:2px solid black;">';  echo htmlentities($utilisateurs[2]); echo '</td>'; echo '</tr>'; // on affiche les donnees recuilli grace a un echo

}
fclose($fichier_csv);
?>
</td>
</table>
<br/>
