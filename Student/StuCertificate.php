<?php include 'Student2.php';
include 'Course.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Certificate</title>
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
                        <a class="nav-link" href="#">Certificates</a>
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
    </nav><br><br><br><br><br><br>

    <div class="container">
        <form action="Test.php" method="post">
            <table class="shadow-lg table bg-light text-center table-dark table-hover table-bordered">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Course</th class="p-3">
                    <th>Certificate</th>
                </tr>
                <?php
                $table = $user . "_courses";
                $sql = "SELECT *FROM $table WHERE certificate='Yes';";
                $run = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($run)) { ?>

                <tr>
                    <td class="p-3"><?php echo $row['certificateno']; ?></td>
                    <td class="p-3"><?php echo $row['coursename']; ?></td>
                    <td class="p-3">
                        <button type="submit" class="btn btn-primary shadow-none"
                            name="certificate<?php echo $row['certificateno']; ?>">Download <i
                                class="fa-solid fa-certificate"></i></button>
                    </td>
                </tr>

                <?php
                }
                if (mysqli_num_rows($run) <= 0) {
                    echo "<tr><td colspan='5' class='text-center p-3'>You don't have any certificate.</td></tr>";
                }

                ?>
            </table>
        </form>
    </div>

</body>

</html>