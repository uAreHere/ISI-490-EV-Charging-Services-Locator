<?php
    $isInvalid = false;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . "/db-connection.php";

        $sql = sprintf("SELECT * FROM users WHERE username = '%s'", $mysqli->real_escape_string($_POST["username"]));

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user) {
            if(password_verify($_POST["pwd"], $user["password"])) {
                session_start();

                session_regenerate_id();
                $_SESSION["usersId"] = $user["usersId"];

                header("Location: user-session.php");
                exit;
            }
        }
        $isInvalid = true;
    }

    include_once 'header.php';
?>

    <div class="container card my-5" style="width: 18rem;">
        <div class="card-body" id="form">
            <form method="post" class="px-4 py-3">
                <?php if($isInvalid): ?>
                    <em class="text-danger">Invalid Login</em>
                <?php endif; ?>
                
                <div class="mb-3">
                    <label for="exampleDropdownFormEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="cicada3301" value="<?= htmlspecialchars($_POST["username"] ?? "")?>">
                </div>
                <div class="mb-3">
                    <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name ="pwd" id="exampleDropdownFormPassword1"
                        placeholder="Password">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                        <label class="form-check-label" for="dropdownCheck">
                            Remember me
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Log In</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="signUp.php">New around here? <button class="btn btn-info">Sign up</button></a>
            <a class="dropdown-item" href="#">Forgot password?</a>
        </div>
    </div>


<?php 
    include_once 'footer.php';
?>