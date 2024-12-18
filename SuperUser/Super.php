<?php include 'Super2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Super Admin</title>
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

/*Login Box start*/
.box 
{
  padding:20px;
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
  color: whitesmoke;
}
 
.box h2 
{
  padding: 0;
  text-align: center;
  font-size: 36px;
  font-weight: bolder;
}

/*type input*/
.input i {
   position: absolute;
}
.input 
{
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
.input-field 
{
  margin-left: 0 !important;
  width: 100%;
  padding: 10px;
  padding-left: 35px;
  font-size: 20px;
  font-weight: 500;
  background-color: transparent;
  border:none;
  border-bottom: 1px solid whitesmoke; 
  caret-color: whitesmoke;
}
.input-field:hover,.input-field:focus,.input-field::after,.input-field:active
{
  border:none !important;
  outline:none !important;
  border-bottom: 1px solid whitesmoke !important; 
  animation-name:place;
}
.input-field::placeholder{color: whitesmoke;}
input:focus::-webkit-input-placeholder 
{
    font-size: .75em;
    position: absolute;
    top: -2px; 
    transition:all 0.5s ease 0s;
}
input[type="text"],input[type="password"]{color: whitesmoke;}
input::-webkit-input-placeholder {
    transition:all 0.2s ease 0s;
}

#login
{ 
  justify-content: center;
  width: 60%;
  margin-left: 20%;
  outline:none;
  font-weight: bolder;
  background: rgba(255, 255, 255, 0);
  backdrop-filter: blur(10px);
  border: 1px solid rgb(255, 255, 255);
  border-radius: 1rem;
  padding: 1rem;
  color: whitesmoke;
}
#login:hover
{
  transition: all 0.5s ease 0s;
  letter-spacing: 3px;
}

ul li:nth-child(5)
{float: right !important; right:0;}
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
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="SuperContact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ViewStaff.php">View Staff</a>
      </li>
      <li class="nav-item">
        <button type="button" class="nav-link btn" data-bs-toggle="modal" data-bs-target="#myModal">Change Password</button>
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


<!--Change password modal-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <form method="post" action="Super2.php" class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <input type="password" class="form-control" id="pass1" style="color: #000" name="old" placeholder="Enter Old Password"><br>
        <input type="password" class="form-control" id="pass" style="color: #000" name="new" placeholder="Enter New Password">
      </div>

      <div class="modal-footer">
        <input type="checkbox" class="form-check-input" style="float:left;" onclick="Toggle1()"/>&nbsp;Show Password 
        &nbsp;<button type="submit" name="change" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </form>
  </div>
</div>

<div class="container box">
        
<!--Admin password alerts-->
<div class="container" >
  <div class="row">
      
      <?php if($_SESSION['superpassup']=='Yes'){?>
        <div class="alert alert-success alert-dismissible">
          <strong>Success!</strong> Password Updated Successfully.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['superpassup']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div><?php }?>
      <?php if($_SESSION['superpassup']=='No'){?>
        <div class="alert alert-danger alert-dismissible">
          <strong>Alert!</strong> Invalid old password.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['superpassup']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php }?>

  </div>
</div>

    <br><h2 style="color: whitesmoke;" align="left">Create Admin Profile</h2><br>
            
    <form method="post" action="Super2.php">
      <div class="container">
        <div class="input">
            <i class="fa-solid fa-user icon"></i>
            <input type="text" class="input-field" name="username" placeholder="Username" required>
        </div><br>
        
        <div class="input">
          <i class="fa-solid fa-lock icon"></i>
          <input type="password" class="input-field" name="password" id="password" placeholder="Password" required>
        </div><br>

        <div class="input">
          <i class="fa-solid fa-lock icon"></i>
          <input type="password" class="input-field" name="password1" id="password1" placeholder="Password" required>
        </div>
      </div><br>
        <?php if($_SESSION['create']=='Yes'){?>
            <div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Admin Profile Created
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['create']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div>
        <?php }?>
        <?php if($_SESSION['create']=='No'){?>
            <div class="alert alert-danger alert-dismissible">
                <strong>Alert!</strong> Both Password Should be Same
                <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['create']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
            </div>
        <?php }?>
        <?php if($_SESSION['sameuname']=='Yes'){?>
        <div class="alert alert-danger alert-dismissible">
          <strong>Alert!</strong> Username already taken.
          <button type="button" class="btn" data-bs-dismiss="alert" style="float: right;" onclick="<?php $_SESSION['sameuname']=''; ?>"><i class="fa-solid fa-xmark"></i></button>
        </div><?php }?>
        
      <div class=" container-fluid justify-content-center" align="center" style="transform: translate(-10px,0);">
        <input type="checkbox" name="checkA" class="form-check-input" id="checkA" onclick="Toggle()"/>
        <label for="checkA" style="color: whitesmoke;">Show Password</label>
      </div><br>
      <input type="submit" class="container-fluid" name="create" value="Create" id="login">
    </form>
  </div>
</div>

<script>
function Toggle() {
    var temp = document.getElementById("password");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
    var temp = document.getElementById("password1");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}
function Toggle1() {
    var temp = document.getElementById("pass");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
    var temp = document.getElementById("pass1");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}
</script>

</body>
</html>