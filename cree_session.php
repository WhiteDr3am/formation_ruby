<?php
session_start();
?>

<p><a href="index.php">index</a> - <a href="cree_session.php">cr&#233;er une session</a> - <a href="adesion.php">adesion</a></p>

<?php
include("config.php");

include "class/Session.class";
include "class/Person.class";
include "class/Animateur.class";
include "class/Eleves.class";
include "class/Centre.class";
include "class/Formation.class";


$f = new formation();
$tab_formation = $f->lister_formation();
$c = new centre();
$tab_centre = $c->getListeCentre();
$a = new animateur();
$tab_anim = $a->getListeAnim();

if(isset($_POST["formulaire"]))
{
	$formulaire = $_POST["formulaire"];
	switch($formulaire)
	{
		case "add_forma_centre":
			$forma = new formation();
			$forma->addFC($_POST["forma"],$_POST["centre"]);
			break;
			
		case "add_session":
			$sess = new session();
			$sess->addSession($_POST["forma"],$_POST["centre"],$_POST["anim"],$_POST["date_debut"],$_POST["descr"]);
			break;
	}
}
?>

<h1>ajout d'une formation a un centre</h1>
<form action="cree_session.php" method="post">
	<input type="hidden" name="formulaire" value="add_forma_centre" />
	<label for="formation">Selectionner une formation : </label>
	<select name="forma" id="formation">
		<?php
		foreach($tab_formation as $k=>$v)
		{
			echo "<option value='" . $v->getId() . "'>" . $v->getTitre() . "</option>\n";
		}
		?>
	</select><br>
	<label for="centre">Selectionner un Centre : </label>
	<select name="centre" id="centre">
		<?php
		foreach($tab_centre as $k=>$v)
		{
			echo "<option value='" . $v->getId() . "'>" . $v->getNom() . "</option>\n";
		}
		?>
	</select><br>
	<input type="submit" value="Envoyer">
</form>

<h1>cree une session</h1>
<form action="cree_session.php" method="post">
	<input type="hidden" name="formulaire" value="add_session" />
	<label for="formation">Selectionner une formation : </label>
	<select name="forma" id="formation">
		<?php
		foreach($tab_formation as $k=>$v)
		{
			echo "<option value='" . $v->getId() . "'>" . $v->getTitre() . "</option>\n";
		}
		?>
	</select><br>
	<label for="centre">Selectionner un Centre : </label>
	<select name="centre" id="centre">
		<?php
		foreach($tab_centre as $k=>$v)
		{
			echo "<option value='" . $v->getId() . "'>" . $v->getNom() . "</option>\n";
		}
		?>
	</select><br>
	<label for="anim">Selectionner un animateur : </label>
	<select name="anim" id="anim">
		<?php
		foreach($tab_anim as $k=>$v)
		{
			echo "<option value='" . $v->getId() . "'>" . $v->getNom() . " | " . $v->getPrenom() . "</option>\n";
		}
		?>
	</select><br>
	<label for="date_debut">Entrer la date de debut de session (AAAA-MM-JJ): </label>
	<input type="date" name="date_debut" id="date_debut" /><br>
	<label for="descr">Description de la formation : </label>
	<textarea rows="4" cols="25" name="descr" id="descr">
	</textarea><br>
	
	<input type="submit" value="Envoyer">
</form>
