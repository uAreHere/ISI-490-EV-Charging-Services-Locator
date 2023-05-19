<?php 
session_start();

$stationID = ($_POST["stationID"]);
$stationName = ($_POST["stationName"]);

include_once "header-registeredUser.php";
?>

<div class="container d-inline-flex justify-content-center">
    <div class="card" style="width: 30rem;">
    <div class="card-body m-2">
        <h3 class="card-title m-2"><?php echo $stationName?></h3>
        <h5 class="card-subtitle m-2 text-body-dark">Station ID: <?php echo $stationID;?></h5>
    <div class="input-group">
    <form method="POST" action="rating-submit.php">
        <input type="hidden" name="stationID" value="<?php echo $stationID;?>">
        <input type="hidden" name="stationName" value="<?php echo $stationName;?>">
        <label class="form-label m-2" for="rating">Rating:</label>
        <select class="form-select" name="rating" id="rating">
        <option value="1">1 Star</option>
        <option value="2">2 Stars</option>
        <option value="3">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5">5 Stars</option>
        </select>
        <button class="btn btn-success m-2" type="submit">Submit Rating</button>
    </form>
    </div>
    </div>
    </div>    
</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>



<?php 
include_once "footer.php";
?>