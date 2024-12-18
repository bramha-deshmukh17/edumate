<?php

session_start();
error_reporting(0);

$coursename=$_SESSION['coursename'];

$con=mysqli_connect("localhost","root","","edumate");
if(!$con) {die("Can't reach to server right now try again later");}


//insert course content
if(isset($_POST['insert']))
{
    $description=$_POST['description'];
    $link=$_POST['link'];
    $heading=$_POST['heading'];
    $courseName=$_SESSION['coursename'];
    $courseID=0;

    //create course cotent id
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
        $courseID=$_SESSION['courseID']."001";
    }

    $file2=$_FILES['vid'];
    $fname2=$file2['name'];
    $tmp2=$file2['tmp_name'];
    $destination1="Courses/".$fname2;
    move_uploaded_file($tmp2, $destination1);//Move uploaded file

    $file=$_FILES['notes'];
    $fname=$file['name'];
    $tmp=$file['tmp_name'];
    $destination2="Courses/".$fname;
    move_uploaded_file($tmp, $destination2);//Move uploaded file

    $sql1="INSERT INTO $courseName (id, heading, link, video, file, description) VALUES ('$courseID','$heading','$link','$destination1','$destination2','$description');";
    $result1 = mysqli_query($con, $sql1);
    if($result1)
    { $_SESSION['content']="Yes";}
    else{ $_SESSION["content"]= "No";}

    echo "<script>window.open('Manage.php','_self')</script>";
}

//delete course content
$query="SELECT *FROM $coursename;";
$result1 = mysqli_query($con, $query);
while( $show=mysqli_fetch_assoc($result1) )
{
    $contentid=$show["id"];
    if(isset( $_POST["delete".$contentid]))
    {
        $sql2= "DELETE FROM $coursename WHERE id='$contentid';";
        $result2 = mysqli_query($con, $sql2);

        echo "<script>window.open('Manage.php','_self')</script>";
    }
}

//update course content
$query1="SELECT *FROM $coursename;";
$result2 = mysqli_query($con, $query1);
while( $showup=mysqli_fetch_assoc($result2) )
{
    $contentid=$showup["id"];
    if(isset($_POST['update'.$contentid]))
    {
        $description=$_POST['description'.$contentid];
        $link=$_POST['link'.$contentid];
        $heading=$_POST['heading'.$contentid];

        $file1=$_FILES['vid'.$contentid];
        $fname1=$file1['name'];
        $tmp1=$file1['tmp_name'];
        $destination1="Courses/".$fname1;
        move_uploaded_file($tmp1, $destination1);//Move uploaded file

        $file2=$_FILES['notes'.$contentid];
        $fname2=$file2['name'];
        $tmp2=$file2['tmp_name'];   
        $destination2="Courses/".$fname2;
        move_uploaded_file($tmp2, $destination2);//Move uploaded file

        $sqlqry="UPDATE $coursename SET heading='$heading', link='$link', video='$destination1', file='$destination2', description='$description'  WHERE id='$contentid';";
        $resultqry=mysqli_query($con, $sqlqry);

        echo "<script>window.open('Manage.php','_self')</script>";
    }
}
?>