<?php 

include("../../config/connection.php");

$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM movies WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

header('Content-Type: text/html; charset=utf-8');
?>

<div id="delete-dialog-content">
    <div class="delete-dialog-message">
        <p>¿Quieres borrar "<?= $row['title'] ?>"?</p>
    </div>
    <div class="delete-buttons">
        <button id="confirm-delete-button" onclick="confirmDelete(<?= $id ?>)">Sí</button>
        <button onclick="closeDialog('delete-dialog')">No</button>
    </div>
</div>