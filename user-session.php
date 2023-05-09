<?php
    session_start();

    #print_r($_SESSION);

    if (isset($_SESSION["usersId"])) {
        $mysqli = require __DIR__ . "/db-connection.php";

        $sql = "SELECT * FROM users WHERE usersId = {$_SESSION["usersId"]}";

        $result = $mysqli->query($sql);
        $user= $result->fetch_assoc();
    }

    include "header-registeredUser.php";
?>

<div class="container">
    <h2>Welcome <?= htmlspecialchars($user["username"])?></h2>
    <h3>Here Are Your Favorites</h3>
    <?php

if (isset($_SESSION["usersId"])) {
    $mysqli = require __DIR__ . "/db-connection.php";

    $sql = "SELECT stationID FROM userfavorites WHERE userID = {$_SESSION["usersId"]}";

    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $stationID = $row["stationID"];
        $params = array(
            'api_key' => 'w0Gs0EehnhpFgQ6aUZRAav4ph1rmdOtZQ54BnnHZ'
        );
        $query_string = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://developer.nrel.gov/api/alt-fuel-stations/v1/{$stationID}.json?" . $query_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
?>

<div class="container">
    <div class="pt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Station Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">EV Network</th>
                    <th scope="col">Connector Types</th>
                    <th scope="col">Directions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $station) : ?>
                <tr>
                    <td><?= $station->station_name ?></td>
                    <td><?= $station->street_address ?>, <?= $station->city ?>, <?= $station->state ?></td>
                    <td><?= $station->ev_network ?></td>
                    <td class="text-wrap"><?= implode(', ', $station->ev_connector_types) ?></td>
                    <td><a href="https://www.google.com/maps/dir/?api=1&destination=<?= urlencode($station->latitude . ',' . $station->longitude) ?>&travelmode=driving" target="_blank">Get Directions</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    } else {
        echo "<p>You haven't added any favorite stations yet.</p>";
    }
}
?>




<?php 
    include "footer.php";
?>