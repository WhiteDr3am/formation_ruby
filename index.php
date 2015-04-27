<?php

session_start();

include("config.php");

include "class/Session.class";
include "class/Person.class";
include "class/Animateur.class";
include "class/Eleves.class";
include "class/Centre.class";
include "class/Formation.class";

if(isset($_POST['formulaire']))
{
	$formulaire = $_POST['formulaire'];
	switch($formulaire)
	{
		case "add_eleve":
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mdp = $_POST['mdp'];
			new eleves($nom,$prenom,$mdp);
			break;
		case "add_animateur":
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$entreprise = $_POST['entreprise'];
			new animateur($nom,$prenom,$entreprise);
			break;
		case "add_formation":
			$titre = $_POST['titre'];
			$prix = $_POST['prix'];
			new formation($titre,$prix);
			break;
		case "add_centre":
			$lieu = $_POST['lieu'];
			$nom = $_POST['nom'];
			new centre($lieu,$nom);
			break;
	}
}

?>
<p><a href="index.php">index</a> - <a href="cree_session.php">cr&#233;er une session</a> - <a href="adesion.php">adesion</a></p>

<h1>add eleve</h1>
<form action="index.php" method="post">
	<input type="hidden" name="formulaire" value="add_eleve" />
	Nom : <input type="text" name="nom" /><br>
	Prenom : <input type="text" name="prenom" /><br>
	Mot de passe : <input type="text" name="mdp" /><br>
	<input type="submit" value="Envoyer">
</form>

<h1>add animateur</h1>
<form action="index.php" method="post">
	<input type="hidden" name="formulaire" value="add_animateur" />
	Nom : <input type="text" name="nom" /><br>
	Prenom : <input type="text" name="prenom" /><br>
	Entreprise : <input type="text" name="entreprise" /><br>
	<input type="submit" value="Envoyer">
</form>

<h1>add formation</h1>
<form action="index.php" method="post">
	<input type="hidden" name="formulaire" value="add_formation" />
	Titre : <input type="text" name="titre" /><br>
	Prix : <input type="text" name="prix" /><br>
	<input type="submit" value="Envoyer">
</form>

<h1>add centre</h1>
<form action="index.php" method="post">
	<input type="hidden" name="formulaire" value="add_centre" />
	Lieu : <input type="text" name="lieu" /><br>
	Nom : <input type="text" name="nom" /><br>
	<input type="submit" value="Envoyer">
</form>

