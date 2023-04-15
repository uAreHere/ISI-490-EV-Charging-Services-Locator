<?php
    include "header-registeredUser.php";
    session_start();

    #print_r($_SESSION);

    if (isset($_SESSION["usersId"])) {
        $mysqli = require __DIR__ . "/db-connection.php";

        $sql = "SELECT * FROM users WHERE usersId = {$_SESSION["usersId"]}";

        $result = $mysqli->query($sql);
        $user= $result->fetch_assoc();
    }

?>

    <div class="container">

        <?php if (isset($user)): ?>
        <h2>Welcome <?= htmlspecialchars($user["username"])?></h2>

        <?php else: ?>
            <p><a class="btn btn-success" role="button" href="/ISI-490-WEBAPP/login.php">Login</a> or <a class="btn btn-success" role="button" href="/ISI-490-WEBAPP/signUp.php">Sign Up</a></p>
        <?php endif; ?>

        


    </div>


<?php 
    include "footer.php";
?>
