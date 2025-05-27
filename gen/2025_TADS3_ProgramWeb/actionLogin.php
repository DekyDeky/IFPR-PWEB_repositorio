<?php

    include("conexaoBD.php");
    session_start(); //Iniciar sessão

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']); //Evitar SQL Injection
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);


    $buscarLogin = "SELECT *
                        FROM Usuarios
                        WHERE emailUsuario = '{$emailUsuario}'
                        AND senhaUsuario = md5('{$senhaUsuario}')
                        ";

    echo $buscarLogin;
    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);
        echo "DEU BOA!";
        //Cria variáveis PHP para armazenar registros encontrados no BD
        $idUsuario   = $registro['idUsuario'];
        $tipoUsuario = $registro['tipoUsuario'];
        $emailUsuario = $registro['emailUsuario'];
        $nomeUsuario = $registro['nomeUsuario'];

        //Cria variáveis de Sessão para armazenar os registros das variáveis PHP
        $_SESSION['idUsuario']      = $idUsuario;
        $_SESSION['tipoUsuario']    = $tipoUsuario;
        $_SESSION['emailUsuario']   = $emailUsuario;
        $_SESSION['nomeUsuario']    = $nomeUsuario;
        
        $_SESSION['logado']         = true; //Variável Controle

        header('location:index.php?pagina=index');

    } elseif(empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || $quantidadeLogin == 0){
        header('location:formLogin.php?pagina=formLogin&erroLogin=dadosInvalidos');
    }

?>  