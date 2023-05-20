<?php 
    session_start();
    $mysqli = require __DIR__ . "/db-connection.php";

    if (isset($_SESSION["usersId"]) && isset($_POST["stationID"]) && isset($_POST["stationName"]) && isset($_POST["rating"])) {
        $userID = $_SESSION["usersId"];
        $stationID = $_POST["stationID"];
        $stationName = $_POST["stationName"];
        $rating = $_POST["rating"];

        $query = "INSERT INTO stationreviews (userID, stationID, stationName, rating) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("iisi", $userID, $stationID, $stationName, $rating);

        if($stmt->execute()){
            header("Location: station-reviews.php");
        } else {
            echo "Error adding rating.";
            
        }

        $stmt->close();
    }
    else {
        echo "Invalid Request";
    }
?>