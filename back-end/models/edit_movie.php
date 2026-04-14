<?php 

include("../../config/connection.php");

$conn = connection();

$id = $_POST['id'];
$title = $_POST['title'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$score = $_POST['score'];
$comments = $_POST['comments'];
$sql = "UPDATE movies SET title='$title', genre='$genre', year='$year', score='$score', comments='$comments' WHERE id='$id'";
$query = mysqli_query($conn, $sql);

header('Content-Type: application/json');
if($query){
    echo json_encode(['success' => true, 'message' => 'Película actualizada correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar la película']);
}
?>