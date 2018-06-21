<?php

require_once('request.php');

// VERIF SI LA GEO EST OK //
if ((isset($_POST["long"])) && (isset($_POST["lat"]))){

    $longUser = $_POST["long"];
    $latUser = $_POST["lat"];

    // $_POST["selection"] = array("[0]","[1]","[2]");
}

if ($_POST["city"] != null){

    $ville= $_POST["city"];

    // var_dump($ville);
   
}


// JE TEST SI UNE VILLE A ETE ENTREE  ET SI OUI JE RENVOIE SES COORD //
if (isset($ville)){
    $villecible = cityTarget($ville);

    echo json_encode($villecible);

} 
// SI NON //

// Si Wifilib coché et a Proximité Coché //


else if ((in_array("wifilib", $_POST["selection"])) && (in_array("around", $_POST["selection"]))) {

    $result = loadProxiWifiPoints($longUser, $latUser);

    foreach( $result as  $row){
    

        $tags[] = array(
            'type' => 'Feature',
            'properties' => array(
                'Name'=> $row['wifilib_name'],
                "Addresse" => null,
                'website' => null,
                "tessellate" => -1, 
                "extrude" => 0, 
                "visibility" => -1,                
                "gx_media_links" => "https:\/\/lh5.googleusercontent.com\/proxy\/PwzaoEtpj9kY8ksmwgTK0mcQz7npvj7P1OwSZczMk91Q1eNBiYshL7fb5MR-7Q5vi7Jarb9VnPtSRabIgOpQRPWwcUGYk1rQ1s4_FetP8c-4sclEu4HjT0grwHuC-wH9TSdHGu3ShQ6J"
            ),
            'geometry' => array(
                'type' => "Point",
                'coordinates' => array(floatval(
                    $row['wifilib_long']),
                    floatval($row['wifilib_lat']),
                    floatval('0.0')
                )
            )
            
        );
        }
    
        echo json_encode($tags);

}
// Si non , Si juste wifilib est coché , LOURD A CHARGER  // 
    else if (in_array("wifilib", $_POST["selection"])){
        $result = loadAllWifiPoints();
    
        foreach($result as  $row){
        
    
            $tags[] = array(
                'type' => 'Feature',
                'properties' => array(
                    'Name'=> $row['wifilib_name'],  
                    "tessellate" => -1, 
                    "Addresse" => null,
                    'website' => null,
                    "extrude" => 0, 
                    "visibility" => -1,   
                    "gx_media_links" => "https:\/\/lh5.googleusercontent.com\/proxy\/PwzaoEtpj9kY8ksmwgTK0mcQz7npvj7P1OwSZczMk91Q1eNBiYshL7fb5MR-7Q5vi7Jarb9VnPtSRabIgOpQRPWwcUGYk1rQ1s4_FetP8c-4sclEu4HjT0grwHuC-wH9TSdHGu3ShQ6J"
                ),
                'geometry' => array(
                    'type' => "Point",
                    'coordinates' => array(floatval(
                        $row['wifilib_long']),
                        floatval($row['wifilib_lat']),
                        floatval('0.0')
                    )
                )
            );
            }
        
            echo json_encode($tags);
    
    }

    // Sinon so Coworking coché et a Proximité coché  //
       else if ((in_array("coworking", $_POST["selection"])) && (in_array("around", $_POST["selection"]))){
        
        $result = loadProxiCoworkSpots($longUser, $latUser);
    
        foreach($result as  $row){
        
            $tags[] = array(
                            'type' => 'Feature',
                            'properties' => array(
                                'Name'=> $row['spot_name'],
                                "altitudeMode" => null, 
                                "Addresse" => $row['spot_address'],
                                "cp" =>  $row['spot_postcode'],
                                "city" =>  $row['city'],
                                'website' => $row['spot_website'],  
                                "tessellate" => -1, 
                                "extrude" => 0, 
                                "visibility" => -1, 
                                "gx_media_links" => "https:\/\/lh5.googleusercontent.com\/proxy\/PwzaoEtpj9kY8ksmwgTK0mcQz7npvj7P1OwSZczMk91Q1eNBiYshL7fb5MR-7Q5vi7Jarb9VnPtSRabIgOpQRPWwcUGYk1rQ1s4_FetP8c-4sclEu4HjT0grwHuC-wH9TSdHGu3ShQ6J"
                            ),
                            'geometry' => array(
                                'type' => "Point",
                                'coordinates' => array(floatval(
                                    $row['spot_long']),
                                    floatval($row['spot_lat']),
                                    floatval('0.0')
                                )
                            )
                        );
                        
                    }
                    
                    echo json_encode($tags);
                    }

                    // Sinon si juste coworking est coché //
                     else if (in_array("coworking", $_POST["selection"])){
        
                        $result = loadAllCoworkSpots();
                    
                        foreach($result as  $row){
                        
                            $tags[] = array(
                                            'type' => 'Feature',
                                            'properties' => array(
                                                'Name'=> $row['spot_name'],
                                                "altitudeMode" => null, 
                                                "Addresse" => $row['spot_address'],
                                                "cp" =>  $row['spot_postcode'],
                                                "city" =>  $row['city'],
                                                'website' => $row['spot_website'],  
                                                "tessellate" => -1, 
                                                "extrude" => 0, 
                                                "visibility" => -1, 
                                                "gx_media_links" => "https:\/\/lh5.googleusercontent.com\/proxy\/PwzaoEtpj9kY8ksmwgTK0mcQz7npvj7P1OwSZczMk91Q1eNBiYshL7fb5MR-7Q5vi7Jarb9VnPtSRabIgOpQRPWwcUGYk1rQ1s4_FetP8c-4sclEu4HjT0grwHuC-wH9TSdHGu3ShQ6J"
                                            ),
                                            'geometry' => array(
                                                'type' => "Point",
                                                'coordinates' => array(floatval(
                                                    $row['spot_long']),
                                                    floatval($row['spot_lat']),
                                                    floatval('0.0')
                                                )
                                            )
                                        );
                                        
                                    }
                                    
                                    echo json_encode($tags);
                                    }
else {

    echo "wifilib pas coché";

}





