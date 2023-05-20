<?php
    session_start();
    $mysqli = require __DIR__ . "/db-connection.php";
    
    include_once 'header-registereduser.php';

    $userID = $_SESSION['usersId'];
    //post variables from action on reserve form available globally 
    $stationID = $mysqli->real_escape_string($_POST['station_id']);
    $stationName = $mysqli->real_escape_string($_POST['station_name']);
    $stationAddress = $mysqli->real_escape_string($_POST['street_address']);
    $stationCity = $mysqli->real_escape_string($_POST['city']);
    $stationState = $mysqli->real_escape_string($_POST['state']);
    $stationZipcode = $mysqli->real_escape_string($_POST['zip']);
    $evConnectorTypes = $mysqli->real_escape_string($_POST['ev_connector_types']);
    $evNetwork = $mysqli->real_escape_string($_POST['ev_network']);
    $chargePricing = $mysqli->real_escape_string($_POST['ev_pricing']);
    $latitude = $mysqli->real_escape_string($_POST['latitude']);
    $longitude = $mysqli->real_escape_string($_POST['longitude']);

    $checkQuery = "SELECT COUNT(*) as count FROM chargingstations where stationID = ?";
    $checkStmt = $mysqli->prepare($checkQuery);
    $checkStmt->bind_param("i", $stationID);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $stationCount = $checkResult->fetch_assoc()['count'];
    
    if ($stationCount == 0) {
            //output if reserving from station search

            $sqlInsert = "INSERT INTO chargingstations (stationID, stationName, stationAddress, stationCity, stationState, stationZipcode, evConnectorTypes, evNetwork, chargePricing, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $mysqli->prepare($sqlInsert);
            $insertStmt->bind_param("issssisssdd", $stationID, $stationName, $stationAddress, $stationCity, $stationState, $stationZipcode, $evConnectorTypes, $evNetwork, $chargePricing, $latitude, $longitude);

            if($insertStmt->execute()){

            } else {
                echo "Error: ". $insertStmt->error;
            }

            $checkStmt->close();

            echo "<div class='container'>";

            echo "<div class='card'>";
            echo "<div class='card-body'>";
            
            echo "<h2 class='card-title'>Reservation for: $stationName</h2>";
            echo "<h3 class='card-subtitle'>Address: $stationAddress</h3>";

            echo "<form method='POST' action='reservation-script.php'>";
            echo "<input type='hidden' name='usersId' value='$userID'>";
            echo "<input type='hidden' name='station_id' value='$stationID'>";
            echo "<label class='form-label'>Select Date</label>";
            echo "<input type='date' name='reservation_date'><br>";
            echo "<label class='form-label'>Select Time</label>";
            echo "<input type='time' name='reservation_time'><br>";
            echo "<button class='btn btn-success' type='submit'>Confirm Reservation</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
            echo "</div>";


        } else{
            //output if reserving from user favorites list
            $sql = "SELECT stationName, stationAddress FROM chargingstations WHERE stationID = $stationID";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $station_name = $row["stationName"];
            $station_address = $row["stationAddress"];

            $result->close();

            echo "<div class='container'>";

            echo "<div class='card'>";
            echo "<div class='card-body'>";

            echo "<h2 class='card-title'>Reservation for: $station_name</h2>";
            echo "<h3 class='card-subtitle'>Address: $station_address</h3>";

            echo "<form method='POST' action='reservation-script.php'>";
            echo "<input type='hidden' name='usersId' value='$userID'>";
            echo "<input type='hidden' name='station_id' value='$stationID'>";
            echo "<label class='form-label'>Select Date</label><br>";
            echo "<input type='date' name='reservation_date'><br>";
            echo "<label class='form-label'>Select Time</label><br>";
            echo "<input type='time' name='reservation_time'><br>";
            echo "<button class='btn btn-success m-3' type='submit'>Confirm Reservation</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

            echo "</div>";
        }
        
?>



<?php 
    include_once 'footer.php';
?>