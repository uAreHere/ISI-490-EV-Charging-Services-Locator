<?php 
    include_once 'header.php';
?>


<div class="container">
    <form action="station-locator.php" method="post">
        <label for="zipcode">Enter a Zipcode: </label>
        <input type="number" name="zipcode" id="zipcode">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Station Name</th>
      <th scope="col">Address</th>
      <th scope="col">EV Network</th>
      <th scope="col">Connector Types</th>
      <th scope="col">Distance</th>
    </tr>
  </thead>
  <tbody>
        <?php 
                    $url = 'https://developer.nrel.gov/api/alt-fuel-stations/v1/nearest.json';

                    if(isset($_POST['zipcode'])){
                        $zipcode = $_POST['zipcode'];
                    
                    // set the query string parameters
                    $params = array(
                        'api_key' => 'w0Gs0EehnhpFgQ6aUZRAav4ph1rmdOtZQ54BnnHZ',
                        'location' => $zipcode,
                        'fuel_type' => 'ELEC',
                        'access' => 'public',
                        'ev_network' => 'all'
                    );
                    
                    // build the query string
                    $query_string = http_build_query($params);
                    
                    // create a cURL handle
                    $ch = curl_init();
                    
                    // set the cURL options
                    curl_setopt($ch, CURLOPT_URL, $url . '?' . $query_string);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    // execute the request and store the response
                    $response = curl_exec($ch);
                    
                    // close the cURL handle
                    curl_close($ch);
                    
                    // process the response (e.g. parse the JSON data)
                    $data = json_decode($response);
    
                    foreach($data->fuel_stations as $station){
                        echo '<tr>';
                        echo '<td>' . $station->station_name.'</td>';
                        echo '<td>' . $station->street_address.'</td>';
                        echo '<td>' . $station->ev_network.'</td>';
                        echo '<td class="text-wrap">' . implode(', ',$station->ev_connector_types) . '</td>';
                        echo '<td>' . $station->distance.'</td>';
                        echo '</tr>';
                    }
                }
        ?>
  </tbody>
</table>
</div>



<?php 
    include_once 'footer.php'
?>