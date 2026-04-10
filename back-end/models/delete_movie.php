<?php

include("../../config/connection.php");

$conn = connection();

$id = $_GET['id'];

$sql = "DELETE FROM movies WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: ../../index.php");
}

?>

