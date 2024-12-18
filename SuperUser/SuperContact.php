<?php include 'Admin2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
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

/*pre box start*/
.menu
{
  margin-top: 5%;
  font-size: 18px;
  position: relative;
  background: #000;
  border-radius: 1rem;
  padding: 3rem;
  z-index: 10;
  color: whitesmoke;
}

.menu a
{
  text-decoration: none !important;
  color: #fff !important;
  margin: 5px;
}

.menu i
{
  border-radius: 25%;
  padding: 5px;
  width: 50px;
  display: inline-block;
  font-size: 35px;
}

.menu .face:hover
{
  color: #FFF;
  background-color: #3b5998;
  border-radius: 25%;
}

.menu .twit:hover
{
  color: #FFF;
  background-color: #3b5998;
  border-radius: 25%;
}

.insta:hover
{
  background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
  color: #FFF;
  border-radius: 25%;
}
/*pre box end*/

</style>

<body>

<nav class="navbar navbar-expand-lg" style="background-color: #000;z-index:100;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="Edumate.png" width="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="Super.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ViewStaff.php">View Staff</a>
        </li>
      </ul>
      <div class="d-flex" style="margin-right: 1rem;margin-top:0.5rem;">
        
        <ul>
            <li class="nav-item"><a class="nav-link" href="SuperLogin.php">Logout</a></li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav><br><br><br>

<pre class="container justify-content-center menu shadow-lg" align="center">
For further assistence call us at 9922466109
You can also e-mail us at <a href="mailto:bramhadeshmukh3@gmail.com">bramhadeshmukh3@gmail.com</a>
Our Social Media platforms :
<a href="https://www.facebook.com/bramha.deshmukh.58"><i class="fa-brands fa-facebook face" title="ID:bramha.deshmukh.58"></i></a><a href="https://twitter.com/deshmukh_bramha"><i class="fa-brands fa-twitter twit" title="ID:deshmukh_bramha"></i> </a><a href="https://www.instagram.com/bramha_deshmukh_17?r=nametag"><i class="fa-brands fa-instagram insta" title="ID:bramha_deshmukh_17"></i></a>
Developer's : AABP Pvt. Ltd.    
</pre>

</body>
</html>