<?php include '../Student/Student2.php';
include '../Student/Course.php';

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>Discussion Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
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

.custom {
    padding: 1%;
    background-color: #000;
    font-size: 20px;
}

.dropdown-menu {
    font-size: 20px;
    padding: 0;
}
</style>

<body>
    <!--BS 3-->
    <nav class="navbar sticky custom navbar-inverse">
        <div class="container-fluid ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding-top: 0;" href="#"><img src="../Edumate.png" width="50"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../Student.php" style="color: #fff !important;">Home</a>
                    </li>
                    <li>
                        <a href="../StuContact.php" style="color: #fff !important;">Contact</a>
                    </li>
                    <li>
                        <a href="../StuAbout.php" style="color: #fff !important;">About</a>
                    </li>
                    <li>
                        <a href="../StuCertificate.php" style="color: #fff !important;">Certifiate</a>
                    </li>
                    <li>
                        <a href="#" style="color: #fff !important;">Discussion Forum</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown"
                            style="background-color: transparent;border:none; color:#fff;margin-top:10%;"><?php echo $_SESSION['username']; ?>&nbsp;&nbsp;<i
                                class="fa-solid fa-user" style="color: #ffffff;"></i></button>
                        <ul class="dropdown-menu">
                            <li><a href="../StudentProfile.php">Profile</a></li>
                            <li><a href="../Landing.php">Logout</a></li>
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br><br>

    <!-- Modal -->
    <div id="ReplyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reply Question</h4>
                </div>
                <div class="modal-body">
                    <form name="frm1" method="post">
                        <input type="hidden" id="commentid" name="Rcommentid">
                        <div class="form-group">
                            <label for="usr">Write your name:</label>
                            <input type="text" class="form-control" name="Rname" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Write your reply:</label>
                            <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                        </div>
                        <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="container bg-dark text-light">

        <div class="panel panel-default" style="margin-top:50px">
            <div class="panel-body">
                <h3>Community forum</h3>
                <hr>
                <form name="frm" method="post">
                    <input type="hidden" id="commentid" name="Pcommentid" value="0">
                    <div class="form-group">
                        <label for="usr">Write your name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Write your question:</label>
                        <textarea class="form-control" rows="3" name="msg" required></textarea>
                    </div><br>
                    <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
        <br>

        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Recent questions</h4>
                <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                    <tbody id="record">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>