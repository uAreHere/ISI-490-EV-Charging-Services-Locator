<?php 
session_start();
if(isset($_SESSION["usersId"])){
    $mysqli = require __DIR__ . "/db-connection.php";

    $stationID = $_POST['station_id'];
    $reservationDate = $_POST['reservation_date'];
    $reservationTime = $_POST['reservation_time'];
    $userId = $_POST['usersId'];

    $insertChargingResSql = "INSERT INTO chargingreservations (stationID, date, time) VALUES(?, ?, ?)";
    $insertChargingResStmt = $mysqli->prepare($insertChargingResSql);
    $insertChargingResStmt->bind_param("iss", $stationID, $reservationDate, $reservationTime);

    if($insertChargingResStmt->execute()){
        $reservationID = $insertChargingResStmt->insert_id;

        $insertUserResSql = "INSERT INTO userreservations (userId, reservationID) VALUES(?,?)";
        $userResStmt = $mysqli->prepare($insertUserResSql);
        $userResStmt->bind_param("ii", $userId, $reservationID);

        if($userResStmt->execute()) {
            header("Location: user-reservations.php");
        } else {
            echo "Error adding to user reservations.";
        }
    } else {
        echo "Erro Creating Charging Reservation.";
    }

    $insertChargingResStmt->close();
    $userResStmt->close();
}
else {
    echo "Could not Complete action.";
}


?>