<?php
    include("logincheck.php");
    include("header.php");
    include("dbconn.php");
    if(isset($_GET) && !empty($_GET))
    {
        $courseid = $_GET['courseid'];
        $sql = "DELETE FROM courses WHERE courseid=$courseid";
        $conn->query($sql);
    }
    header("Location:courses.php");
?>