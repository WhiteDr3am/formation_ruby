<?php

// c'est trop drôle des test github

include("config.php");

/*** Création des tables ***/

$crea_table[] = "CREATE TABLE personne
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL
)";

$crea_table[]  = "CREATE TABLE eleve
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_personne INT NOT NULL,
	mdp VARCHAR(255)
)";

$crea_table[]  = "CREATE TABLE animateur
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_personne INT NOT NULL,
	entreprise VARCHAR(255)
)";

$crea_table[]  = "CREATE TABLE formation
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    prix FLOAT NOT NULL
	
)";

$crea_table[]  = "CREATE TABLE centre
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lieu VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL
)";

$crea_table[]  = "CREATE TABLE session
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_form INT NOT NULL,
	id_centre INT NOT NULL,
	id_anim INT NOT NULL,
    date DATE NOT NULL,
    description TEXT NOT NULL
)";

$crea_table[]  = "CREATE TABLE E_S
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_eleve INT NOT NULL,
	id_session INT NOT NULL
)";

$crea_table[]  = "CREATE TABLE F_C
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_form INT NOT NULL,
	id_centre INT NOT NULL
)";

$contraint[] = "ALTER TABLE eleve
	ADD FOREIGN KEY (id_personne)
	REFERENCES personne(id)";
	
$contraint[] = "ALTER TABLE animateur
	ADD FOREIGN KEY (id_personne)
	REFERENCES personne(id)";

$contraint[] = "ALTER TABLE session
	ADD FOREIGN KEY (id_form)
	REFERENCES formation(id)";

$contraint[] = "ALTER TABLE session
	ADD FOREIGN KEY (id_centre)
	REFERENCES centre(id)";

$contraint[] = "ALTER TABLE session
	ADD FOREIGN KEY (id_anim)
	REFERENCES animateur(id)";

$contraint[] = "ALTER TABLE E_S
	ADD FOREIGN KEY (id_eleve)
	REFERENCES eleve(id)";

$contraint[] = "ALTER TABLE E_S
	ADD FOREIGN KEY (id_session)
	REFERENCES session(id)";

$contraint[] = "ALTER TABLE F_C
	ADD FOREIGN KEY (id_centre)
	REFERENCES centre(id)";

$contraint[] = "ALTER TABLE F_C
	ADD FOREIGN KEY (id_form)
	REFERENCES formation(id)";


	
try {
    $dbh = new PDO('mysql:host=' . HOST . ';dbname=' . BDD, PSEUDO_BDD, MDP_BDD);
    foreach($crea_table as $row) {
        $dbh->exec($row);
    }
	foreach($contraint as $row) {
        $dbh->exec($row);
    }
    $dbh = null;
	echo "La BDD a été généré avec succes";
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>