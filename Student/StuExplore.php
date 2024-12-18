<?php include 'Student2.php';
include 'Course.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Explore Course</title>
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

.none {
    border: none;
    background-color: transparent;
    text-align: center;
}

.none:hover {
    border: none;
    pointer-events: none;
}

.form-control:focus,
.form-select:focus,
.btn:focus {
    outline: none;
    box-shadow: none;
    border: 1px solid #ced4da;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}
</style>

<body>

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
                            <ul class="dropdown-menu shadow-lg" aria-labelledby="navbarDropdown">
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
    </nav><br><br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="card bg-dark text-light shadow-lg">
                <div class="card-header">
                    <form action="Course.php" method="post">
                        <?php
                        $course = $_SESSION["coursename"];
                        $sql = "SELECT *FROM courses WHERE name='$course';";
                        $que = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($que);
                        ?>
                        <h2><?php echo $course; ?></h2>
                        <p><?php echo $row['summary']; ?></p>
                        <button type="submit" class="btn btn-primary ml-3"
                            name="enroll<?php echo $row['id']; ?>">Enroll</button>
                </div>
                </form>
                <div class="card-body">
                    <h3>Course Content:</h3>
                    <?php
                    $course = strtolower($course);
                    $sql1 = "SELECT *FROM $course;";
                    $que1 = mysqli_query($con, $sql1);
                    while ($row1 = mysqli_fetch_assoc($que1)) { ?>
                    <button class="btn text-light container-fluid text-start border-light" data-bs-toggle="collapse"
                        data-bs-target="#demo<?php echo $row1['id']; ?>">
                        <?php echo $row1['heading']; ?> <i class="fa-solid fa-caret-down" style="float: right;"></i>
                        <br>
                        <div id="demo<?php echo $row1['id']; ?>" class="collapse">
                            <?php echo $row1['description']; ?>
                        </div>
                    </button>
                    <br><br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>