<!DOCTYPE html>
<html lang="en">

<head>
    <title>Landing</title>
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

a:hover,
a :active {
    color: #fff;
}

.nav-link,
.nav-link:hover,
.nav-link:active {
    color: #fff !important;
    font-size: 1.2rem;
    margin-right: 1rem;
}

.start {
    color: #fff;
    background-color: skyblue;
    outline: 7px double skyblue;
    border: 1px solid #fff;
    padding: 1em;
    border-radius: 50px;
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HomeContact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HomeAbout.php">About</a>
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
                                <li><a class="dropdown-item" href="../Admin/AdminLogin.php">Staff Login</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="nav-link" href="StudentSignup.php">Signup</a>
                </div>
            </div>
        </div>
    </nav><br><br><br>

    <div class="container">
        <div class="row">
            <p style="line-height:2rem; border-top-left-radius:10px;border-bottom-left-radius:10px; margin-bottom:0"
                class="col-6 text-light bg-dark p-5 shadow-lg">
                Welcome to EduMate, the online platform that helps you learn new skills and achieve your goals. Whether
                you want to advance your career, pursue your passion, or simply satisfy your curiosity, EduMate has
                something for you.<br>

                With EduMate, you can access thousands of courses and tutorials on various topics, such as programming,
                design, business, languages, and more. You can learn at your own pace, from anywhere, and on any device.
                You can also interact with other learners and instructors, get feedback, and earn certificates.<br>

                EduMate is easy to use and affordable. You can sign up for free and browse our catalog of courses. You
                can also enroll in any course that interests you and start learning right away.<br>

                EduMate is more than just an online learning platform. It is a community of learners who share the same
                passion for knowledge and growth. Join EduMate today and discover the joy of learning.
            </p>
            <div class="col-6 bg-light p-5" style="border-bottom-right-radius:10px;border-top-right-radius:10px;">
                <h1 class="h1">Explore Courses on EduMate</h1><br><br>
                <a href="StudentLogin.php" class="start">Get Started <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

</body>

</html>