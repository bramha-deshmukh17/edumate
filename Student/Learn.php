<?php include 'Student2.php';
include 'Course.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo ucfirst($_SESSION['coursename']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
    <script src="reload.js"></script>
</head>

<style>
* {
    overflow-y: hidden;
}

a {
    text-decoration: none !important;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}

.nav-link,
.nav-link:hover,
.nav-link:active {
    color: #fff !important;
    font-size: 1.2rem;
    margin-right: 1rem;
}

#iframeContainer {
    display: flex;
    height: 100vh;
}

.scrollableIframe {
    flex: 1;
    max-width: 20%;
    overflow-y: scroll;
    border-right: 1px solid #ccc;
}

.nonScrollableIframe {
    flex: 3;
    overflow-Y: hidden;
}

iframe {
    width: 100%;
    height: 100%;
    border: none;
}

::-webkit-scrollbar {
    width: 5px;
    /* width of the scrollbar */
}

::-webkit-scrollbar-thumb {
    background-color: #3498db;
    /* color of the scrollbar thumb */
    border-radius: 6px;
    /* round corners of the thumb */
}

::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    /* color of the scrollbar track */
}

::-webkit-scrollbar-thumb:hover {
    background-color: #2980b9;
    /* color of the thumb on hover */
}
</style>

<body onload="document.getElementById('data').contentDocument.location.reload(true);">

    <nav class="navbar navbar-expand-lg sticky" style="background-color: #000;z-index:100;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../Edumate.png" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Student.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="StuContact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="StuAbout.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="StuCertificate.php">Certificates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../forum/">Discussion Forum</a>
                    </li>
                </ul>
                <div class="d-flex" style="margin-right: 1rem;margin-top:0.5rem;">

                    <ul style="list-style-type:none;padding-left:0 !important;margin-left: -1.5% !important;">
                        <li class="nav-item dropdown" style="padding-left:0 !important;">
                            <a class="nav-link" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                                <?php echo $_SESSION['username']; ?>&nbsp;&nbsp;<i class="fa-solid fa-user"
                                    style="color: #ffffff;"></i>
                            </a>
                            <ul class="dropdown-menu shadow-lg">
                                <li><a class="dropdown-item" href="StudentProfile.php">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="StudentLogin.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div id="iframeContainer" class="mt-5">
        <div class="scrollableIframe">
            <iframe src="LearnFrame1.php" id="data1"
                onload="document.getElementById('data2').contentDocument.location.reload(true);"></iframe>
        </div>

        <div class="nonScrollableIframe">
            <iframe src="LearnFrame2.php" id="data2"></iframe>
        </div>
    </div>

</body>

</html>