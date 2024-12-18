<?php  
session_start();
error_reporting(0);

$user=$_SESSION['username'];
$coursename=$_SESSION['coursename'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

$sql = 'SELECT *FROM courses;';
$que = mysqli_query($con, $sql);

//create course
if(isset($_POST["new"]))
{
    $course2=$_POST['coursename'];
    $summary=$_POST['description'];
    $sql2 = 'SELECT *FROM courses ORDER BY id DESC LIMIT 1;';
    $que2 = mysqli_query($con, $sql2);
    $result2=mysqli_fetch_assoc($que2);
    $id2=$result2['id']+1;

    try
    {
        $sql1="CREATE TABLE $course2 (id int, heading varchar(30), link varchar(200), video varchar(200), file varchar(100), description varchar(500));";
        $run1=mysqli_query($con, $sql1);
        $_SESSION['createcourse']="Yes";

        $sql = "INSERT INTO courses(id, name, summary, visible) VALUES ('$id2','$course2','$summary', 'False')";
        $run=mysqli_query($con, $sql);

        $quiz=$course2."_quiz";
        $sql="CREATE TABLE $quiz (id int, question varchar(250), optiona varchar(100), optionb varchar(150), optionc varchar(150), optiond varchar(150), ans varchar(10));";
        $run1=mysqli_query($con, $sql);

        echo "<script>window.open('ViewCourse.php','_self')</script>";
    }
    catch(Exception $e)
    {
        $_SESSION['createcourse']="No";
        echo "<script>window.open('ViewCourse.php','_self')</script>";
    }    
}

//delete course
while($row=mysqli_fetch_assoc($que))
{
    $id=$row["id"];
    
    if(isset($_POST["delete".$id]))
    {
        
        $course=strtolower($row["name"]);
        $sql = "DELETE FROM courses WHERE id='$id';";
        $run1=mysqli_query($con, $sql);

        $sql2= "DROP TABLE $course";
        $run2=mysqli_query($con, $sql2);

        $course=$course."_quiz";
        $sql="DROP TABLE $course;";
        $run2=mysqli_query($con, $sql);

        echo "<script>window.open('ViewCourse.php','_self')</script>";
    }

}

//view course
$viewsql="SELECT *FROM courses;";
$view=mysqli_query($con, $viewsql);
while($show=mysqli_fetch_assoc($view))
{
    if(isset( $_POST["view".$show["id"]]))
    {
        $_SESSION["courseID"]=$show['id'];
        $_SESSION['coursename']= strtolower($_POST['coursename'.$show["id"]]);
        echo "<script>window.open('Manage.php','_self')</script>";
    }
}

//view quiz
$viewsql="SELECT *FROM courses;";
$view=mysqli_query($con, $viewsql);
while($show=mysqli_fetch_assoc($view))
{
    if(isset( $_POST["quiz".$show["id"]]))
    {
        $_SESSION["quiz"]=$show['name']." Quiz";
        $_SESSION['quizname']=$show['name']."_quiz";
        echo "<script>window.open('Quiz.php','_self')</script>";
    }
}

//visibility of course
$sql = 'SELECT *FROM courses;';
$que = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($que))
{
    $id=$row["id"];
    
    if(isset($_POST["visible".$id]))
    {
        $visible=$row["visible"];

        if($visible== "True")
        {   $visible="False";}
        else
        {   $visible="True";} 

        $sql = "UPDATE courses SET visible='$visible' WHERE id='$id';";
        $run1=mysqli_query($con, $sql);

        echo "<script>window.open('ViewCourse.php','_self')</script>";
    }

}

//course progress

?>