<?php

    //importar la conexion
    require 'includes/config/databases.php';
    $db = conectarDB();

    //crear email y password
    $email = "correo@correo.com";
    $password = "123456";
    $passwordHash = password_hash($password,PASSWORD_BCRYPT);

    //query para crear el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}'); ";
    // echo $query;

    //agregarlo a la BBDD
    mysqli_query($db, $query);

?>