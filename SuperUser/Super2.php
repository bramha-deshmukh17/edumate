<?php
session_start();
error_reporting(0);

date_default_timezone_set("Asia/Calcutta") ;

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

//super admin login
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT *FROM super WHERE username='$username' AND password='$password';";
  $que = mysqli_query($con, $sql);
  if(mysqli_num_rows($que)>0)
  {
    $_SESSION['login'] = "Yes";
    echo "<script>window.open('Super.php','_self')</script>";
  }
  else
  {
    $_SESSION['login'] = "No";
    echo "<script>window.open ('SuperLogin.php','_self')</script>";
  }

}

//staff profile create
if(isset($_POST['create']))
{
    
    $sql1 = "SELECT *FROM staff;";
    $result1 = mysqli_query($con, $sql1);
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $pass1=$_POST['password1'];
    $sql = 'SELECT *FROM staff ORDER BY empid DESC LIMIT 1;';
    $que = mysqli_query($con, $sql);
    $result=mysqli_fetch_assoc($que);
    $id=$result['empid']+1;
    $count=0;

    if($pass==$pass1)
    {
      while($row=mysqli_fetch_assoc($result1))
      {
        if($row['username']==$uname)
        {
          $count=$count+1;
        }
      }
      if($count==0)
      {
        $_SESSION['create']="Yes";
        $qry="INSERT INTO staff(empid, username, password) VALUES ('$id','$uname','$pass');";
        $sql=mysqli_query($con, $qry);
        echo "<script>window.open('Super.php','_self')</script>";
      }
      else
      {
        $_SESSION["sameuname"]= "Yes";
        echo "<script>window.open('Super.php','_self')</script>";
      }
    }
    else
    {
        $_SESSION['create']="No";
        echo "<script>window.open('Super.php','_self')</script>";
    }
}

//staff profie delete

$sql = "SELECT *FROM staff;";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{
  $id=$row["empid"];
  if(isset($_POST["delete".$id]))
  {
    $sql = "DELETE FROM staff WHERE empid='$id';";
    $run=mysqli_query($con, $sql);
    echo "<script>window.open('Viewstaff.php','_self')</script>";
  }
}

//super password change
if(isset($_POST['change']))
{
  $password=$_POST['new'];
  $oldpassword = $_POST['old'];

  $sql = "SELECT *FROM super WHERE username='super' AND password='$oldpassword';";
  $que = mysqli_query($con, $sql);
  if (mysqli_num_rows($que) > 0) 
  {
    $sql2 = "UPDATE super SET password='$password' WHERE username='super';";
    if (mysqli_query($con, $sql2)) 
    {
      $_SESSION['superpassup']="Yes";
      echo "<script>window.open('Super.php','_self')</script>";
    }
  }
  else
  {
    $_SESSION['superpassup']="No";
    echo "<script>window.open('Super.php','_self')</script>";
  }
}

?>