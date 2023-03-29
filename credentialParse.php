<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['password']; 

        $sql = "select * from user_credentials where username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            header["Location:hello.php"];
        }
        else{
            echo '<script>
            window.location.href = "login.php";
            alert("Login failer. Invalid username or password.")
            </script>';
        }

    }
?>