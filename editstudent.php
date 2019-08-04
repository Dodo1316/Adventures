<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    $sql = "SELECT * FROM courses";
    $result1=$conn->query($sql);
    if (isset($_GET) && !empty($_GET)) 
    {
        $studentid = $_GET['studentid'];
        $sql = "SELECT * FROM students S JOIN courses C ON S.courseid=C.courseid WHERE studentid = $studentid";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
    }
    	if(isset($_POST) && !empty($_POST))
        {
        	$studentname = addslashes(strip_tags($_POST['studentname']));
            $courseid = $_POST['courseid'];
            $doa = $_POST['doa'];
            $studentid = $_POST['studentid'];
        	$sql = "UPDATE students SET studentname = '".$studentname."', courseid = $courseid, doa = '".$doa."' WHERE studentid=$studentid";
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
                        <h2>EDIT STUDENT</h2>
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
                            <input type="hidden" name="studentid" value="<?php echo $row['studentid']?>">
	                        <div class="form-group">
	                            <label>Student Name : </label>
	                            <input class="form-control" type="text" name="studentname" value="<?php echo $row['studentname'] ?>" required />
                                <p class="help-block"></p>
	                        </div>
                            <div class="form-group">
                                <label>Course : </label>
                                <select name="courseid" class="form-control " required>
                                    <option value="">Select Adventure</option>
                                    <?php while($row1 = $result1->fetch_assoc()){ ?>
                                        <option value="<?php echo $row1['courseid'] ?>" <?php echo ($row1['courseid']==$row['courseid'])?"selected":"" ?>>
                                            <?php echo $row1['coursename'] ?>
                                        </option>
                                    <?php } ?>
                                </select> 
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label>Date of Admission : </label>
                                <input class="form-control" type="date" name="doa" value="<?php echo $row['doa'] ?>" required />
                                <p class="help-block"></p>
                            </div>
	                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Update"/>
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