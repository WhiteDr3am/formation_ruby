<?php
include("config.php");

include "class/Session.class";
include "class/Person.class";
include "class/Animateur.class";
include "class/Eleves.class";
include "class/Centre.class";
include "class/Formation.class";

$c = new centre();
$c->getListeCentreByIdFormation(1);

// on fait des tests avec github

?>