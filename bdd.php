<?php

try{
  
    $bdd=new PDO('mysql:host=localhost;dbname=goworkin_bdd;charset=utf8','admin','online@2017');
}
catch(Exeption $e)
{      
	die('Erreur:'.$e->getMessage());
}
    