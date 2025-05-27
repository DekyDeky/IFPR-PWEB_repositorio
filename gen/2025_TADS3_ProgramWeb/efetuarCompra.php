<?php include ("header.php")?>

<div class="container mt-3 mb-3">

    <?php
    
        session_start();

        if(isset($_SESSION["logado"]) && $_SESSION['logado'] === true){
            
            if(isset($_POST['idProduto'])){

                $idUsuario = $_SESSION['idUsuario'];
                $idProduto = $_POST['idProduto'];
                $fotoProduto = $_POST['fotoProduto'];
                $nomeProduto = $_POST['nomeProduto'];
                $valorCompra = $_POST['valorProduto'];
                $dataCompra = date('Y-m-d');
                $horaCompra = date('H:i:s');

                //echo "u: $idUsuario <br> p: $idProduto <br> fp: $fotoProduto <br> np: $nomeProduto <br> vc: $valorCompra <br> dc: $dataCompra <br> hc: $horaCompra";

                $efetuarCompra = "INSERT INTO compras (idUsuario, idProduto, dataCompra, horaCompra, valorCompra) 
                                    VALUES($idUsuario, $idProduto, '$dataCompra', '$horaCompra', $valorCompra)";
                $atualizarStatsProduto = "UPDATE produtos SET statusProduto = 'esgotado' WHERE idProduto = $idProduto";

                include("conexaoBD.php");

                if(mysqli_query($conn, $efetuarCompra)){

                    if(mysqli_query($conn, $atualizarStatsProduto)){
                        echo "
                        
                            <div class='alert alert-success text-center'>
                                Você comprou $nomeProduto!
                                <i class='bi bi-emoji-smile'></i>
                            </div>
    
                        ";
                    } else {
                        echo "
                        
                            <div class='alert alert-danger' text-center>
                                Erro ao efetuar a compra!
                                <i class='bi bi-emoji-frown'></i>
                            </div>
    
                        ";
                    }
                } else {
                        echo "
                        
                            <div class='alert alert-danger' text-center>
                                Erro ao efetuar a compra!
                                <i class='bi bi-emoji-frown'></i>
                            </div>
    
                        ";

                      
                }
            
            } else {
                header('location:index.php');
            }

        }else {
            header('location:index.php');
        }

    ?>

</div>

<?php include ("footer.php")?>