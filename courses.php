<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    $sql = "SELECT * FROM courses";
    $result=$conn->query($sql);
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Adventure Tags</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                 
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5>Adventures</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>:)</th>
                                    <th>Course Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		if ($result->num_rows>0){
                            			while($row = $result->fetch_assoc()){
                            	?>
	                                <tr>
	                                    <td><?php echo $row['courseid'] ?></td>
	                                    <td><?php echo $row['coursename'] ?></td>
	                                    <td>
	                                    	<a href="editcourse.php?courseid=<?php echo $row['courseid']?>">Edit</a> | <a href="deletecourse.php?courseid=<?php echo $row['courseid']?>" onclick="return confirm('Are You Sure')">Delete</a>
	                                    </td>
	                                </tr>
	                            <?php
	                            	}
	                            }
	                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /. ROW  -->
                <a href="addcourse.php"> Click Here to Addventure.</a>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>