<?php 

session_start();

$user=$_SESSION['username'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}


$course=$_SESSION['coursename']."_quiz";
if(isset($_POST['submit']))
{
    $count=0;$num=0;
    $sql="SELECT *FROM $course;";
    $run=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($run))
    {
        $answer=$_POST['a'.$row['id']];
        if($row['ans']==$answer)
        {
            $count=$count+1;
        }
        $num=$num+1;
    }

    $percentage=($count/$num)*100;
    $_SESSION['percentage']=$percentage;
    if($percentage>=75)
    {
        $_SESSION['certificateerr']="No";
        
    }
    else
    {
        $_SESSION['certificateerr']="Yes";
    }
    echo "<script>window.open('Student.php','_self')</script>";
}

?>