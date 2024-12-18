<?php include 'Student2.php';
include 'Course.php';
include 'StudentQuiz2.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student</title>
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

.text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
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
                        <a class="nav-link" href="#">Home</a>
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
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Change Password</button></li>
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

    <!--Change password modal-->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <form method="post" action="Student2.php" class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="password" class="form-control" id="pass1" name="old"
                        placeholder="Enter Old Password"><br>
                    <input type="password" class="form-control" id="pass2" name="new" placeholder="Enter New Password">
                </div>

                <div class="modal-footer">
                    <input type="checkbox" class="form-check-input" style="float:left;" id="checkA"
                        onclick="Toggle()" />&nbsp;Show Password
                    &nbsp;<button type="submit" name="change" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>

    <!--  alerts-->
    <div class="container">
        <div class="text-center">
            <?php if ($_SESSION['certificateerr'] == 'Yes') { ?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong>You got <?php echo $_SESSION['percentage']; ?>%. You're not eligible for
                certificate try again.
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['certificateerr'] = ''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div><?php } ?>

            <form action="Course.php" method="post">
                <?php if ($_SESSION['certificateerr'] == 'No') { ?>
                <div class="alert alert-success alert-dismissible">
                    <strong>Success!</strong>You got <?php echo $_SESSION['percentage']; ?>%. You're eligible for
                    certificate click OK to apply for certificate.
                    <button type="submit" name="apply" class="btn" style="float: right;">Ok</button>
                </div><?php } ?>
            </form>

            <?php if ($_SESSION['passup'] == 'Yes') { ?>
            <div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Password Updated Successfully.
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['passup'] = ''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div><?php } ?>
            <?php if ($_SESSION['passup'] == 'No') { ?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong> Invalid old password.
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['passup'] = ''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div><?php } ?>

        </div>
    </div>

    <!--Enrolled courses-->
    <form action="Course.php" method="post">
        <div class="container">
            <h3>Enrolled Courses</h3><br>
            <div class="row">
                <?php
        $sql = 'SELECT *FROM courses;';
        $que = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($que)) {
          $table = $user . "_courses;";
          $sql1 = "SELECT *FROM $table;";
          $run = mysqli_query($con, $sql1);
          while ($row1 = mysqli_fetch_assoc($run)) {
            if ($row['name'] == $row1['coursename']) {
        ?>
                <div class="col-md-3">
                    <div class="card bg-dark text-light shadow-lg">
                        <div class="card-header"><?php echo $row['name']; ?></div>
                        <div class="card-body text p-4"><?php echo $row['summary']; ?></div>
                        <div class="card-footer"><button type="submit" class="btn btn-primary"
                                name="learn<?php echo $row['id']; ?>">View</button>
                            <button type="submit" class="btn btn-success" name="quiz<?php echo $row['id']; ?>">Attempt
                                Quiz</button>
                        </div>
                    </div>
                </div>

                <?php }
          }
        }
        ?>
            </div>
        </div>
    </form><br><br>

    <!--explore courses-->
    <form action="Course.php" method="post">
        <div class="container">
            <h3>Courses</h3><br>
            <div class="row">
                <?php

        $table = $user . "_courses;";
        $sql = "SELECT *FROM courses WHERE visible='True';";
        $que = mysqli_query($con, $sql);
        while ($row1 = mysqli_fetch_assoc($que)) {
          $count = 0;
          $sql2 = "SELECT *FROM $table;";
          $que2 = mysqli_query($con, $sql2);
          while ($row2 = mysqli_fetch_assoc($que2)) {
            if ($row1['name'] == $row2['coursename'])
              $count += 1;
          }
          if ($count == 0) {
        ?>
                <div class="col-md-3">
                    <div class="card bg-dark text-light shadow-lg">
                        <div class="card-header"><?php echo $row1['name']; ?></div>
                        <div class="card-body text p-4"><?php echo $row1['summary']; ?></div>
                        <div class="card-footer"><button type="submit" class="btn btn-primary"
                                name="view<?php echo $row1['id']; ?>">View</button></div>
                    </div>
                </div>

                <?php }
        }
        ?>
            </div>
        </div>
    </form>

</body>

</html>