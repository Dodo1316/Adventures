<?php
    include("header.php");
?>
    <?php
        //include("logincheck.php");
        //include("header.php");
        include("dbconn.php");
        if(isset($_POST) && !empty($_POST))
        {
            echo "<pre>";
            print_r($_POST);
            //exit();
            $name = addslashes(strip_tags($_POST['name']));
            $email = addslashes(strip_tags($_POST['email']));
            $password = md5(addslashes(strip_tags($_POST['password'])));
            $phone = addslashes(strip_tags($_POST['phone']));
            $sql = "INSERT INTO users(name,email,password,phone) VALUES('".$name."','".$email."','".$password."','".$phone."')";
            session_start();
            if($conn->query($sql))
            {
                $_SESSION['signup'] = 1;
            }
            else
            {
                $_SESSION['signup'] = 0;
            }

            $conn->close();
        }
    ?>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>SIGN UP</h2>
                    </div>
                </div>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 ">
                        <?php if(isset($_SESSION['signup']) && $_SESSION['signup']==1){?>
                        <div class="alert alert-success">
                             <strong>Welcome Jhandu ! </strong> You Have Signed Up Successfully.<a href="login.php">Click Here to Login.</a>
                        </div>
                    <?php }else if(isset($_SESSION['signup']) && $_SESSION['signup']==0){?>
                        <div class="alert alert-danger">
                             <strong>Sorry ! </strong> Sign Up Failed.
                        </div>
                    <?php } 
                        unset($_SESSION['signup']);
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                     <form action="" method="post">
                        <div class="form-group">
                            <label>User Name : </label>
                            <input class="form-control" type="text" name="name" />
                        </div>
                        <div class="form-group">
                            <label>Email ID : </label>
                            <input class="form-control" type="email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label>Password : </label>
                            <input class="form-control" type="password" name="password" required />
                        </div>
                        <div class="form-group">
                            <label>Phone : </label>
                            <input class="form-control" type="text" name="phone" required maxlength="10" />
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Sign Up"/>
                     </form>
                    </div>
                    <div class="col-lg-4 col-md-4">
                         
                    </div>
                </div>
                <hr>
                  
                Already Registered? <a href="login.php"> Click Here to Login.</a>
            </div>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php
    include("footer.php");
?>