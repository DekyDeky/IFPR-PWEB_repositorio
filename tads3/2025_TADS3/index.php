<?php include "header.php"; ?>
        
        <div class="container mt-5 mb-5">
            <?php 
            
            include ("conexaoBD.php"); 

            $listarProdutos = "SELECT * FROM produtos"; 

            //PHP para trabalhar com o filtro

            //Verificar se há algum parâmetro
            if(isset($_GET["filtroProduto"])){
                $filtroProduto = $_GET["filtroProduto"];

                if($filtroProduto != "todos"){
                    $listarProdutos = $listarProdutos . " WHERE statusProduto LIKE '$filtroProduto' ";
                }

                switch($filtroProduto){
                    case "todos" : $mensagemFiltro = "no total";
                    break;

                    case "disponivel" : $mensagemFiltro = "disponiveis";
                    break;

                    case "esgotado" : $mensagemFiltro = "esgotados";
                    break;
                }
            }else {
                $mensagemFiltro = "no total";
            }

            $res = mysqli_query($conn, $listarProdutos);
            $totalProdutos = mysqli_num_rows($res);

            if($totalProdutos > 0)
            {
                if($totalProdutos == 1)
                {
                    echo "<div class = 'alert alert-info text-center'>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro </div>";
                }
                else
                {
                    echo "<div class = 'alert alert-info text-center'>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro</div>";
                }
            }
            else
            {
                echo "<div class = 'alert alert-info text-center'>Não há produtos $mensagemFiltro!</div>";
            }

            echo "<form name='formFiltro' action='index.php' method='GET'>
                <div class='form-floating mt-3'>
                    <select class='form-select' name='filtroProduto' required>
                        <option value='todos'"; if($filtroProduto == 'todos'){echo "selected";}; echo ">Visualizar todos os Produtos</option>
                        <option value='disponivel'"; if($filtroProduto == 'disponivel'){echo "selected";}; echo ">Visualizar apenas Produtos disponíveis</option>
                        <option value='esgotado'"; if($filtroProduto == 'esgotado'){echo "selected";}; echo ">Visualizar apenas Produtos esgotados</option>
                    </select>
                    <label for='filtroProduto'>Selecione um Filtro</label>
                    <br>
                </div>
                <button type='submit' class='btn btn-success' style='float:right'><i class='bi bi-funnel'></i>  Filtrar Produtos</button><br>
            </form>";

            ?> 
            <hr>

            <div class="row">
                <?php 
                while($registro =mysqli_fetch_assoc($res))
                {
                    $idProduto = $registro["idProduto"];
                    $fotoProduto = $registro["fotoProduto"];
                    $nomeProduto = $registro["nomeProduto"];
                    $descricaoProduto = $registro["descricaoProduto"];
                    $valorProduto = $registro["valorProduto"];
                    $statusProduto = $registro["statusProduto"];

                    echo "
                    <div class='col-sm-3'>

                        <div class='card' style='width:100%; height:100%;'>
                            <div class='card-body' style='height:100%'>
                                <a href='visualizarProduto.php' style='text-decoration:none;' title='Visualizar Produto de $nomeProduto'>
                                    <img class='card-img-top' src='$fotoProduto' alt='Foto de $nomeProduto'"; if($statusProduto == 'esgotado') {echo "style='filter:grayscale(100%)';";} echo ">
                                </a>
                            </div>
                            <div class='card-body text-center'>
                                <h4 class='card-title'>$nomeProduto</h4>
                                <p class='card-text'>Valor: <b>R$ $valorProduto</b></p>
                                <div class='d-grid' style='border-size:border-box'>
                                    <a class='btn btn-success' href='visualizarProduto.php' style='text-decoration:none;'  title='Visualizar $nomeProduto'>
                                        Visualizar Produto
                                    </a>  
                                </div>
                            </div>
                        </div>

                    </div>
                    ";
                }
                ?>
            </div>
        </div>

<?php include "footer.php" ?>