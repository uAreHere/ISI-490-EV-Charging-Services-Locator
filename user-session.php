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

    <div class="container">
    <div class="pt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Station Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Connector Types</th>
                    <th scope="col">Pricing</th>
                    <th scope="col">Get Directions</th>
                    <th scope="col">Reserve A Time</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $mysqli = require __DIR__ . "/db-connection.php";

                $user_id = $_SESSION["usersId"];
                $sql = "SELECT chargingstations.stationID, chargingstations.stationName, chargingstations.stationAddress, chargingstations.stationCity, chargingstations.stationState, chargingstations.evConnectorTypes, chargingstations.chargePricing, chargingstations.latitude, chargingstations.longitude 
                        FROM userfavorites 
                        JOIN chargingstations 
                        ON userfavorites.stationID = chargingstations.stationID 
                        WHERE userfavorites.userId = $user_id";
            
                $result = mysqli_query($mysqli, $sql);

                if(mysqli_num_rows($result) <= 0){
                    echo "<h3 class='alert alert-warning text-center'>You have not added any favorites yet. Search nearby to add some!</h3>";
                } else {
                    while ($row = $result->fetch_assoc()) {
                      $station_id = $row["stationID"];
                      $favorites_sql = "SELECT * FROM chargingstations WHERE stationID = {$station_id}";
                      $favorites_result = $mysqli->query($favorites_sql);
                      $station = $favorites_result->fetch_assoc();
                      echo "<tr>";
                      echo "<td>{$station['stationName']}</td>";
                      echo "<td>{$station['stationAddress']}, {$station['stationCity']}, {$station['stationState']}</td>";
                      echo "<td>{$station['evConnectorTypes']}</td>";
                      echo "<td>{$station['chargePricing']}</td>";
                      echo '<td><a href="https://www.google.com/maps/dir/?api=1&destination='. urlencode($station["latitude"] . ',' . $station["longitude"]) .'&travelmode=driving" target="_blank">Get Directions</a></td>';
                      echo "<td><button class='btn btn-secondary'><a href='./reserveTime.php' class='link-light'>Reserve</a></button></td>";
                      echo "</tr>";
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

    
<?php
    
?>




<?php 
    include "footer.php";
?>