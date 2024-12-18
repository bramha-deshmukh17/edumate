<?php include 'Student2.php'; 
      include 'Course.php'; 

//show content
$table = $_SESSION['coursename'];
$getter = "SELECT *FROM $table;";
$runner = mysqli_query($con, $getter);
while ($row = mysqli_fetch_assoc($runner)) 
{
    $id = $row['id'];
    if (isset($_POST['d' . $id])) 
    {
        $_SESSION['contentid'] = $id;

        $table2 = $_SESSION['coursetable'];
        $ex = "SELECT *FROM $table2;";
        $exe = mysqli_query($con, $ex);
        while ($row2 = mysqli_fetch_assoc($exe)) 
        {
            if ($row2['status'] != "DONE") 
            {
                $sql = "UPDATE $table2 SET status='DONE' WHERE id='$id';";
                $run = mysqli_query($con, $sql);
            }    
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $_SESSION['coursename']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a54ad092.js" crossorigin="anonymous"></script>
    <script src="reload.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<style>

body
{
  background: linear-gradient(to bottom, #3498db, #ffffff) no-repeat;
  background-attachment: fixed;
  font-family: Arial !important;
}

div.btn
{
    border-radius: 0;
    width: 100%;
    text-align: left;
}

div.btn:hover
{
    opacity: 0.5;
}

::-webkit-scrollbar {
  width: 12px; /* width of the scrollbar */
}

::-webkit-scrollbar-thumb {
  background-color: #3498db; /* color of the scrollbar thumb */
  border-radius: 6px; /* round corners of the thumb */
}

::-webkit-scrollbar-track {
  background-color: #f1f1f1; /* color of the scrollbar track */
}

::-webkit-scrollbar-thumb:hover {
  background-color: #2980b9; /* color of the thumb on hover */
}
</style>

<body><br><br><br>

<form method="post" action="LearnFrame1.php">
    
<hr style="margin:0;border:1px solid #000;">
<?php 
$course=$_SESSION['coursename']."_".$user;
$sql="SELECT *FROM $course;";
$run=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($run))
{   $id=$row['id'];?>
    <div class="btn">
        <button type="submit" name="d<?php echo $id;?>" class="btn shadow-none"> <?php echo $row['heading'];?></button> 
        <?php if($row['status']=='DONE'){?>  <i class="fa-solid fa-check-double" title="Done"></i> <?php } ?>
        
    </div><hr style="margin:0;border:1px solid #000;">
<?php
} ?>

</form>

</body>
</html>