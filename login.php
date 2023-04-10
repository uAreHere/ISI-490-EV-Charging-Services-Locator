<?php
    include_once 'header.php';
    #include("connection.php");
    $username = $_POST['user'];
    $password = $_POST['password']; 
?>

    <div class="container card my-5" style="width: 18rem;">
        <div class="card-body" id="form">
            <form action ="includes/login.inc.php" method="post" class="px-4 py-3">
                <div class="mb-3">
                    <label for="exampleDropdownFormEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="exampleUserName" placeholder="cicada3301">
                </div>
                <div class="mb-3">
                    <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleDropdownFormPassword1"
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
            <a class="dropdown-item" href="/ISI-490-WEBAPP/signUp.php">New around here? <button class="btn btn-info">Sign up</button></a>
            <a class="dropdown-item" href="#">Forgot password?</a>
        </div>
    </div>


<?php 
    include_once 'footer.php';
?>