<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>

    <link rel="stylesheet" href="style.css" />

    <title>Document</title>


</head>


<body>

<form id="form" method="post" action="">

    <p>

     <p> Etape 1: Dans quelle ville ? </p>
     <label for="cityfind">Recherche par Ville</label>
        <input id="cityfind" type="text"> </br>

        <p id="que"></p>
        <input type="submit" name="filtered" value="Go"></br>
        


        <input id="long" type="hidden" name="long">   
        <input id="lat" type="hidden" name="lat">    </br> 
      
        <p>Etape 2 : Que recherchez-vous ? </p>

        <label for="choix[wifi]">Wifilib</label>
        <input id="choix[wifi]"  name="selection[]" class="selection" type="radio" value="wifilib" ></br> 

        <label for="choix[cowork]">Cowork</label>
        <input id="choix[cowork]" name="selection[]" class="selection" type="radio" value="coworking" ></br> 

        <p id="error"></p>

        <label for="choix[around]">Alentours 25 Km</label>
        <input id="choix[around]" name="selection[]" class="selection" type="checkbox" value="around" ></br> 


       
        <input type="submit" name="filtered" value="Go">
       
    </p>

</form>





        
    
 





<div id="map"></div>

 <input type="button" id="recentrer" name="userpos" value="Recentrer"></br>





<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
   integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
   crossorigin=""></script>

<script type="text/javascript" src="app.js"></script>


</body>
</html>

