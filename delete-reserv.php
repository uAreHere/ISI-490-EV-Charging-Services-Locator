<?php 
    session_start();
    $mysqli = require __DIR__ . "\db-connection.php";

    if(isset($_POST["reservation_id"])) {
        $reservationID = $_POST["reservation_id"];

        $deleteUserRes = "DELETE FROM userreservations WHERE reservationID = ?";
        $stmtUserRes = $mysqli->prepare($deleteUserRes);
        $stmtUserRes->bind_param("i",$reservationID);
        $stmtUserRes->execute();
        $stmtUserRes->close();

        $deleteChargingRes = "DELETE FROM chargingreservations WHERE reservationID = ? ";
        $stmtChargingRes = $mysqli->prepare($deleteChargingRes);
        $stmtChargingRes->bind_param("i", $reservationID);
        $stmtChargingRes->execute();
        $stmtChargingRes->close();

        header("Location: user-reservations.php");
        exit;
    }
    else {
        echo "Can't Do";
    }

?>