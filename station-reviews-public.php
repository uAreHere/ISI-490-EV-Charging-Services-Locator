<?php 
$mysqli = require __DIR__ . "/db-connection.php";

$query = "SELECT chargingstations.stationID, chargingstations.stationName, chargingstations.stationAddress, chargingstations.stationCity, chargingstations.stationState, chargingstations.stationZipcode, COUNT(stationreviews.stationID) AS numReviews, AVG(stationreviews.rating) AS avgRating FROM chargingstations LEFT JOIN stationreviews ON chargingstations.stationID = stationreviews.stationID GROUP BY chargingstations.stationID";

$result = $mysqli->query($query);

include_once "header.php";
?>

<div class="container">
    <div class="alert alert-warning text-center" role="alert">Please Create an Account to Add a Rating</div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Station ID</th>
            <th scope="col">Station Name</th>
            <th scope="col">Station Address</th>
            <th scope="col">Number of Reviews</th>
            <th scope="col">Rating</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row=$result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row["stationID"];?></td>
                    <td><?php echo $row["stationName"];?></td>
                    <td><?php echo $row["stationAddress"]. ", " . $row["stationCity"]. ", ". $row["stationState"]. " ". $row["stationZipcode"];?></td>
                    <td><?php echo $row["numReviews"];?></td>
                    <td><?php echo number_format($row["avgRating"], 2);?></td>
                </tr>
            <?php endwhile;?>
        </tbody>

    </table>

</div>


<?php 
include_once "footer.php";
?>