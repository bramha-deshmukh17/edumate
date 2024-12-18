<?php

session_start();
error_reporting(0);

$coursename=$_SESSION['coursename'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}

$courseName=$_SESSION['coursename']."_quiz";


//insert question
if(isset($_POST['insert']))
{    
    $question=$_POST['question'];
    $a=$_POST['optiona'];
    $b=$_POST['optionb'];
    $c=$_POST['optionc'];
    $d=$_POST['optiond'];
    $ans=$_POST['ans'];
    $courseID=0;

    //create question id
    $sql = "SELECT *FROM $courseName;";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)!=0)
    {
        while( $show=mysqli_fetch_assoc($result) )
        {
            $courseId=$show['id'];
        }
        $courseID=$courseId+1;
    }
    else
    {
        $courseID=$_SESSION['courseID']."01";
    }

    $sql1="INSERT INTO $courseName(`id`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `ans`) VALUES ('$courseID','$question','$a','$b','$c','$d', '$ans');";
    $result1 = mysqli_query($con, $sql1);
    if($result1)
    { $_SESSION['question']="Yes";}
    else{ $_SESSION["question"]= "No";}

    echo "<script>window.open('Quiz.php','_self')</script>";
}

//delete question
$query="SELECT *FROM $courseName;";
$result1 = mysqli_query($con, $query);
while( $show=mysqli_fetch_assoc($result1) )
{
    $contentid=$show["id"];
    if(isset( $_POST["delete".$contentid]))
    {
        $sql2= "DELETE FROM $courseName WHERE id='$contentid';";
        $result2 = mysqli_query($con, $sql2);

        echo "<script>window.open('Quiz.php','_self')</script>";
    }
}

//update question
$query1="SELECT *FROM $courseName;";
$result2 = mysqli_query($con, $query1);
while( $showup=mysqli_fetch_assoc($result2) )
{
    $i=$showup["id"];
    if(isset($_POST['update'.$i]))
    {
        $question=$_POST['question'.$i];
        $a=$_POST['optiona'.$i];
        $b=$_POST['optionb'.$i];
        $c=$_POST['optionc'.$i];
        $d=$_POST['optiond'.$i];
        $ans=$_POST['ans'.$i];
        
        $sqlqry="UPDATE $courseName SET question='$question', optiona='$a', optionb='$b', optionc='$c', optiond='$d', ans='$ans' WHERE id='$i';";
        $resultqry=mysqli_query($con, $sqlqry);

        echo "<script>window.open('Quiz.php','_self')</script>";
    }
}
?>