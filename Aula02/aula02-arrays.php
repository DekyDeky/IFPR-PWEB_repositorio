<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array legal PHP bleh</title>
</head>
<body>
    
    <?php
        //Código Hypertext Preprocessor
        //variável tem que ter "$" na frente
        $frutas = [
            "Banana",
            "Pêra",
            "Abacate",
            "Laranja"
        ];

        foreach ($frutas as $f) {
            echo "<p>Fruta " . $f . " :O</p>";
        }

        echo "<br>";

        echo "<table border='1'> <th>";

        foreach ($frutas as $f) {
            echo "<th> " . substr($f, 0, 1) . "</th>";
        };

        echo "</table> </th>";

        echo "<br>";

        echo "<h3> Exemplo de Array Associativo: </h3>";

        $pessoa = [
            "nome" => "Lil Paulo",
            "cidade" => "Telêmaco Borba",
            "profissao" => "Professor"
        ];

        echo "<p>Nome: " . $pessoa["nome"] . "</p>";
    
        echo "<hr>";
        echo "<h3>print_r pritando o literal array :O</h3>";
        print_r($frutas);

        echo "<hr>";
        echo "<h3>var_dump fazendo alguma coisa</h3>";
        var_dump($frutas);
    ?>

</body>
</html>