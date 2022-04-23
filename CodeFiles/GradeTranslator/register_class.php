<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

$class_title=$_POST['class_title'];
$class_code=$_POST['class_code'];
$instructor_code=$_POST['instructor_code'];

  
$sql ="INSERT INTO tb_classroom(class_title, class_code, instructor_code) 
VALUES(:class_title, :class_code, :instructor_code)";

$query= $dbh -> prepare($sql);
$query-> bindParam(':class_title', $class_title, PDO::PARAM_STR);
$query-> bindParam(':class_code', $class_code, PDO::PARAM_STR);
$query-> bindParam(':instructor_code', $instructor_code, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Class Room Added, Successfully!');</script>";
}
else 
{
$error="Something went wrong. Please try again";
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

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        
</script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Add Class Room</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Class Title<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="class_title" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Class Code<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="class_code" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Instructor Code<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="instructor_code" class="form-control" id="instructor_code" required >
                            </div>

							<!--
                            <label class="col-sm-1 control-label">Designation<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="designation" class="form-control" required>
                            </div>
							-->
                            </div>

                         
								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Already Have Account? <a href="index.php" >Login</a></p>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	


</body>
</html>