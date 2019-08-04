<?php
    include("logincheck.php");
    include("header.php");
    include("dbconn.php");
    if(isset($_GET) && !empty($_GET))
    {
        $studentid = $_GET['studentid'];
        $sql = "DELETE FROM students WHERE studentid=$studentid";
        $conn->query($sql);
    }
    header("Location:students.php");
?>