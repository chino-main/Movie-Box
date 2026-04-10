<?php

function connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";

    $db = "movies";
    $conn = mysqli_connect($host, $user, $pass, $db, 3308);

    if (!$conn) {
        die("Fallo la conexión: " . mysqli_connect_error());
    }
    
    return $conn; 
};

?>