<?php 
    include_once 'header.php';
?>


<div class="container">
    <div class="card col-5">
    <div class="card-body">
    <form action="station-locator.php" method="post">
        <label for="zipcode">Enter a Zipcode </label>
        <input type="number" name="zipcode" id="zipcode" required>
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
    </tr>
  </thead>
        <?php 
                    $url = 'https://developer.nrel.gov/api/alt-fuel-stations/v1/nearest.json';

                    if(isset($_POST['zipcode'])){
                        $zipcode = $_POST['zipcode'];
                    
                    $params = array(
                        'api_key' => 'w0Gs0EehnhpFgQ6aUZRAav4ph1rmdOtZQ54BnnHZ',
                        'location' => $zipcode,
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