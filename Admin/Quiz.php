<?php include 'Quiz2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage  <?php echo ucfirst($_SESSION['quiz']); ?></title>
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

.form-control:focus, .form-select:focus {
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
</nav><br><br><br><br><br>

<!--Add course content box-->
<form action="Quiz2.php" method="post" class="container shadow-lg bg-dark rounded p-5">
  <h1 class="text-light"><?php echo ucfirst($_SESSION['quiz']); ?> </h1><br>
      <?php if($_SESSION['question']=='Yes'){?>
        <div class="alert alert-success alert-dismissible">
          <strong>Success!</strong> Question Added Successfully.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['question']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div><?php }?>
      <?php if($_SESSION['question']=='No'){?>
        <div class="alert alert-danger alert-dismissible">
          <strong>Alert!</strong> Question Not Added.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['question']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php }?>
      <div class="input-group row">
        <span class="input-group-text col-3">Question</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="question" placeholder="Enter Question" required><br><br>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-2">Option A</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optiona" placeholder="Enter Option A" required>
        <span class="col-1">Option A</span>
        <span class="input-group-text col-2">Option B</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optionb" placeholder="Enter Option B" required>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-2">Option C</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optionc" placeholder="Enter Option C" required>
        <span class="col-1">Option A</span>
        <span class="input-group-text col-2">Option D</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optiond" placeholder="Enter Option D" required>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-2">Answer</span>
        <select class="form-select col-3 bg-dark text-light" name="ans" required>
            <option>Select option</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
        </select>
        <span class="col-5"></span>
        <button type="submit" class="btn btn-primary rounded col-2" name="insert" style="float:right;">Add Question</button><br>
      </div><br>
      
</form><br><br>


<!--Update delete course content-->
<form action="Quiz2.php" method="post">
<div class="container rounded bg-dark text-light shadow-lg p-5">
  <h1>Quiz :</h1>
    <?php
    $name=$_SESSION['quizname'];
    $getSQL="SELECT *FROM $name;";
    $resultget = mysqli_query($con,$getSQL);
    $num=1;
    while($rowshow = mysqli_fetch_array($resultget))
    {
      $i=$rowshow['id'];
      ?>
    <hr>
    <div class="container-fluid bg-dark p-5 rounded shadow-lg">
    <div class="input-group row">
        <span class="input-group-text col-3">Question <?php echo $num; ?></span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="question<?php echo $i; ?>" value="<?php echo $rowshow['question'] ?>" placeholder="Enter Question" required><br><br>
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-2">Option A</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optiona<?php echo $i; ?>" value="<?php echo $rowshow['optiona'] ?>" placeholder="Enter Option A">
        <span class="col-1"></span>
        <span class="input-group-text col-2">Option B</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optionb<?php echo $i; ?>" value="<?php echo $rowshow['optionb'] ?>" placeholder="Enter Option B">
      </div><br>  

      <div class="input-group row">
        <span class="input-group-text col-2">Option C</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optionc<?php echo $i; ?>" value="<?php echo $rowshow['optionc'] ?>" placeholder="Enter Option C">
        <span class="col-1"></span>
        <span class="input-group-text col-2">Option D</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="optiond<?php echo $i; ?>" value="<?php echo $rowshow['optiond'] ?>" placeholder="Enter Option D">
      </div><br>

      <div class="input-group row">
        <span class="input-group-text col-2">Answer</span>
        <input class="form-control col-3 bg-dark text-light" type="text" name="ans<?php echo $i; ?>" value="<?php echo $rowshow['ans'] ?>" placeholder="Enter Option D">
        <span class="col-3"> </span>
          <button type="button" class="btn btn-danger rounded col-2" data-bs-toggle="modal" data-bs-target="#delete<?php echo $i; ?>">Delete</button>&nbsp;&nbsp;
          <button type="submit" class="btn btn-primary rounded col-2" name="update<?php echo $rowshow['id']; ?>">Update</button><br>
      </div><br>
    </div>
    <?php $num +=1; }
    ?>

<?php
    $name=$_SESSION['quizname'];
    $getSQL="SELECT *FROM $name;";
    $resultget = mysqli_query($con,$getSQL);
    while($rowshow = mysqli_fetch_array($resultget))
    {
      $i=$rowshow['id'];
      ?>
<!--delete course content modal-->
<div class="modal text-dark" id="delete<?php echo $i; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Delete Selected Question</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body">
       <p>Are You Sure You want to <b class="text-danger">DELETE</b> <?php echo $rowshow['question']; ?> permanantly. <br> This action can't be <b class="text-danger">UNDO</b>. </p>
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