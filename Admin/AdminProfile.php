<?php include 'Admin2.php';

$sql = "SELECT *FROM staff WHERE username='$user';";
$result = mysqli_query($con, $sql);
$store = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile</title>
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

.img {
    width: 20%;
    border-radius: 50%;
}

.form-control:focus {
    outline: none;
    box-shadow: none;
    border: 1px solid #ced4da;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
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
                        <a class="nav-link" href="Admin.php">Home</a>
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
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="AdminLogin.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav><br><br><br><br><br>

    <div class="container p-5 rounded shadow-lg bg-dark">
        <h1 class="text-light">Personal Details<button type="button" class="btn text-light shadow-none"
                data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"
                    title="Edit your Details"></i></button></h1>
        <div class="row">
            <div class="col-6">
                <div class="input-group row">
                    <span class="input-group-text col-3">Name</span>
                    <input class="form-control bg-dark text-light" type="text" name="name"
                        value="<?php echo $store['name']; ?>" readonly placeholder="Enter Name"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">Mobile</span>
                    <input class="form-control bg-dark text-light" type="text" name="mobile"
                        value="<?php echo $store['mobile']; ?>" readonly placeholder="Enter Mobile Number"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">E-mail</span>
                    <input class="form-control bg-dark text-light" type="text" name="email"
                        value="<?php echo $store['email']; ?>" readonly placeholder="Enter E-Mail"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">Address</span>
                    <input class="form-control bg-dark text-light" type="text" name="address"
                        value="<?php echo $store['address']; ?>" readonly placeholder="Enter address"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">Graduation</span>
                    <input class="form-control bg-dark text-light" type="text" name="graduation"
                        value="<?php echo $store['graduation']; ?>" readonly placeholder="Enter Graduation"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">PG</span>
                    <input class="form-control bg-dark text-light" type="text" name="postgraduation"
                        value="<?php echo $store['postgraduation']; ?>" readonly
                        placeholder="Enter Post Graduation"><br><br>
                </div><br>

                <div class="input-group row">
                    <span class="input-group-text col-3">PhD</span>
                    <input class="form-control bg-dark text-light" type="text" name="phd"
                        value="<?php echo $store['phd']; ?>" readonly placeholder="Enter PhD"><br>
                </div><br>
            </div>
            <div class="col-6">
                <img src="../<?php echo $store['img']; ?>" class="img"><br><br>
                <b class="text-light">Update Photo:</b><br><br>
                <form method="post" action="Admin2.php" enctype="multipart/form-data" class="input-group row">
                    <input type="file" name="file" class="form-control text-dark" accept=".jpg, .jpeg, .png" />
                    <button type="submit" name="photo" class=" col-3 btn btn-primary">Update</button>
                </form><br>
            </div>
        </div>
    </div>

    <!--Update Staff Profile modal-->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <form method="post" action="Admin2.php" class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $_SESSION['username']; ?>'s Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body container">
                    <div class="input-group row">
                        <span class="input-group-text col-3">Name</span>
                        <input class="form-control" type="text" name="name" value="<?php echo $store['name']; ?>"
                            placeholder="Enter Name"><br><br>
                    </div><br>

                    <div class="input-group row">
                        <span class="input-group-text col-3">Mobile</span>
                        <input class="form-control" type="number" id="mobile" name="mobile"
                            value="<?php echo $store['mobile']; ?>" placeholder="Enter Mobile Number"><br><br>
                    </div>
                    <p id="mobile-error" class="error-message text-danger"></p><br>

                    <div class="input-group row">
                        <span class="input-group-text col-3">E-mail</span>
                        <input class="form-control" type="text" name="email" id="email"
                            value="<?php echo $store['email']; ?>" placeholder="Enter E-Mail"><br><br>
                    </div>
                    <p id="error-message" class="error-message text-danger"></p><br>


                    <div class="input-group row">
                        <span class="input-group-text col-3">Address</span>
                        <input class="form-control" type="text" name="address" value="<?php echo $store['address']; ?>"
                            placeholder="Enter address"><br><br>
                    </div><br>

                    <div class="input-group row">
                        <span class="input-group-text col-3">Graduation</span>
                        <input class="form-control" type="text" name="graduation"
                            value="<?php echo $store['graduation']; ?>" placeholder="Enter Graduation"><br><br>
                    </div><br>

                    <div class="input-group row">
                        <span class="input-group-text col-3">PG</span>
                        <input class="form-control" type="text" name="postgraduation"
                            value="<?php echo $store['postgraduation']; ?>" placeholder="Enter Post Graduation"><br><br>
                    </div><br>

                    <div class="input-group row">
                        <span class="input-group-text col-3">PhD</span>
                        <input class="form-control" type="text" name="phd" value="<?php echo $store['phd']; ?>"
                            placeholder="Enter PhD"><br>
                    </div><br>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="admin" id="admin" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
    <script>
    var email = document.getElementById('email');
    var mobile = document.getElementById('mobile');
    var errorMsg = document.getElementById('error-message');
    var mobileError = document.getElementById('mobile-error');
    var submit = document.getElementById('admin');

    email.addEventListener('input', function() {
        var value = email.value;
        var atSymbol = value.indexOf('@');
        var dotSymbol = value.indexOf('.');
        var dotlast = value.lastIndexOf('.');
        var spaceSymbol = value.indexOf(' ');

        if (
            atSymbol !== -1 &&
            atSymbol !== 0 &&
            dotSymbol !== -1 &&
            dotSymbol !== 0 &&
            dotlast > atSymbol &&
            value.length > dotlast &&
            spaceSymbol === -1
        ) {
            errorMsg.innerHTML = '';
        } else {
            errorMsg.innerHTML = 'Please enter a valid email address.';
        }
        validateSubmitButton();
    });

    mobile.addEventListener('input', function() {
        var mob = mobile.value;
        if (mob.length === 10) {
            mobileError.innerHTML = '';
        } else {
            mobileError.innerHTML = 'Please enter a valid 10-digit number.';
        }
        validateSubmitButton();
    });

    function validateSubmitButton() {
        // Enable the submit button only if both email and mobile are valid
        submit.disabled = errorMsg.innerHTML !== '' || mobileError.innerHTML !== '';
    }
    </script>
</body>

</html>