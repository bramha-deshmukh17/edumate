<?php include 'Admin2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
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

.center {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    color: whitesmoke;
}

.rounded {
    font-size: 2em;
    margin-right: 5% !important;
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
                        <a class="nav-link" href="AdminContact.php">Contact</a>
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
                                <li><a class="dropdown-item" href="AdminProfile.php">Profile</a></li>
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Change Password</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="AdminLogin.php">Logout</a></li>
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
            <form method="post" action="Admin2.php" class="modal-content">

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

    <!--Admin password alerts-->
    <div class="container">
        <div class="text-center">

            <?php if($_SESSION['passup']=='Yes'){?>
            <div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Password Updated Successfully.
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['passup']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div><?php }?>
            <?php if($_SESSION['passup']=='No'){?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong> Invalid old password.
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['passup']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div><?php }?>

        </div>
    </div>

    <div class="container center">
        <div class="row">
            <div class="col-lg-3 m-3 p-5 bg-dark shadow-lg rounded">
                <div class="card-body bg-dark p-5"><a class="text-light" href="ViewCourse.php">Courses</a> </div>
            </div>
            <div class="col-lg-3 m-3 p-5 bg-dark shadow-lg rounded">
                <div class="card-body bg-dark p-5"><a class="text-light" href="AdminCertificate.php">Certificate</a>
                </div>
            </div>
            <div class="col-lg-3 m-3 p-5 bg-dark shadow-lg rounded">
                <div class="card-body bg-dark p-5"><a class="text-light" href="../forum2/">Discussion</a> </div>
            </div>
        </div>
    </div>



    <script>
    function Toggle() {
        var temp = document.getElementById("pass1");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
        var temp = document.getElementById("pass2");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
    }
    </script>

</body>

</html>