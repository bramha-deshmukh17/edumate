<?php include 'Student2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
</head>

<style>
body {
    background: linear-gradient(to bottom, #3498db, #ffffff) no-repeat;
    background-attachment: fixed;
    font-family: Arial !important;
}

a {
    text-decoration: none !important;
}

.nav-link,
.nav-link:hover,
.nav-link:active {
    color: #fff !important;
    font-size: 1.2rem;
    margin-right: 1rem;
}
</style>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #000;z-index:100;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../Edumate.png" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Landing.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HomeContact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div class="d-flex" style="margin-right: 1rem;margin-top:0.5rem;">

                    <ul style="list-style-type:none;padding-left:0 !important;margin-left: -1.5% !important;">
                        <li class="nav-item dropdown" style="padding-left:0 !important;">
                            <a class="nav-link" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                            </a>
                            <ul class="dropdown-menu shadow-lg">
                                <li><a class="dropdown-item" href="StudentLogin.php">Student Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="AdminLogin.php">Staff Login</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="nav-link" href="StudentSignup.php">Signup</a>
                </div>
            </div>
        </div>
    </nav><br><br><br>

    <pre class="container bg-dark text-light p-5 h6 rounded" style="line-height:25px;">
EduMate aims to provide you with quality education that meets your learning needs and expectations. EduMate will help you to:

 Learn the fundamentals and applications of remote sensing and geospatial technology
 Develop your analytical and problem-solving skills
 Enhance your career prospects and opportunities
 To start learning with EduMate, you need to register for an account and enroll in a course of your choice. 
 You also need to have a stable internet connection and a compatible browser. 

We hope you enjoy learning with EduMate! If you have any questions or feedback, please contact us using Contact Page.
</pre>

</body>

</html>