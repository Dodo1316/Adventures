<?php
    include("logincheck.php");
    include("header.php");
    include("dbconn.php");
    if(isset($_GET) && !empty($_GET))
    {
        $priceid = $_GET['priceid'];
        $sql = "DELETE FROM prices WHERE priceid=$priceid";
        $conn->query($sql);
    }
    header("Location:prices.php");
?>