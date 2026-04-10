<?php 

include("../../config/connection.php");

$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM movies WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

header('Content-Type: text/html; charset=utf-8');
?>

<form id="edit-movie-form">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <p>Título:</p>
    <input type="text" name="tittle" placeholder="Titulo" value="<?= $row['tittle'] ?>" required>
    <p>Género:</p>
    <input type="text" list="genres" name="genre" placeholder="Genero" value="<?= $row['genre'] ?>"required>
    <datalist id="genres">
        <option value="Drama"></option>
        <option value="Acción"></option>
        <option value="Superhéroes"></option>
        <option value="Terror"></option>
        <option value="Comedia"></option>
        <option value="Thriller"></option>
    </datalist>
    <p>Año:</p>
    <input type="number" name="year" min="1800" max="<?= date("Y") ?>" placeholder="Año" value="<?= $row['year'] ?>" required>
    <p>Puntuación:</p>
    <input type="number" name="score" min="0" max="10" placeholder="Puntuacion" value="<?= $row['score'] ?>" required>
    <p>Comentarios:</p>
    <input type="text" name="comments" placeholder="Comentarios" value="<?= $row['comments'] ?>">
    <input type="submit" value="Guardar">
</form>