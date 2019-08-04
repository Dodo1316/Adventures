<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
    $sql = "SELECT * FROM prices";
    $result=$conn->query($sql);
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Prices</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                 
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5>Price List</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>:)</th>
                                    <th>Amount ( Rs.)</th>
                                    <th>Duration ( Months )</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		if ($result->num_rows>0){
                            			while($row = $result->fetch_assoc()){
                            	?>
	                                <tr>
	                                    <td><?php echo $row['priceid'] ?></td>
                                        <td><?php echo $row['amount'] ?></td>
                                        <td><?php echo $row['duration'] ?></td>
	                                    <td>
	                                    	<a href="editprice.php?priceid=<?php echo $row['priceid']?>">Edit</a> | <a href="deleteprice.php?priceid=<?php echo $row['priceid']?>" onclick="return confirm('Are You Sure')">Delete</a>
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
                <a href="addprice.php"> Click Here to Add a Price.</a>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>