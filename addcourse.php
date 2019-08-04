<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    	if(isset($_POST) && !empty($_POST))
        {
        	$coursename = addslashes(strip_tags($_POST['coursename']));
            $description = addslashes(strip_tags($_POST['description']));
            $image = $_FILES['image']['name'];
        	$sql = "SELECT * FROM courses WHERE coursename = '".$coursename."'";
        	$result=$conn->query($sql);
        	if ($result->num_rows>0)
            {
                $error = "Course Already Exists.";
            }
            else
            {
            	$sql = "INSERT INTO courses(coursename,description,image) VALUES('".$coursename."','".$description."','".$image."')";
                if(isset($_FILES) && !empty($_FILES))
                {
                    $path = $_SERVER['DOCUMENT_ROOT']."/project/uploads/".$_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]['tmp_name'], $path);
                }
                if($conn->query($sql))
	            {
	                header("Location:courses.php");
	            }
	            else
	            {
	            	$error = "Course is Not Added";
	            }
	        }
        }
?>
		<div id="page-wrapper" >
          	<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ADD COURSE</h2>
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
	                        <div class="form-group">
	                            <label>Course Name : </label>
	                            <input class="form-control" type="text" name="coursename" required />
	                        </div>
                            <div class="form-group">
                                <label>Course Description : </label>
                                <textarea class="form-control" type="text" name="description" rows="5" cols="20" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image : </label>
                                <input class="form-control" type="file" name="image" accept="image/*" required />
                            </div>
	                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Add"/>
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