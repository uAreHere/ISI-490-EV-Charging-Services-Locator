<?php 

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $pwdconf = $_POST["pwdconf"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $zipcode = $_POST["zipcode"];

    require_once 'connection.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputSignup($email, $username, $password, $pwdconf, $firstname, $zipcode) !== false) {
        header("location: ../signUp.php?error=empty-input");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../signUp.php?error=invalid-email");
        exit();
    }
    if (pwdMatch($password, $pwdconf) !== false){
        header("location: ../signUp.php?error=bad-pw-match");
        exit();
    }
    if (userExists($conn, $username, $email) !== false){
        header("location: ../signUp.php?error=user-taken");
        exit();
    }

    createUser($conn, $username, $email, $password, $firstname, $lastname, $zipcode);

}
else {
    header("location: ../signUp.php");
    exit();
}


?>