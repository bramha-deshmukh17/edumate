<?php 

session_start();
error_reporting(0);
    
$user=$_SESSION['username'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

//student signup
if(isset($_POST['submit']))
{
    $count=0;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    if($password==$password2)
    {
        $qry="SELECT *FROM student;";
        $run=mysqli_query($con,$qry);
        while($row=mysqli_fetch_assoc($run))
        {
            if($row['username']==$username)
                $count+=1;
        }
        if($count==0)
        {
            $sql="INSERT INTO student(username, password) VALUES ('$username','$password');";
            $que=mysqli_query($con,$sql);

            $name=$username.'_courses';
            $sql2="CREATE TABLE $name (coursename VARCHAR(50) , progress VARCHAR(10), certificate VARCHAR(5), certificateno VARCHAR(20));";
            $create=mysqli_query($con,$sql2);

            $_SESSION['stdlogin'] = "Yes";
            echo "<script>window.open ('StudentSignup.php','_self')</script>";
            
        }
        else
        {
            $_SESSION['userexist']="Yes";
            echo "<script>window.open ('StudentSignup.php','_self')</script>";
        }
    }
    else
    {
        $_SESSION['stdlogin'] = "pass";
        echo "<script>window.open ('StudentSignup.php','_self')</script>";
    }
}

//student login
if(isset($_POST['Login']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT *FROM student WHERE username='$username' AND password='$password';";
  $que = mysqli_query($con, $sql);
  if(mysqli_num_rows($que)>0)
  {
    $_SESSION['username']=$username;
    echo "<script>window.open('Student.php','_self')</script>";
  }
  else
  {
    $_SESSION['stdlogin'] = "No";
    echo "<script>window.open ('StudentLogin.php','_self')</script>";
  }
}

//Profile update
if(isset($_POST['profile']))
{
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];

  $upadmin="UPDATE student SET name='$name', mobile='$mobile', email='$email' WHERE username='$user';";
  $show=mysqli_query($con, $upadmin);

  echo "<script>window.open('StudentProfile.php','_self')</script>";
}

//photo update
if(isset($_POST["photo"]))
{
  $file=$_FILES['file'];
  $fname=$file['name'];
  $tmp=$file['tmp_name'];
  $destination="Upload/".$fname;
  move_uploaded_file($tmp, $destination);//Move uploaded file

  $upadmin="UPDATE student SET img='$destination' WHERE username='$user';";
  $show=mysqli_query($con, $upadmin);

  echo "<script>window.open('StudentProfile.php','_self')</script>";
}

//Change password
if(isset($_POST['change']))
{
  $password=$_POST['new'];
  $oldpassword = $_POST['old'];

  $sql = "SELECT *FROM student WHERE username='$user' AND password='$oldpassword';";
  $que = mysqli_query($con, $sql);
  if (mysqli_num_rows($que) > 0) 
  {
    $sql2 = "UPDATE student SET password='$password' WHERE username='$user';";
    if (mysqli_query($con, $sql2)) 
    {
      $_SESSION['passup']="Yes";
      echo "<script>window.open('Student.php','_self')</script>";
    }
  }
  else
  {
    $_SESSION['passup']="No";
    echo "<script>window.open('Student.php','_self')</script>";
  }
}

?>