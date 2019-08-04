<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
        if(isset($_GET) && !empty($_GET))
        {
            $courseid = $_GET['courseid'];
            $sql = "SELECT * FROM courses WHERE courseid=$courseid";
            $result = $conn->query($sql);
            if($result->num_rows>0)
                $course = $result->fetch_assoc();
        }
        if(isset($_POST) && !empty($_POST))
        {
        	$coursename = addslashes(strip_tags($_POST['coursename']));
        	$description = addslashes(strip_tags($_POST['description']));
            $image = $_FILES['image']['name'];
            $sql = "SELECT * FROM courses WHERE courseid != $courseid AND coursename = '".$coursename."'";
        	$result=$conn->query($sql);
        	if ($result->num_rows>0)
            {
                $error = "Course Already Exists.";
            }
            else
            {
                if(isset($_FILES) && !empty($_FILES))
                {
                    $file = $_FILES['image']['name'];
                    $sql = "UPDATE courses SET coursename='".$coursename."', description='".$description."',image='".$image."' WHERE courseid=$courseid";
                    $path = $_SERVER['DOCUMENT_ROOT']."/project/uploads/".$_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]['tmp_name'], $path);
                }
                else
                {
                    $sql = "UPDATE courses SET coursename='".$coursename."', description='".$description."' WHERE courseid=$courseid";
                }
            	
	            if($conn->query($sql))
	            {
	                header("Location:courses.php");
	            }
	            else
	            {
	            	$error = "Course is Not Updated";
	            }
	        }
        }
?>
		<div id="page-wrapper" >
          	<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>EDIT COURSE</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 ">
                        <?php if(isset($error) && !empty($error)){?>
                        <div class="alert alert-danger">
                             <strong><?php echo $error; ?></strong>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                     	<form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="courseid" value="<?php echo $course['courseid']?>">
	                        <div class="form-group">
	                            <label>Course Name : </label>
	                            <input class="form-control" type="text" name="coursename" value="<?php echo $course['coursename']?>" required />
	                        </div>
	                        <div class="form-group">
                                <label>Course Description : </label>
                                <textarea class="form-control" type="text" name="description" rows="5" cols="20" required>
                                    <?php echo $course['description'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Image : </label>
                                <input class="form-control" type="file" name="image" accept="image/*" required />
                            </div>
                            <input type="submit" class="btn btn-danger btn-lg btn-block" value="Edit"/>
	                        <input type="reset" class="btn btn-lg btn-block" value="Clear"/>
                     	</form>
                    </div>
                    <div class="col-lg-4 col-md-4">
                         
                    </div>
                </div>
                <hr>
                <a href="courses.php"> Courses.</a>
            </div>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>