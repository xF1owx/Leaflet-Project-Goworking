<?php

require_once('bdd.php');

// Chargerment des espaces de coworking à proximité //
function loadProxiCoworkSpots($longUser, $latUser){

    $filtrelongUserMax = ($longUser + 0.26000);
    $filtrelongUserMin = ($longUser - 0.26000);

    $filtrelatUserMax = ($latUser + 0.26000);
    $filtrelatUserMin = ($latUser - 0.26000);

    

    global $bdd;
    $response=$bdd->prepare("SELECT * FROM `SPOTS` WHERE spot_lat > (:filtrelatUserMin) and spot_long > (:filtrelongUserMin) and spot_long < (:filtrelongUserMax) and spot_lat < (:filtrelatUserMax)");
    $response->bindParam(":filtrelatUserMin", $filtrelatUserMin, PDO::PARAM_INT);
    $response->bindParam(":filtrelongUserMin", $filtrelongUserMin , PDO::PARAM_INT);
    $response->bindParam(":filtrelongUserMax", $filtrelongUserMax, PDO::PARAM_INT);
    $response->bindParam(":filtrelatUserMax", $filtrelatUserMax, PDO::PARAM_INT);
    $response->execute();
    $result=$response->fetchAll(PDO::FETCH_ASSOC);
   
    
     return $result;
     
}

// Chargerment de tout les espaces de coworking //
function loadAllCoworkSpots(){
    

    global $bdd;
    $response=$bdd->prepare("SELECT * FROM `SPOTS`");
    $response->execute();
    $result=$response->fetchAll(PDO::FETCH_ASSOC);
    
    
     return $result;
     
}

// Chargement de tout les wifilib //
function loadAllWifiPoints(){
    

    global $bdd;
    $response=$bdd->prepare("SELECT * FROM `WIFILIBS`");
    $response->execute();
    $result=$response->fetchAll(PDO::FETCH_ASSOC);
     return $result;
     
}

// Chargerment des wifilib  à proximité //
function loadProxiWifiPoints($longUser, $latUser){

    $filtrelongUserMax = ($longUser + 0.26000);
    $filtrelongUserMin = ($longUser - 0.26000);

    $filtrelatUserMax = ($latUser + 0.26000);
    $filtrelatUserMin = ($latUser - 0.26000);

    global $bdd;
    $response=$bdd->prepare("SELECT * FROM `WIFILIBS` WHERE wifilib_lat > (:filtrelatUserMin) and wifilib_long > (:filtrelongUserMin) and wifilib_long < (:filtrelongUserMax) and wifilib_lat < (:filtrelatUserMax)");
    $response->bindParam(":filtrelatUserMin", $filtrelatUserMin, PDO::PARAM_INT);
    $response->bindParam(":filtrelongUserMin", $filtrelongUserMin , PDO::PARAM_INT);
    $response->bindParam(":filtrelongUserMax", $filtrelongUserMax, PDO::PARAM_INT);
    $response->bindParam(":filtrelatUserMax", $filtrelatUserMax, PDO::PARAM_INT);
    $response->execute();
    $filtered=$response->fetchAll(PDO::FETCH_ASSOC);


    return $filtered;
     
}

// Charger tout //
function loadAll(){
    

    global $bdd;
    $response=$bdd->prepare("SELECT * FROM `SPOTS`,`WIFILIBS`");
    $response->execute();
    $result=$response->fetchAll(PDO::FETCH_ASSOC);
    
    
     return $result;
     
}

// Ciblage d'une ville en particulier //
function cityTarget($ville){

    global $bdd;
    $response=$bdd->prepare("SELECT `city_lat`,`city_long` FROM `CITY_LIST` WHERE `city_name` = (:ville)");
    $response->bindParam(":ville", $ville, PDO::PARAM_INT);
    $response->execute();
    $citycenter=$response->fetchAll(PDO::FETCH_ASSOC);
    
    
     return $citycenter;


}

// Chargement de tout la liste des villes pour vue.js //
function selectAllCities(){

    global $bdd;
    $response=$bdd->prepare("SELECT `city_name` FROM `CITY_LIST`");
    $response->execute();
    $result=$response->fetchAll(PDO::FETCH_ASSOC);
    
    
     return $result;
}



