<?php
session_start();

include("config.php");

include "class/Session.class";
include "class/Person.class";
include "class/Animateur.class";
include "class/Eleves.class";
include "class/Centre.class";
include "class/Formation.class";

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mdp"]))
{
	$eleve = new eleves();
	$tab = $eleve->connexion($_POST["nom"],$_POST["prenom"],$_POST["mdp"]);
	if(count($tab)!=0)
	{
		// la ligne existe on cré les sessions
		$_SESSION["logged"]=true;
		$_SESSION["eleve"] = $tab["objet"];
	}
	else
	{
		
	}
}

?>

<p><a href="index.php">index</a> - <a href="cree_session.php">cr&#233;er une session</a> - <a href="adesion.php">adesion</a></p>

<?php


if(!isset($_SESSION["logged"]))
{
	?>
	<form method="post" action="adesion.php">
		<label for="nom">Nom : </label>
		<input type="nom" id="nom" name="nom" /><br>
		<label for="prenom">Prenom : </label>
		<input type="text" id="prenom" name="prenom" /><br>
		<label for="mdp">Mot de passe : </label>
		<input type="password" id="mdp" name="mdp" /><br>
		<input type="submit" value="Se connecter" />
	</form>
	<?php
}

?>