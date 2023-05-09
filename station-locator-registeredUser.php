<?php 
    session_start();
    include_once 'header-registeredUser.php';

    if (isset($_SESSION["success_message"])) {
        echo "<div class='success container alert alert-success' role='alert'>" . $_SESSION["success_message"] . "</div>";
        unset($_SESSION["success_message"]);
    }
    
    if (isset($_SESSION["error_message"])) {
        echo "<div class='error container alert alert-danger' role='alert'>" . $_SESSION["error_message"] . "</div>";
        unset($_SESSION["error_message"]);
    }
?>

<div class="container">
    <div class="card col-5">
    <div class="card-body">
    <form action="station-locator-registeredUser.php" method="post">
                <div class="form-group mt-2">
                    <label for="city">Enter a City:</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="City" />
                </div>
                <div class="form-group mt-2">
                    <label for="state">Select a State:</label>
                    <select name="state" id="state">
                        <?php 
                        $states = array(
                            "Select option",
                            "Alabama"=>"AL",
                            "Alaska"=>"AK",
                            "Arizona"=>"AZ",
                            "Arkansas"=>"AR",
                            "California"=>"CA",
                            "Colorado"=>"CO",
                            "Connecticut"=>"CT",
                            "Delaware"=>"DE",
                            "Florida"=>"FL",
                            "Georgia"=>"GA",
                            "Hawaii"=>"HI",
                            "Idaho"=>"ID",
                            "Illinois"=>"IL",
                            "Indiana"=>"IN",
                            "Iowa"=>"IA",
                            "Kansas"=>"KS",
                            "Kentucky"=>"KY",
                            "Louisiana"=>"LA",
                            "Maine"=>"ME",
                            "Maryland"=>"MD",
                            "Massachusetts"=>"MA",
                            "Michigan"=>"MI",
                            "Minnesota"=>"MN",
                            "Mississippi"=>"MS",
                            "Missouri"=>"MO",
                            "Montana"=>"MT",
                            "Nebraska"=>"NE",
                            "Nevada"=>"NV",
                            "New Hampshire"=>"NH",
                            "New Jersey"=>"NJ",
                            "New Mexico"=>"NM",
                            "New York"=>"NY",
                            "North Carolina"=>"NC",
                            "North Dakota"=>"ND",
                            "Ohio"=>"OH",
                            "Oklahoma"=>"OK",
                            "Oregon"=>"OR",
                            "Pennsylvania"=>"PA",
                            "Rhode Island"=>"RI",
                            "South Carolina"=>"SC",
                            "South Dakota"=>"SD",
                            "Tennessee"=>"TN",
                            "Texas"=>"TX",
                            "Utah"=>"UT",
                            "Vermont"=>"VT",
                            "Virginia"=>"VA",
                            "Washington"=>"WA",
                            "West Virginia"=>"WV",
                            "Wisconsin"=>"WI",
                            "Wyoming"=>"WY"
                        );
                        foreach($states as $abbr => $state) {
                            echo "<option value=\"$abbr\">$state</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="zipcode">Enter a Zipcode </label>
                    <input type="number" name="zipcode" id="zipcode">
                </div>
            <button class="btn btn-success" type="submit">Search</button>
    </form>
    </div>
    </div>
<div class="pt-3"> 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Station Name</th>
      <th scope="col">Address</th>
      <th scope="col">EV Network</th>
      <th scope="col">Connector Types</th>
      <th scope="col">Distance</th>
      <th scope="col">Directions</th>
      <th scope="col">More Info</th>
    </tr>
  </thead>
        <?php 
                    $url = 'https://developer.nrel.gov/api/alt-fuel-stations/v1/nearest.json';

                    if(isset($_POST['zipcode']) || isset($_POST['city']) || isset($_POST['state'])){
                        $zipcode =isset($_POST['zipcode']) ? $_POST['zipcode'] : "";
                        $city =isset($_POST['city']) ? $_POST['city'] : "";
                        $state = isset($_POST['state']) ? $_POST['state'] : "";
                        $location = "";

                        if(!empty($zipcode)){
                            if(strlen($zipcode) == 5 && is_numeric($zipcode)){
                                $location = $zipcode;
                            }
                            else {
                                echo "Please enter a valid 5-digit Zipcode";
                                exit;
                            }
                        }
                        else if(!empty($city) && !empty($state)){
                            $location = urlencode($city . "," . $state);
                        } else {
                            echo "Please enter a valid Zipcode or City & State";
                            exit;
                        }
                    
                    $params = array(
                        'api_key' => 'w0Gs0EehnhpFgQ6aUZRAav4ph1rmdOtZQ54BnnHZ',
                        'location' => $location,
                        'fuel_type' => 'ELEC',
                        'access' => 'public',
                        'ev_network' => 'all'
                    );
                    
                    $query_string = http_build_query($params);
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url . '?' . $query_string);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    $response = curl_exec($ch);
                    curl_close($ch);
                    
                    $data = json_decode($response);

                    if(empty($data->fuel_stations)){
                        echo "There are no stations available in the area specified, please try again.";
                        exit;
                    }

                    $lat = $data->fuel_stations[0]->latitude;
                    $lng = $data->fuel_stations[0]->longitude;
                    $maps_url = "https://www.google.com/maps/embed/v1/place?key=AIzaSyA9r__E54NHBxH-npBy9GU2hfxBv0eOKko&q=$lat,$lng";

                    echo "<iframe width='100%' height='400' frameborder='0' style='border:0' id='map' src='$maps_url' allowfullscreen></iframe>";
                    
                    echo '<tbody>';
                    foreach($data->fuel_stations as $station){
                        echo '<tr>';
                        echo '<td>' . $station->station_name.'</td>';
                        echo '<td>' . $station->street_address. ', ' . $station->city . ', '. $station->state .'</td>';
                        echo '<td>' . $station->ev_network.'</td>';
                        echo '<td class="text-wrap">' . implode(', ',$station->ev_connector_types) . '</td>';
                        echo '<td>' . $station->distance.' mi</td>';
                        echo '<td><a href="https://www.google.com/maps/dir/?api=1&destination='. urlencode($station->latitude . ',' . $station->longitude) .'&travelmode=driving" target="_blank">Get Directions</a></td>';
                        echo '<td class="dropdown">
                        <button class="btn btn-info" type="button" dropdown-toggle data-bs-toggle="dropdown" '.$station->id.'">View Details
                        <ul class="dropdown-menu">
                        <li><p class="dropdown-item text-wrap"><strong>Station Hours:</strong> '.$station->access_detail_code .'</p></li>
                        <li><p class="dropdown-item text-wrap"><strong>Charging Rates:</strong> '.$station->ev_pricing .'</p></li>
                        <li><p class="dropdown-item text-wrap"><strong>Payment Card Options:</strong> '.$station->cards_accepted.'</p></li>
                        <li><p class="dropdown-item text-wrap"><strong>Facility Type:</strong> '.$station->facility_type.'</p></li>
                        </ul>
                        </button></td>';
                        echo '<td> <form method="POST" action="add-to-favorites.php">
                        <input type="hidden" name="station_id" value="'. $station->id.'">
                        <input type="hidden" name="station_name" value="'.$station->station_name.'">
                        <button type="submit">Add to favorites</button>
                        </form>
                        </td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';

                    

                    echo '<script>';
                    echo 'var lat = ' . $lat . ';';
                    echo 'var lng = ' . $lng . ';';
                    echo 'var data = ' . json_encode($data->fuel_stations) . ';';
                    echo '</script>';
                } 
        ?>
</table>


<script>
    function initMap() {
        console.log();
        var centerLatLng = {lat: lat, lng: lng};

        var map = new google.maps.Map(document.getElementById('map'), {
            center: centerLatLng,
            zoom: 10
        });

        data.foreach(function(station){ 
            var markerLatLng = {lat:parseFloat(station.latitude), lng:parseFloat(station.longitude)};
            var marker = new google.maps.Marker({
                position: markerLatLng,
                map: map,
                title: station.station_name
            });
        });
    }
</script>
</div>
</div>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9r__E54NHBxH-npBy9GU2hfxBv0eOKko&callback=initMap"></script>


<?php 
    include_once 'footer.php'
?>