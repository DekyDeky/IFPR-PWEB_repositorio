<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendendo PHP</title>
</head>
<body>
    <h1>Aula de Programação</h1>

    <?php
        //Início do Bloco PHP
        $anoAtual = 2025;
        $anoNascimento = 2005;
        $altura = 1.75;
        $nomeUsuario = "João";

        echo "<h3 style = 'color:red'>" . $anoAtual . "</h3>";

        echo "<p>O usuário $nomeUsuario nasceu em $anoNascimento. Portanto, ele possui ". ($anoAtual - $anoNascimento) . " anos</p>";

        $idade = $anoAtual - $anoNascimento;

        if($idade < 18){
            echo "<p>João é menor.</p>";
        } else {
            echo "<p>João é maior.</p>";
        }

        $corFavorita = "vermelho";

        switch($corFavorita){
            case "verde": echo "verde";
            break;
            case "vermelho": echo "vermelho";
            break;
            case "azul": echo "azul";
            break;
            default: echo "outra cor";
        }


        //estruturas de repetição
        //exemplo de while
        $i = 1;
        while($i < 5)
        {
            echo "<p>O contador vale $i</p>";
            $i ++;
        }

        $i = 100;

        do {
            echo "<p>O contador vale $i</p>";
            $i ++;
        } while($i < 5);

        for ($i = 1; $i <=5; $i++){
            echo "<p>O contador vale $i</p>";
        }


        echo "<hr>";
        echo "<h1> Criando tabelas HTML dinâmicas com PHP </h1>";
        echo "<table border ='1'>";
            for($l = 1; $l <=3; $l++)
            {
                echo "<tr>";
                for ($c = 1; $c <= 3; $c++)
                {
                    echo "<td>";
                    echo "Linha $l, coluna $c";
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

    ?>

</body>
</html>