<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
else
	{
if(isset($_POST['submit']))
{

$class_title=$_POST['class_title'];
$grade=$_POST['grade'];
$section=$_POST['section'];
$student_name=$_POST['student_name'];
$class_teacher_name=$_POST['class_teacher_name'];
  
$sql ="INSERT INTO tb_class(class_title, grade, section, student_name, class_teacher_name) 
VALUES(:class_title, :grade, :section, :student_name, :class_teacher_name)";

$query= $dbh -> prepare($sql);
$query-> bindParam(':class_title', $class_title, PDO::PARAM_STR);
$query-> bindParam(':grade', $grade, PDO::PARAM_STR);
$query-> bindParam(':section', $section, PDO::PARAM_STR);
$query-> bindParam(':student_name', $student_name, PDO::PARAM_STR);
$query-> bindParam(':class_teacher_name', $class_teacher_name, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$msg="Student Course Added, Successfully";
#echo "<script type='text/javascript'>alert('Class Added, Successfully!');</script>";
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Student Class</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Student Class </div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label">Class Title<span style="color:red">*</span></label>

	<div class="col-sm-4">
				<select name="class_title" class="form-control" required>
			    <option value="">Select Class </option>
				<?php
					$sql = "SELECT * from tb_classroom";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$result=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1; #initializing the counter for loopiing
				
					if($query->rowCount() > 0) #checking object rows
						{
						foreach($result as $classroomresult) #looping on the object rows
						{				
					?>
				<option value ="<?php echo ($classroomresult->Class_title); ?>"> <?php echo ($classroomresult->Class_title); ?> </option>	
				<?php $cnt=$cnt+1; }} ?>	 
				 </select>
	</div>

	<label class="col-sm-2 control-label">Grade<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="grade" class="form-control" style="text-transform: capitalize;" required">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Section<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="section" class="form-control" style="text-transform: capitalize;" required">
	</div>


	<label class="col-sm-2 control-label">Student<span style="color:red">*</span></label>
	<div class="col-sm-4">
				<select name="student_name" class="form-control" required>
			    <option value="">Select Student </option>
				<?php
					$sql = "SELECT * from tb_student";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$result=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1; #initializing the counter for loopiing
				
					if($query->rowCount() > 0) #checking object rows
						{
						foreach($result as $studentresult) #looping on the object rows
						{				
					?>
				<option value ="<?php echo ($studentresult->student_name); ?>"> <?php echo ($studentresult->student_name); ?> </option>	
				<?php $cnt=$cnt+1; }} ?>	 
				 </select>
	</div>

</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Class Teacher<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="class_teacher_name" class="form-control" style="text-transform: capitalize;" required">
	</div>

<!--
	<label class="col-sm-2 control-label">Student<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="Student" class="form-control" required">
	</div>	
	-->
</div>

<input type="hidden" name="editid" class="form-control" required">

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Add Student Class</button>
	</div>
</div>

</form>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>
</html>
