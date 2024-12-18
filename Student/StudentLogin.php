<?php include 'Student2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Login</title>
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
    padding: 1rem;
    z-index: 10;
    color: whitesmoke;
}

.box h2 {
    padding: 0;
    text-align: center;
    font-size: 30px;
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

/*Loading*/
#loading-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    animation: backgroun 3s ease-in-out infinite;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.ball {
    width: 20px;
    height: 20px;
    background-color: #00aaff;
    border-radius: 50%;
    margin: 0 10px;
    animation: bounce 1s ease-in-out 0.01s infinite;
    box-shadow: 0 5px 20px rgb(0, 0, 0);
}

.ball:nth-child(2) {
    animation-delay: 0.1s;
}

.ball:nth-child(3) {
    animation-delay: 0.2s;
}

@keyframes bounce {

    0%,
    20%,
    50%,
    80% {
        transform: translateY(0);
        filter: hue-rotate(0deg);
    }

    40% {
        transform: translateY(-30px);
        filter: hue-rotate(90deg);
    }

    60% {
        transform: translateY(-15px);
        filter: hue-rotate(180deg);
    }

    100% {
        transform: translateY(0);
        filter: hue-rotate(360deg);
    }
}

@keyframes backgroun {
    0% {
        background: rgb(0, 0, 0)
    }

    10% {
        background: rgba(0, 0, 0, 0.9);
    }

    20% {
        background: rgba(0, 0, 0, 0.8);
    }

    30% {
        background: rgba(0, 0, 0, 0.7);
    }

    40% {
        background: rgba(0, 0, 0, 0.6);
    }

    50% {
        background: rgba(0, 0, 0, 0.5);
    }

    60% {
        background: rgba(0, 0, 0, 0.4);
    }

    70% {
        background: rgba(0, 0, 0, 0.3);
    }

    80% {
        background: rgba(0, 0, 0, 0.2);
    }

    90% {
        background: rgba(0, 0, 0, 0.1);
    }

    100% {
        background: rgba(0, 0, 0, 0);
    }
}
</style>

<body onload="loading()">
    <div id="loading-container">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>

    <script>
    function loading() {
        setTimeout(function() {
            document.getElementById("loading-container").style.display = "none";
        }, 3000);
    }
    </script>

    <nav class="navbar navbar-expand-lg" style="background-color: #000;z-index:100;">
        <a class="navbar-brand" href="#" style="margin-left:5%;"><img src="../Edumate.png" width="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
        </div>
    </nav><br><br><br><br><br><br>

    <div class="container box">

        <br>
        <h2 style="color: whitesmoke;" align="left">Student Login</h2><br>

        <form method="post" action="Student2.php">
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

            <?php if($_SESSION['stdlogin']=='No'){?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong> Wrong Login Credentials
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                    onclick="<?php $_SESSION['stdlogin']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <?php }?>

            <div class=" container-fluid justify-content-center" align="center" style="transform: translate(-10px,0);">
                <input type="checkbox" name="checkA" class="form-check-input shadow-none" id="checkA"
                    onclick="Toggle()" />
                <label for="checkA" style="color: whitesmoke;">Show Password</label>
            </div><br>
            <input type="submit" class="container-fluid" name="Login" value="Login" id="login"><br><br>
            <p style="padding-left:20%">Not registered? Signup <a href="StudentSignup.php">Here</a></p>
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