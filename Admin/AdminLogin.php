<?php include 'Admin2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
</head>

<style>
a {
    text-decoration: none !important;
}

.nav-link,
.nav-link:hover,
.nav-link:active {
    color: #fff !important;
    font-size: 1.2rem;
}

body {
    background: linear-gradient(to bottom, #3498db, #ffffff) no-repeat;
    background-attachment: fixed;
    font-family: Arial !important;
}

#background-video {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    position: fixed;
    margin: 0;
    z-index: -1;
}

/*Name start*/
.name {
    font-family: 'Algerian';
    height: 80px;
    display: flex;
    background-color: transparent;
    justify-content: center;
    align-items: center;
    font-size: 40px;
    margin: 0;
    color: skyblue;
    text-shadow: 1px 1px 15px rgb(0, 166, 255), 0 0 25px rgb(0, 166, 255);
    animation: animatee 1.5s linear infinite;
    pointer-events: none;
    user-select: none;
    border: 1px solid transparent;
}

@keyframes animatee {
    0% {
        filter: hue-rotate(0deg);
    }

    100% {
        filter: hue-rotate(360deg);
    }
}

/*Login Box start*/
.box {
    padding: 20px;
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 30rem;
    background: #000;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 1rem;
    padding: 1.5rem;
    z-index: 10;
    color: whitesmoke;
}

.box h2 {
    padding: 0;
    text-align: center;
    font-size: 36px;
    font-weight: bolder;
}

/*type input*/
.input i {
    position: absolute;
}

.input {
    width: 80%;
    margin-bottom: 10px;
    margin-left: 10%;
}

.icon {
    padding: 15px;
    color: whitesmoke;
    text-align: left;
    padding-left: 10px;
    padding-top: 4.0%;
}

.input-field {
    margin-left: 0 !important;
    width: 100%;
    padding: 10px;
    padding-left: 35px;
    font-size: 20px;
    font-weight: 500;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid whitesmoke;
    caret-color: whitesmoke;
}

.input-field:hover,
.input-field:focus,
.input-field::after,
.input-field:active {
    border: none !important;
    outline: none !important;
    border-bottom: 1px solid whitesmoke !important;
    animation-name: place;
}

.input-field::placeholder {
    color: whitesmoke;
}

input:focus::-webkit-input-placeholder {
    font-size: .75em;
    position: absolute;
    top: -2px;
    transition: all 0.5s ease 0s;
}

input[type="text"],
input[type="password"] {
    color: whitesmoke;
}

input::-webkit-input-placeholder {
    transition: all 0.2s ease 0s;
}

#login {
    justify-content: center;
    width: 60%;
    margin-left: 20%;
    outline: none;
    font-weight: bolder;
    background: rgba(255, 255, 255, 0);
    backdrop-filter: blur(10px);
    border: 1px solid rgb(255, 255, 255);
    border-radius: 1rem;
    padding: 1rem;
    z-index: 10;
    color: whitesmoke;
}

#login:hover {
    transition: all 0.5s ease 0s;
    letter-spacing: 3px;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}
</style>

<body>

    <nav class="navbar navbar-expand-lg sticky" style="background-color: #000;z-index:100;">
        <a class="navbar-brand" href="#" style="margin-left:5%;"><img src="../Edumate.png" width="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
        </div>
    </nav><br><br><br>

    <div class="container box">

        <br>
        <h2 style="color: whitesmoke;" align="left">Staff Log in</h2><br>

        <form method="post" action="Admin2.php">
            <div class="container">
                <div class="input">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" class="input-field" name="username" placeholder="Username" required>
                </div><br>

                <div class="input">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" class="input-field" name="password" id="pass" placeholder="Password"
                        required>
                </div>
            </div><br>
            <?php if($_SESSION['adminlogin']=='No'){?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong> Wrong Login credentials...
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['adminlogin']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <?php }?>

            <div class=" container-fluid justify-content-center" align="center" style="transform: translate(-10px,0);">
                <input type="checkbox" name="checkA" class="form-check-input" id="checkA" onclick="Toggle()" />
                <label for="checkA" style="color: whitesmoke;">Show Password</label>
            </div><br>
            <input type="submit" class="container-fluid" name="submit" value="Log In" id="login">
        </form>
    </div>
    </div>

    <script>
    function Toggle() {
        var temp = document.getElementById("pass");
        if (temp.type === "password") {
            temp.type = "text";
        } else {
            temp.type = "password";
        }
    }
    </script>

</body>

</html>