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
                <a class="navbar-brand" href="/ISI-490-WEBAPP/user-session.php"><img src="resources/home-badge.jpg" width="30" height="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Project Documents
                            </a>
                            <ul class="dropdown-menu">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                href="./documents/ISI-490-SystemRequestProposal&FeasibilityAnalysis.pdf">System
                                Request Proposal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                    href="./documents/ISI-490-SoftwareRequirements.pdf">Software
                                    Requirements</a>
                            </li>
                            <li><hr class="dropdown-divider">Data Flow Diagrams</li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                    href="./documents/DFD-Context-Diagram.pdf">Context Diagram</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                    href="./documents/DFD-Level0-Diagram.pdf">Level 0 Diagram</a>
                            </li>
                            <li><hr class="dropdown-divider">ER Diagrams</li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                    href="./documents/ER-Diagram.pdf">ER Diagram</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" target="_blank" rel="noopener noreferrer"
                                    href="./documents/ER-Diagram-Physical.pdf">Physical ER Diagram</a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" target="_blank" rel="noopener noreferrer"
                                href="https://github.com/uAreHere/ISI-490-EV-Charging-Services-Locator">Source Code</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/ISI-490-WEBAPP/station-locator-registeredUser.php">Find Charging Stations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/ISI-490-WEBAPP/user-session.php">Favorited Stations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Book Charging Time</a>
                        </li>
                        <li class="nav-item align-content-right">
                            <a class="btn btn-success" role="button" href="/ISI-490-WEBAPP/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>