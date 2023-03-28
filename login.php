<?php
    #include("connection.php");
    $username = $_POST['user'];
    $password = $_POST['password']; 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge, chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>EV Charging Services & Locator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="description"
        content="Here I will be hosting the Capstone Web-App being developed for the Spring 2023 section of ISI-490" />
</head>

<body class="index">
    <div class="container bg-success my-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="ISI-490-WebApp/hello.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="https://3.239.216.152/ProjectPlanningDocs/ISI-490-SystemRequestProposal&FeasibilityAnalysis.pdf">System
                                Request Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="https://3.239.216.152/ProjectPlanningDocs/ISI-490-SoftwareRequirements.pdf">Software
                                Requirements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://github.com/uAreHere/ISI-490-EV-Charging-Services-Locator">Source Code</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
    <div class="container card my-5" style="width: 18rem;">
        <div class="card-body" id="form">
            <form class="px-4 py-3" action="login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleDropdownFormEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="user" id="exampleUserName" placeholder="cicada3301">
                </div>
                <div class="mb-3">
                    <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleDropdownFormPassword1"
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
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="ISI-490-WebApp/hello.php/signUp.php">New around here? Sign up</a>
            <a class="dropdown-item" href="#">Forgot password?</a>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>