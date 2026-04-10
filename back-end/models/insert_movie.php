<?php
include("../../config/connection.php");

$conn = connection();

$id = null;
$tittle = $_POST['tittle'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$score = $_POST['score'];
$comments = $_POST['comments'];

$sql = "INSERT INTO movies VALUES ('$id', '$tittle', '$genre', '$year', '$score', '$comments')";
$query = mysqli_query($conn, $sql);


if ($query) {
    echo json_encode(["success" => true, "message" => "Película guardada"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar"]);
}

?>
