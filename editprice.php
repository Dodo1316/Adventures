<?php
    include("logincheck.php");
    include("header.php");
    include("leftmenu.php");
    include("dbconn.php");
        if(isset($_GET) && !empty($_GET))
        {
            $priceid = $_GET['priceid'];
            $sql = "SELECT * FROM prices WHERE priceid=$priceid";
            $result = $conn->query($sql);
            if($result->num_rows>0)
                $price = $result->fetch_assoc();
        }
        if(isset($_POST) && !empty($_POST))
        {
            $amount = $_POST['amount'];
            $duration = addslashes(strip_tags($_POST['duration']));
            $sql = "SELECT * FROM prices WHERE amount=$amount OR duration='".$duration."'";
            $result=$conn->query($sql);
            if ($result->num_rows>0)
            {
                $error = "Either Price or Duration Already Exists.";
            }
            else
            {
                $sql = "UPDATE prices SET amount = $amount, duration = '".$duration."' WHERE priceid=$priceid";
                if($conn->query($sql))
                {
                    header("Location:prices.php");
                }
                else
                {
                    $error = "Price is Not Added";
                }
            }
        }
?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>EDIT PRICE</h2>
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
                                <label>Amount in Rupees : </label>
                                <input class="form-control" type="number" name="amount" value="<?php echo $price['amount'] ?>" required />
                            </div>
                            <div class="form-group">
                                <label>Duration in Months : </label>
                                <input class="form-control" type="text" name="duration" value="<?php echo $price['duration'] ?>" required />
                            </div>
                            <input type="submit" class="btn btn-danger btn-lg btn-block" value="Update"/>
                            <input type="reset" class="btn btn-lg btn-block" value="Clear"/>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-4">
                         
                    </div>
                </div>
                <hr>
                <a href="prices.php"> Prices.</a>
            </div>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>