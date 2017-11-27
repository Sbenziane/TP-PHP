<?php
session_start();
if (!isset($_SESSION['login'])) 
{
	header('location:connexion.php');		
	exit();
}
require 'index.php';
echo 'Bonjour '.$_SESSION['login'].'!';
?>
