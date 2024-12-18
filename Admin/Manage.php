<?php include 'Course2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Course <?php echo ucfirst($_SESSION['coursename']); ?></title>
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

.form-control:focus {
  outline: none;
  box-shadow: none;
  border: 1px solid #ced4da ;
}

.sticky 
{
  position: fixed;
  top: 0;
  width: 100%;
}
</style>

<body>

<nav class="navbar navbar-expand-lg sticky" style="background-color: #000;z-index:100;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="Edumate.png" width="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
                <?php echo $_SESSION['username']; ?>&nbsp;&nbsp;<i class="fa-solid fa-user" style="color: #ffffff;"></i>
          </a>
          <ul class="dropdown-menu shadow-lg" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="AdminProfile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="AdminLogin.php">Logout</a></li>
          </ul>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav><br><br><br><br>

<!--Add course content box-->
<form action="Manage2.php" method="post" enctype="multipart/form-data" class="container shadow-lg bg-dark rounded p-5">
  <h1 class="text-light">Add <?php echo ucfirst($_SESSION['coursename']); ?> Content</h1><br>
      <?php if($_SESSION['content']=='Yes'){?>
        <div class="alert alert-success alert-dismissible">
          <strong>Success!</strong> Content Added Successfully.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['content']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div><?php }?>
      <?php if($_SESSION['content']=='No'){?>
        <div class="alert alert-danger alert-dismissible">
          <strong>Alert!</strong> Content Not Added.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['content']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php }?>
      <div class="input-group row">
        <span class="input-group-text col-3">Heading</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="heading" placeholder="Enter Heading" required><br><br>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-3">Youtube Link</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="link" placeholder="Enter Youtube Link"><br><br>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-3">Video File</span>
        <input class="form-control col-3 bg-dark text-light" type="file" name="vid" placeholder="Enter Video File">
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-3">Notes</span>
        <input class="form-control col-3 bg-dark text-light" type="file" name="notes" placeholder="Enter Notes">
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-3">Description</span>
        <textarea class="form-control col-3 bg-dark text-light" type="text" name="description" placeholder="Enter Description"></textarea><br><br>
      </div><br>
      <button type="submit" class="btn btn-primary shadow-none" name="insert" style="float:right;">Add Content</button><br>
</form><br><br>


<!--Update delete course content-->
<form action="Manage2.php" method="post" enctype="multipart/form-data">
<div class="container rounded shadow-lg p-5 bg-dark text-light">
  <h1>Course Content:</h1>
    <?php
    $name=$_SESSION['coursename'];
    $getSQL="SELECT *FROM $name;";
    $resultget = mysqli_query($con,$getSQL);
    while($rowshow = mysqli_fetch_assoc($resultget))
    {
      $i=$rowshow['id'];
      ?>
    <hr>
    <div class="container p-5 shadow-lg rounded bg-dark">
      <div class="input-group row">
        <span class="input-group-text col-3">Heading</span>
        <input class="form-control bg-dark text-light" type="text" name="heading<?php echo $i; ?>" value="<?php echo $rowshow['heading']; ?>" required><br><br>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-3">Description</span>
        <input class="form-control bg-dark text-light" type="text" name="description<?php echo $i; ?>" value="<?php echo $rowshow['description']; ?>"><br><br>
      </div><br>

      <div class="container">
        <div class="row">
          <div class="col-8 input-group" style="width:50%;height:5%;margin-top:5%;">
            <span class="input-group-text col-3">Youtube Link</span>
            <input class="form-control bg-dark text-light" type="text" name="link<?php echo $i; ?>" value="<?php echo $rowshow['link']; ?>"><br>
          </div>
          <div class="col-4">
            <iframe width="320" height="150" src="<?php echo $rowshow['link']; ?>"></iframe>
          </div>
        </div>
      </div><br>

      <div class="container">
        <div class="row">
          <div class="col-8 input-group" style="width:50%;height:5%;margin-top:5%;">
              <span class="input-group-text col-3">Notes</span>
              <input class="form-control bg-dark text-light" type="file" name="notes<?php echo $i; ?>">
          </div>
          <div class="col-4">
            <?php if($rowshow['file']!='Courses/') { ?>
              <embed width="320" height="150" src="<?php echo $rowshow['file']; ?>"> <?php } ?>
          </div>
        </div>
      </div><br>

      <div class="container">
        <div class="row">
          <div class="col-8 input-group" style="width:50%;height:5%;margin-top:5%;">
            <span class="input-group-text col-3">Video File</span>
            <input class="form-control bg-dark text-light" type="file" name="vid<?php echo $i; ?>">
          </div>
          <div class="col-4">
            <video width="320" height="150" controls style="margin-top:0 !important;padding-top:0 !important;">
              <source src="<?php echo $rowshow['video']; ?>" >
            </video>
          </div>
        </div>
      </div>

      <div class="row">
        <span class="col-7"></span>
        <button type="button" class="btn btn-danger col-2 shadow-none" data-bs-toggle="modal" data-bs-target="#delete<?php echo $i; ?>">Delete Content</button>&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary col-2 shadow-none" name="update<?php echo $rowshow['id'] ?>">Update Content</button><br>
      </div>
    </div>
    <?php  }
    ?>

<?php
    $name=$_SESSION['coursename'];
    $getSQL="SELECT *FROM $name;";
    $resultget = mysqli_query($con,$getSQL);
    while($rowshow = mysqli_fetch_array($resultget))
    {
      $i=$rowshow['id'];
      ?>

<!--delete course content modal-->
<div class="modal" id="delete<?php echo $i; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header text-dark">
        <h4 class="modal-title">Delete Selected Content</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body text-dark">
       <p>Are You Sure You want to <b class="text-danger">DELETE</b> <?php echo $rowshow['heading']; ?> permanantly. <br> This action can't be <b class="text-danger">UNDO</b>. </p>
      </div>

      <div class="modal-footer">
        <button type="submit" name="delete<?php echo $i; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Yes, Delete</button>
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
<?php }
    ?>
</form>

</body>
</html>