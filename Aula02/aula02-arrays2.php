<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Multidimensional</title>
</head>
<body>
    <?php
        echo "<hr>";
        
        echo "<h3> Array Multidimensional </h3>";

        $alunos = [
            ["Nome" => "João", "Idade" => 20, "Curso" => "Tecnólogo em Análise e Desenvolvimento de Sistemas"],
            ["Nome" => "Ana", "Idade" => 22, "Curso" => "Bacharelado em Engenharia Elétrica"],
            ["Nome" => "Fernanda", "Idade" => 19, "Curso" => "Licenciatura em Física"]
        ];

        echo "<p>" . $alunos[1]["Curso"] . "</p>";
        echo "<p>" . $alunos[0]["Nome"] . "</p>";
    
        echo "<hr>";

    
    ?>
</body>
</html>