<?php include 'Super2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
</head>

<style>

body
{
  background: linear-gradient(to bottom, #3498db, #ffffff) no-repeat;
  background-attachment: fixed;
  font-family: Arial !important;
}

a{text-decoration: none !important;}

.nav-link,.nav-link:hover,.nav-link:active
{
    color: #fff !important;
    font-size: 1.2rem;
    margin-right: 1rem;
}

.img
{
  width: 20%;
  border-radius: 50%;
}

.form-control:focus
{
  outline: none;
  box-shadow: none;
  border: 1px solid #ced4da ;
}
.btn
{
  color: #fff !important;
}
</style>

<body>

<nav class="navbar navbar-expand-lg" style="background-color: #000;color:#fff;z-index:100;">
  <a class="navbar-brand" href="#"><img src="Edumate.png" width="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarSupportedContent">
    <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav container-fluid">
      <li class="nav-item">
        <a class="nav-link" href="Super.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="SuperContact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ViewStaff.php">View Staff</a>
      </li>
    </ul>
    <div class="d-flex" style="margin-right: 1rem;margin-top:0.5rem;">
        <ul style="list-style-type:none;padding-left:0 !important;margin-left: -1.5% !important;">
          <li class="nav-item" style="padding-left:0 !important;">
            <a class="nav-link" href="SuperLogin.php">Logout</a>
          </li>
        </ul>
      </div>
  </div>
</nav><br><br><br>

<div class="container shadow-lg bg-dark text-light p-5">
    <table class="table table-striped text-center table-dark table-hover">
        <tr>
            <th>Employee ID</th>
            <th>Username</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
        <?php
            $sql = "SELECT *FROM staff;";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0){
            while($row=mysqli_fetch_assoc($result)) 
            {
                $i=$row['empid'];
                echo '<tr>';
                echo '<td>'. $i.'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal'.$i.'">View Profile</button></td>';
                echo '<td><button type="button" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#modal'.$i.'">Delete</button></td>';
                echo '<tr>';
            }
          }
          else{
            echo '<tr><td colspan="4" class="text-center">No records found</td></tr>';
          }
        ?>
    </table>
    <?php
        $sql = "SELECT *FROM staff;";
        $result = mysqli_query($con, $sql);
        
        while($row=mysqli_fetch_assoc($result)) 
        { $i=$row['empid'];?>

<!--Delete staff modal-->
<div class="modal" id="modal<?php echo $i; ?>">
  <div class="modal-dialog">
    <form method="post" action="Super2.php" class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Delete Employee Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body">
       <p>Are You Sure You want to <b class="text-danger">DELETE</b> <?php echo $row['username']; ?>'s data permanantly. <br> This action can't be <b class="text-danger">UNDO</b>. </p>
      </div>

      <div class="modal-footer">
        <button type="submit" name="delete<?php echo $i; ?>" class="btn btn-danger" <?php if($i==1000){echo "disabled='true'";} ?>><i class="fa-solid fa-trash-can"></i> Yes, Delete</button>
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
      </div>

    </form>
  </div>
</div>

<!--View Staff modal-->
<div class="modal" id="myModal<?php echo $i; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><?php echo $row['username'];?>'s Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body container">
        <img src="<?php echo $row['img']; ?>" class="img"><br><br>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">Name</span>
            <input class="form-control" type="text" value="<?php echo $row['name']; ?>" readonly>
        </div>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">Mobile</span>
            <input class="form-control" type="text" value="<?php echo $row['mobile']; ?>" readonly><br><br>
        </div>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">E-mail</span>
            <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>" readonly><br><br>
        </div>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">Address</span>
            <input class="form-control" type="text" name="email" value="<?php echo $row['address']; ?>" readonly><br><br>
        </div>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">Graduation</span>
            <input class="form-control" type="text" name="email" value="<?php echo $row['graduation']; ?>" readonly><br><br>
        </div>        
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">PG</span>
            <input class="form-control" type="text" name="email" value="<?php echo $row['postgraduation']; ?>" readonly><br><br>
        </div>
        <div class="input-group row" style="margin-left: 0.1rem;">
            <span class="input-group-text col-3">PhD</span>
            <input class="form-control" type="text" name="email" value="<?php echo $row['phd']; ?>" readonly><br><br>
        </div>
      </div>

    </div>
  </div>
</div>

    <?php } ?>

</div>

</body>
</html>