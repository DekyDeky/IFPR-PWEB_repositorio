<?php

    $host    = "localhost"; //servidor do BD
    $user    = "root"; //Usuário do DB
    $senhaBD = "root"; //Senha do DB
    $database = "generico"; //Nome do DB

    //Função do php para estabelecer conexão com o banco de dados
    $conn = mysqli_connect($host, $user, $senhaBD, $database);

    //Se não 
    if(!$conn){
        echo "<p>Erro ao tentar conectar a Base de dados <strong>$database</strong></p>";
    }

?>