<?php  
session_start();
//error_reporting(0);

$user=$_SESSION['username'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

//View course
$sql = 'SELECT *FROM courses;';
$que = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($que))
{
    if(isset($_POST["view".$row['id']]))
    {
        $_SESSION['coursename']=$row['name'];
        echo "<script>window.open('StuExplore.php','_self')</script>";
    }
}

//Enroll course
$sql = 'SELECT *FROM courses;';
$que = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($que))
{
    if(isset($_POST["enroll".$row['id']]))
    {   
        $course=$_SESSION['coursename'];
        $table=$user."_courses";
        $sql="INSERT INTO $table (coursename, certificate) VALUES('$course', 'No');";
        $run=mysqli_query($con,$sql);

        $table=$course."_".$user;
        $create="CREATE TABLE $table (id varchar(10), heading varchar(50), status varchar(10));";
        $crt=mysqli_query($con,$create);

        $table=strtolower($course);
        $get="SELECT *FROM $table";
        $set=mysqli_query($con, $get);
        while($row2=mysqli_fetch_assoc($set))
        {
            $table=$course."_".$user;
            $id=$row2['id'];
            $heading=$row2['heading'];
            $insertqry="INSERT INTO $table (id, heading, status) VALUES('$id', '$heading', 'NULL');";
            $insert=mysqli_query($con,$insertqry);
        }
        echo "<script>window.open('Student.php','_self')</script>";
    }
}

//Learn course
$sql = "SELECT *FROM courses;";
$que = mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($que))
{
    if(isset($_POST["learn".$row['id']]))
    {
        $_SESSION['coursename']=$row['name'];
        $_SESSION['coursetable'] = $row['name'] . "_" . $user;
        echo "<script>window.open('Learn.php','_self')</script>";
    }
}


//Quiz
$viewsql="SELECT *FROM courses;";
$view=mysqli_query($con, $viewsql);
while($show=mysqli_fetch_assoc($view))
{
    if(isset( $_POST["quiz".$show["id"]]))
    {
        $_SESSION['quizname']=$show['name']." Quiz";
        $_SESSION['quiz']=$show['name']."_quiz";
        $_SESSION['coursename']=$show['name'];
        echo "<script>window.open('StudentQuiz.php','_self')</script>";
    }
}

// apply Certificate
if(isset($_POST['apply']))
{
    $course=$_SESSION['coursename'];
    $certificateid=date('YmdHis');
    $percentage=$_SESSION['percentage'];
    $que = "SELECT *FROM student WHERE username='$user';";
    $run1 = mysqli_query($con, $que);
    $result=mysqli_fetch_assoc($run1);
    $name=$result['name'];

    $table=$user."_courses";
    $que1 = "SELECT *FROM $table WHERE coursename='$course';";
    $run1 = mysqli_query($con, $que1);
    $result1=mysqli_fetch_assoc($run1);
    
    if($result1['certificate']!='Yes')
    {
        $sql="INSERT INTO certificate(username, name, certificateid, coursename, percentage) VALUES ('$user', '$name', '$certificateid', '$course', '$percentage');";
        $run=mysqli_query($con,$sql);
    }   
    
    $_SESSION['certificateerr']='';
    echo "<script>window.open('Student.php','_self')</script>";

}
?>