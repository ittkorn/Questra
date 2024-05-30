<?php
$connect = mysqli_connect("localhost", "root", "", "questra");

if ($connect === false) {
    die("Connect Error: " . mysqli_connect_error());
}
?>
