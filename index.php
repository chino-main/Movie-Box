<?php 

include("config/connection.php");

$conn = connection();
$sql = "SELECT * FROM movies";
$query = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepMovies</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="js/main.js" defer></script>
    <link rel="icon" type="image/png" href="assets/favicon-32x32.png" sizes="32x32">
</head>
<header>
    <h1 id="h1-header">StepMovies</h1>
</header>
<body>
    <div class="section-heading">
        <h2>Mis Peliculas    <span class="material-symbols-outlined">movie</span></h2>
    </div>
    <main>
        <div class="add-movie-container"><button onclick="openAddDialog()">Agregar <span class="material-symbols-outlined">add_2</span></button></div>
        <div id="table-movies">
            <table>
                <thead>
                    <tr id="table-main">
                        <th class="table-column">ID</th>
                        <th class="table-column">Título</th>
                        <th class="table-column">Genero</th>
                        <th class="table-column">Año</th>
                        <th class="table-column">Puntuación</span></th>
                        <th class="table-column">Comentarios</th>
                        <th class="table-column"></th>
                        <th class="table-column"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['tittle']?></th>
                        <th><?= $row['genre']?></th>
                        <th><?= $row['year']?></th>
                        <th><?= $row['score']?></th>
                        <th><?= $row['comments']?></th>
                        <th><button onclick="openEditDialog(<?= $row['id'] ?>)" class="edit-button"><span class="material-symbols-outlined">edit</span></button></th>
                        <th><button onclick="openDeleteDialog(<?= $row['id'] ?>)" class="delete-button"><span class="material-symbols-outlined">delete</span></button></th>
                </tr>
                <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>
    </main>
    <dialog id="add-dialog">
        <div id="close-dialog">
            <button id="btn-close-add" class="close-button" type="button" onclick="closeDialog('add-dialog')"><span class="material-symbols-outlined">close</span></button>
        </div>
        <div class="dialog-header"><h3>Añadir Pelicula</h3></div>
        <div id="form-add-movie">
        </div>
    </dialog>
    <dialog id="edit-dialog">
        <div id="close-dialog">
            <button id="btn-close-edit" class="close-button" type="button" onclick="closeDialog('edit-dialog')"><span class="material-symbols-outlined">close</span></button>
        </div>
        <div class="dialog-header">
            <h3>Editar datos</h3>
        </div>
        <div id="edit-form-container"></div>
    </dialog>
    <dialog id="delete-dialog">
        <div class="delete-dialog-header">
            <div><span class="material-symbols-outlined">dangerous</span></div>
            <h3>Confirmar eliminación</h3>
        </div>
        <div id="delete-dialog-container"></div>
    </dialog>
    <footer>
        <h4>Desarrollado por Sebastián &copy; 2026</h4>
    </footer>
</body>
</html>