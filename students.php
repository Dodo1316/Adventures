<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    $limit = 2;
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else
    {
        $page = 1;
    }
    $start_from = ($page-1)*$limit;
    $sql = "SELECT * FROM students S JOIN courses C ON S.courseid=C.courseid LIMIT $start_from, $limit";
    $result=$conn->query($sql);
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Students</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                 
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5>Students List</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>:)</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Course Name</th>
                                    <th>Date of Admission</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		if ($result->num_rows>0){
                            			while($row = $result->fetch_assoc()){
                            	?>
	                                <tr>
	                                    <td><?php echo $row['studentid'] ?></td>
                                        <td><?php echo $row['studentname'] ?></td>
	                                    <td><?php echo $row['courseid'] ?></td>
                                        <td><?php echo $row['coursename'] ?></td>
                                        <td><?php echo $row['doa'] ?></td>
	                                    <td>
	                                    	<a href="editstudent.php?studentid=<?php echo $row['studentid']?>">Edit</a> | <a href="deletestudent.php?studentid=<?php echo $row['studentid']?>" onclick="return confirm('Are You Sure')">Delete</a>
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
                <?php
                    $sql = "SELECT COUNT(studentid) FROM students";
                    $result = $conn->query($sql);
                    $row = $result->fetch_array();
                    $total_records = $row[0];
                    $total_pages = ceil($total_records/$limit);

                    $pagelink = "<div class='pagination'>";
                    for($i=1; $i<=$total_pages; $i++)
                    {
                        $pagelink .="<a href='students.php?page=".$i."'>".$i."</a> | ";
                    };
                    echo $pagelink . "</div>";
                ?>
                <a href="addstudent.php"> Click Here to Start your Adventure.</a>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>