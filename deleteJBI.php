<?php

include "config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($link,"delete from pendaftaranjbi where nokadpengenalan = '$id'"); // delete query

if($del)
{
    echo '<script>alert("JBI removed");</script>';
    echo "<script>location.href='adminsemakJBI.php';</script>";
}
else
{
    echo '<script>alert("Failed to remove JBI")</script>';
}
?>