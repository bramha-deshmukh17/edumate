<?php include 'Student2.php'; 
      include 'Course.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo ucfirst($_SESSION['coursename']); ?></title>
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
.card,.card-header,.card-body
{border-bottom: 1px solid white;}
</style>
<body><br><br><br>

<form action="Course2.php" method="post">
<div class="container">
<?php 
$id=$_SESSION['contentid'];
$course=$_SESSION['coursename'];
$ex="SELECT *FROM $course WHERE id='$id';";
$exe=mysqli_query($con,$ex);
while($row=mysqli_fetch_assoc($exe))
{ ?>

<div class="card bg-dark text-light">
    <p class="card-header bg-dark text-light fw-bold"><?php echo $row['heading']; ?></p><br>
    <div class="card-body">
        <p><?php echo $row['description']; ?></p>
        <?php if($row['link']!='')
            { ?> <iframe width="320" height="150" src="<?php echo $row['link']; ?>"></iframe><br><br> <?php } ?>
        <?php if($row['video']!='')
            { ?> <video src="<?php echo $row['video']; ?>" width="320" height="150" controls></video> <?php } ?>
    </div>
    <?php if($row['file']!='')
            { ?> <p class="card-footer">Download notes <a href="<?php echo $row['file']; ?>" download>here</a></p><?php } ?>
    
</div>
<?php }
?>
</div>
</form>

</body>
</html>