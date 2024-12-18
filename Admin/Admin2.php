<?php 

session_start();
error_reporting(0);
$user=$_SESSION['username'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

//admin login
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT *FROM staff WHERE username='$username' AND password='$password';";
  $que = mysqli_query($con, $sql);
  if(mysqli_num_rows($que)>0)
  {
    $_SESSION['username']=$username;
    echo "<script>window.open('Admin.php','_self')</script>";
  }
  else
  {
    $_SESSION['adminlogin'] = "No";
    echo "<script>window.open ('AdminLogin.php','_self')</script>";
  }

}

//photo update
if(isset($_POST["photo"]))
{
  $file=$_FILES['file'];
  $fname=$file['name'];
  $tmp=$file['tmp_name'];
  $destination="Upload/".$fname;
  move_uploaded_file($tmp, $destination);//Move uploaded file

  $upadmin="UPDATE staff SET img='$destination' WHERE username='$user';";
  $show=mysqli_query($con, $upadmin);

  echo "<script>window.open('AdminProfile.php','_self')</script>";
}

//Profile update
if(isset($_POST['admin']))
{
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $ug=$_POST['graduation'];
  $pg=$_POST['postgraduation'];
  $phd=$_POST['phd'];

  $upadmin="UPDATE staff SET name='$name',mobile='$mobile',email='$email',address='$address',graduation='$ug',postgraduation='$pg',phd='$phd' WHERE username='$user';";
  $show=mysqli_query($con, $upadmin);

  echo "<script>window.open('AdminProfile.php','_self')</script>";
}

//Change password
if(isset($_POST['change']))
{
  $password=$_POST['new'];
  $oldpassword = $_POST['old'];

  $sql = "SELECT *FROM staff WHERE username='$user' AND password='$oldpassword';";
  $que = mysqli_query($con, $sql);
  if (mysqli_num_rows($que) > 0) 
  {
    $sql2 = "UPDATE staff SET password='$password' WHERE username='$user';";
    if (mysqli_query($con, $sql2)) 
    {
      $_SESSION['passup']="Yes";
      echo "<script>window.open('Admin.php','_self')</script>";
    }
  }
  else
  {
    $_SESSION['passup']="No";
    echo "<script>window.open('Admin.php','_self')</script>";
  }
}

//certificate approve
$sql2="SELECT *FROM certificate;";
$run2=mysqli_query($con,$sql2);
while($row=mysqli_fetch_assoc($run2))
{
  $id=$row['certificateid'];
  if(isset($_POST['a'.$id]))
  {
    $table=strtolower($row['username']."_courses");
    $course=$row['coursename'];
    $sql1="UPDATE $table SET certificate='Yes', certificateno='$id' WHERE coursename='$course';";
    $run=mysqli_query($con, $sql1);

    $sql1="DELETE FROM certificate WHERE certificateid='$id';";
    $run=mysqli_query($con,$sql1);

    echo "<script>window.open('AdminCertificate.php','_self')</script>";
  }
}

$sql2="SELECT *FROM certificate;";
$run2=mysqli_query($con,$sql2);
//decline certificate
while($row1=mysqli_fetch_assoc($run2))
{
  $id=$row['certificateid'];
  if(isset($_POST['d'.$id]))
  {
    $table=strtolower($row['username']."_courses");
    $course=$row['coursename'];

    $sql1="DELETE FROM certificate WHERE certificateid='$id';";
    $run=mysqli_query($con,$sql1);

    echo "<script>window.open('AdminCertificate.php','_self')</script>";
  }
}
?>