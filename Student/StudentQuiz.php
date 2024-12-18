<?php include 'Student2.php';
include 'Course2.php';
include 'StudentQuiz2.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo ucfirst($_SESSION['coursename']); ?> Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
    <script src="reload.js"></script>
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

input {
    border: none;
}

input:focus,
input:active {
    border: none !important;
    outline: none;
}

.input {
    width: 100%;
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
    </nav><br><br><br><br>



    <form method="post" action="StudentQuiz2.php" class="container">
        <div class="card row p-3 text-center text-light bg-dark"><?php echo $_SESSION['quizname']; ?></div><br>
        <div class="card p-3 text-light bg-dark">
            <p style="border-bottom: 1px solid #fff !important;">Each question carry one mark and all question are not
                Mandatory</p>
            <?php
            $course = $_SESSION['quiz'];

            $sql = "SELECT *FROM $course;";
            $run = mysqli_query($con, $sql);
            $i = 1;
            while ($result = mysqli_fetch_assoc($run)) {
            ?>

            <div class="card-header bg-dark text-light" style="margin:0;"><input type="text"
                    class="text-light bg-dark input" name="q<?php echo $result['id']; ?>"
                    value="Q.<?php echo $i; ?> <?php echo $result['question']; ?>" style="margin:0;" readonly></div>
            <div class="card-body" style="border-bottom: 1px solid #fff !important;">
                <input type="radio" name="a<?php echo $result['id']; ?>" value="A"><?php echo $result['optiona']; ?><br>
                <input type="radio" name="a<?php echo $result['id']; ?>" value="B"><?php echo $result['optionb']; ?><br>
                <input type="radio" name="a<?php echo $result['id']; ?>" value="C"><?php echo $result['optionc']; ?><br>
                <input type="radio" name="a<?php echo $result['id']; ?>" value="D"><?php echo $result['optiond']; ?><br>
            </div>

            <?php $i += 1;
            } ?>

            <button type="submit" class="btn btn-primary col-3 m-3" name="submit" style="float:right">Submit</button>
        </div>
    </form>

</body>

</html>