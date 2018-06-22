<?php

require_once('request.php');

  $result = selectAllCities();

      foreach($result as  $row){
        
              $ville[] = array($row["city_name"]);
       

  }
            echo json_encode($ville);
            


  
?>