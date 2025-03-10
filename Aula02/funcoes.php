<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
</head>
<body>
    
    <?php
        echo "<h3> Função simples sem parâmetro </h3>";
        function exibirSaudacao(){
            echo "<p>Olá! Bem-vinde à disciplina de Programação Web</p>";
        }

        exibirSaudacao();

        echo "<hr>";    

        echo "<h3>Função com parâmetro</h3>";

        function exibirSaudacaoNome($nome){
            echo "Olá, $nome! Seja bem-vinde à disciplina de Programação Web!<br>";
        }

        exibirSaudacaoNome("Deky");

        echo "<hr>";    

        echo "<h3>efetuar Soma wows</h3>";
        function efetuarSoma($a, $b){
            return ($a + $b);
        }

        $resultado = efetuarSoma(5, 10);

        echo $resultado;

    ?>

</body>
</html>