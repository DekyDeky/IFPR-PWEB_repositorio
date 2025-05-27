<?php

    session_start();
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] === false){
        header('location:formLogin.php?pagina=formLogin&erroLogin=naoLogado');
    }else {
        $tipoUsuario = $_SESSION['tipoUsuario'];
        if($_SESSION['tipoUsuario'] != 'administrador'){
            header('location:formLogin.php?pagina=formLogin&erroLogin=acessoProibido');
        }
    }

?>