<?php 

include("../../config/connection.php");

$conn = connection();

?>


<form id="add-movie-form" action="/moviesCrud/back-end/models/insert_movie.php" method="POST">
    <p>Título:</p>
    <input type="text" name= "title" placeholder="Titulo" required>
    <p>Género:</p>
    <input type="text" name= "genre" placeholder="Genero" required>
        <option value="Drama"></option>
        <option value="Acción"></option>
        <option value="Superhéroes"></option>
        <option value="Terror"></option>
        <option value="Comedia"></option>
        <option value="Thriller"></option>
    <p>Año:</p>
    <input type="number" name= "year" min="1800" max="<?= date("Y") ?>" placeholder="Año" required>
    <p>Puntuación:</p>
    <input type="number" name= "score" min="0" max="10" placeholder="Puntuacion" required>
    <p>Comentarios:</p>
    <input type="text" name= "comments" placeholder="Comentarios">
    <input id= "submit-button" type="submit" value="Guardar">
</form>