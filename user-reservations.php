<?php 
session_start();
include_once "header-registeredUser.php";

if(isset($_SESSION["usersId"])) {

    echo "<div class='container'>";

    $mysqli = require __DIR__ ."/db-connection.php";
    $userId = $_SESSION["usersId"];

    $query = "SELECT userreservations.reservationID, chargingstations.stationName, chargingstations.stationAddress, chargingreservations.date, chargingreservations.time FROM userreservations JOIN chargingreservations ON userreservations.reservationID = chargingreservations.reservationID JOIN chargingstations ON chargingreservations.stationID = chargingstations.stationID WHERE userreservations.userID = ?";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows >= 0){
        echo "<table class='table table-striped'>";
        echo "<thead>
            <tr>
                <th scope='col'>Reservation ID</th>
                <th scope='col'>Station Name</th>
                <th scope='col'>Station Address</th>
                <th scope='col'>Reservation Date</th>
                <th scope='col'>Reservation Time</th>
                <th scope='col'>Delete Reservation</th>
            </tr>
            </thead>";

        echo "<tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td scope='row'>" . $row["reservationID"] . "</td>";
            echo "<td>" . $row["stationName"] . "</td>";
            echo "<td>" . $row["stationAddress"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";            
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>
                    <form method='POST' action='delete-reserv.php'>
                    <input type='hidden' name='reservation_id' value='". $row["reservationID"] . "'>
                    <button class='btn btn-danger' type='submit'>Delete Reservation</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No reservations found.";
    }
    $stmt->close();

}

echo "</div>";

include_once "footer.php";

?>