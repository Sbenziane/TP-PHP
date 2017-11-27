
<?php
require ('configuration.php');
// on va recupere les données dans la table minichat, on les classe par ordre DESCendant dans une LIMITe de 10 entree(les 10 derniere vu que c ds un ordre DESC) dans la variable $Data
$data=mysql_query("SELECT id,login,message FROM membre ORDER BY ID DESC LIMIT 0, 100") or die(mysql_error()); // 
mysql_close(); //on ferme la connection MySql
// on passe en HTML 
?>
<table style="border:2px solid black;">
<tr>


<td style="background-color:#EEEEEE; border:2px solid black;">id</td><td style="background-color:#DDDDDD; border:2px solid black;">Pseudo</td><td style="background-color:#CCCCCC; border:2px solid black;">Message</td>
</tr>

<?php
// on repasse en php :)

while (false !== ($donnee = mysql_fetch_array($data))) // on fait une boucle (on va chercher dans la Variable $data et on les classe dans ARRAY de la variable $donnee
{
?>


<?php echo '<tr>'; echo '<td style="background-color:#EEEEEE; border:2px solid black;">'; echo htmlentities($donnee['id']); echo '</td>'; echo '<td style="background-color:#DDDDDD; border:2px solid black;"><a href="viewprofile.php?id='.htmlentities($donnee['id']).'">'; echo htmlentities($donnee['login']); echo '</a><td style="background-color:#CCCCCC; border:2px solid black;">';  echo htmlentities($donnee['message']); echo '</td>'; echo '</tr>'; // on affiche les donnees recuilli grace a un echo

}
?>
</td>
</table>
<br/>
