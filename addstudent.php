<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    $sql = "SELECT * FROM courses";
    $result=$conn->query($sql);
    	if(isset($_POST) && !empty($_POST))
        {
        	$studentname = addslashes(strip_tags($_POST['studentname']));
            $courseid = $_POST['courseid'];
            $doa = $_POST['doa'];
        	$sql = "INSERT INTO students(studentname,courseid,doa) VALUES('".$studentname."',$courseid,'".$doa."')";
	        if($conn->query($sql))
	        {
                header("Location:students.php");
	        }
	        else
	        {
	        	$error = "Student is Not Added";
            }
	        
        }
?>
		<div id="page-wrapper" >
          	<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ADD STUDENT</h2>
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
                     	<form action="" method="post">
	                        <div class="form-group">
	                            <label>Student Name : </label>
	                            <input class="form-control" type="text" name="studentname" required />
                                <p class="help-block"></p>
	                        </div>
                            <div class="form-group">
                                <label>Course : </label>
                                <select name="courseid" class="form-control " required>
                                    <option value="">Select Adventure</option>
                                    <?php while($row = $result->fetch_assoc()){ ?>
                                        <option value="<?php echo $row['courseid'] ?>">
                                            <?php echo $row['coursename'] ?>
                                        </option>
                                    <?php } ?>
                                </select> 
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label>Date of Admission : </label>
                                <input class="form-control" type="date" name="doa" required />
                                <p class="help-block"></p>
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