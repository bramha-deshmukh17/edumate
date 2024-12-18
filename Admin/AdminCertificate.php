<?php include 'Admin2.php'; ?>

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
                            <ul class="dropdown-menu shadow-lg">
                                <li><a class="dropdown-item" href="AdminProfile.php">Profile</a></li>
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

    <div class="container">
        <form action="Admin2.php" method="post">
            <table class="table table-hover table-dark text-center table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
                <?php
        $sql="SELECT *FROM certificate;";
        $run=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($run))    
        { ?>

                <tr>
                    <td><?php echo $row['certificateid']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['coursename']; ?></td>
                    <td><?php echo $row['percentage']; ?></td>
                    <td>
                        <button type="submit" class="btn btn-primary"
                            name="a<?php echo $row['certificateid']; ?>">Approve</button>
                        <button type="submit" class="btn btn-danger"
                            name="d<?php echo $row['certificateid']; ?>">Decline</button>
                    </td>
                </tr>

                <?php }
        if(mysqli_num_rows($run)<=0)
        {
          echo "<tr><td colspan='5' class='text-center p-3'>No pending certificate requests.</td></tr>";
        }
    ?>
            </table>
        </form>
    </div>

</body>

</html>