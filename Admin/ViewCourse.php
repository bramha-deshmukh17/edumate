<?php include 'Course2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Courses</title>
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
    text-align: center;
    background-color: transparent;
}

.none:hover {
    border: none;
    pointer-events: none;
}

.form-control:focus,
.form-select:focus {
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
                            <ul class="dropdown-menu shadow-lg" aria-labelledby="navbarDropdown">
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

    <div class="container shadow-lg p-5 bg-dark text-light rounded">
        <h2>Create Course</h2>
        <?php if($_SESSION['createcourse']=='Yes'){?>
        <div class="alert alert-success alert-dismissible">
            <strong>Success!</strong> Course Added Successfully.
            <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                onclick="<?php $_SESSION['createcourse']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div><?php }?>
        <?php if($_SESSION['createcourse']=='No'){?>
        <div class="alert alert-danger alert-dismissible">
            <strong>Alert!</strong> Try Another Name for course.
            <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;"
                onclick="<?php $_SESSION['createcourse']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <?php }?>
        <form action="Course2.php" method="post" class="p-3 row">
            <input type="text" name="coursename" class="form-control m-1 bg-dark text-light"
                placeholder="Enter Course Name" required>
            <textarea placeholder="Description" class="form-control m-1 bg-dark text-light" name="description"
                required></textarea>
            <button type="submit" class="btn col-3 m-1 btn-primary" name="new">Create Course</button>
        </form><br><br>
        <h2>Courses</h2>
        <table class="table table-striped text-center table-dark text-light table-hover">
            <form action="Course2.php" method="post">
                <!--Don't delete-->
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Public</th>
                    <th>Actions</th>
                </tr>

                <?php
      $sql="SELECT *FROM courses;";
      $run=mysqli_query($con,$sql);
      while($row=mysqli_fetch_array($run))
      {
        $i=$row['id'];
        echo"<tr style='vertical-align:middle;' class='text-center'><td>".$i."</td>
             <td><input type='text' class='none text-light' name='coursename".$i."' value='".$row['name']."' /></td>
             <td><button type='submit' name='visible".$i."' class='btn btn-primary'>".$row['visible']."</button></td>
             <td><button type='submit' name='view".$i."' class='btn btn-primary'>Manage Course</button>&nbsp
             <button type='submit' name='quiz".$i."' class='btn btn-success'>Quiz</button>&nbsp;
             <button type='button' data-bs-toggle='modal' data-bs-target='#delete".$i."' class='btn btn-danger'>Delete</button></td></tr>";
        ?>

                <!--delete course modal-->
                <div class="modal text-dark" id="delete<?php echo $i; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Delete Selected Course</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Are You Sure You want to <b class="text-danger">DELETE
                                        &nbsp;<?php echo $row['name']; ?></b> permanantly. <br> This action can't be <b
                                        class="text-danger">UNDO</b>. </p>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="delete<?php echo $i; ?>" class="btn btn-danger"><i
                                        class="fa-solid fa-trash-can"></i> Yes, Delete</button>
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                            </div>

                        </div>
                    </div>

                    <?php }
      ?>
            </form>
        </table>
    </div>
    </div>

</body>

</html>