<?php include("header.php") ?>;

<div class="container mt-3 mb-3">

    <?php 
        echo "
            <h1 class='text-center'> Lista de PRodutos Cadastrados Exibidos em uma Tabela </h1>
        ";

        //Query para listar Todos os registros da Tabela Produtos
        $listarProdutos = "SELECT * FROM Produtos";

        include("conexaoBD.php");
        $res = mysqli_query($conn, $listarProdutos) or die("Erro ao tentar listar Produtos!");

        $totalProdutos = mysqli_num_rows($res); //Buscar o total de Produtos

        echo "<div class='alert alert-info text-center'> Há <strong>$totalProdutos</strong> Produto(s) </div>";

        //Montar negócoi
        echo "
            <table class='table'>
                <tbody>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FOTO</th>
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th>VALOR</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
        ";

        //Enquanto houver registros, registra isso ai algo assim u ii a
        while($registro = mysqli_fetch_assoc($res)){
            //Cria coisos
            $idProduto          = $registro['idProduto'];
            $fotoProduto        = $registro['fotoProduto'];
            $nomeProduto        = $registro['nomeProduto'];
            $descricaoProduto   = $registro['descricaoProduto'];
            $valorProduto       = $registro['valorProduto'];
            $statusProduto      = $registro['statusProduto'];

            //Exibe coisos
            echo "
                
                    <tr>
                        <td>$idProduto</td>
                        <td><img src='$fotoProduto' width='200px'></td>
                        <td>$nomeProduto</td>
                        <td>$descricaoProduto</td>
                        <td>R$ $valorProduto</td>
                        <td>$statusProduto</td>
                    </tr>
            ";
        }

        echo "</tbody> </table>";

    ?>

</div>

<?php include("footer.php") ?>