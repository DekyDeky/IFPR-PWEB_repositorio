<?php include "header.php"; ?>

<?php

    $erroPreenchimento = false;

    //Verifica o método de requisição de servidores
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $fotoProduto = $nomeProduto = $descricaoProduto = $valorProduto = "";

        //validação do campo nomeProduto
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["nomeProduto"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Nome</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $nomeProduto = testar_entrada($_POST["nomeProduto"]);
        }

        if(empty($_POST["descricaoProduto"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Descrição</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $descricaoProduto = testar_entrada($_POST["descricaoProduto"]);
        }

        if(empty($_POST["valorProduto"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Valor</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $valorProduto = testar_entrada($_POST["valorProduto"]);
        }

        //Inicio da validação do campo foto
        $diretorio = "img/"; //Define para qual diretório as imagens serão movidas
        $fotoProduto = $diretorio . basename($_FILES["fotoProduto"]["name"]); 
        $erroUpload = false;
        $tipoDaImagem = strtolower(pathinfo($fotoProduto, PATHINFO_EXTENSION)); //converter para minusculo a extensão do arquivo

        //Verifica se o tamanho do arquivo é maior que zero
        if($_FILES['fotoProduto']['size'] != 0){
            //Verificar se o tamanho do arquivo é maior que 5MB
            if($_FILES['fotoProduto']['size'] > 5000000) {
                echo "<div class='alert alert-warning text-center'>
                    A <strong>Foto</strong> não deve possuir mais do que 5MB!!
                </div>";
                $erroUpload = true;
            }

            //Verifica o tipo do arquivo (pela extensão)
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png"&& $tipoDaImagem != "webp") {
                echo "<div class='alert alert-warning text-center'>
                    A <strong>Foto</strong> deve estar no formato JPG, JPEG, PNG ou WEBP!!
                </div>";
                $erroUpload = true;
            }
        }

        if($erroUpload){
            echo "<div class='alert alert-warning text-center'>
                Erro ao tentar fazer o upload da <strong>Foto</strong>!
                </div>
            ";
            $erroUpload = true;
        } else {
            //Usa a função move_uploaded_file para mover o arquivo para o diretório img
            if(!move_uploaded_file($_FILES["fotoProduto"]["tmp_name"], $fotoProduto)){
                echo "<div class='alert alert-warning text-center'>
                Erro ao tentar mover a <strong>Foto</strong> para o diretório $diretorio!
                </div>
                ";
                $erroUpload = true;
            }
        }

        //Se não houver erro na hora do preenchimentoou erro de upload 
        if(!$erroPreenchimento && !$erroUpload){

            //Criar uma querry responsável por realizar a inserção dos dados no BD
            $inserirProduto = "INSERT INTO Produtos (fotoProduto, nomeProduto, descricaoProduto, valorProduto, statusProduto)
                                VALUES ('$fotoProduto', '$nomeProduto', '$descricaoProduto', '$valorProduto', 'Disponível')";

            //Incluir a conexão com o DB
            include "conexaoBD.php";

            //Se a querry foi executada com sucesso, exibe a mensagem e tabela
            if(mysqli_query($conn, $inserirProduto)){

                echo "<div class='alert alert-success text-center'>
                    Produto cadastrado com sucesso!
                </div>";

                echo "
                    <div class='container mt-3>
                        <div class='mt-3 text-center'>
                            <img src='$fotoProduto' width='250px'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nomeProduto</td>
                                </tr>
                                <tr>
                                    <th>DESCRIÇÃO</th>
                                    <td>$descricaoProduto</td>
                                </tr>
                                <tr>
                                    <th>PREÇO</th>
                                    <td>R$ $valorProduto</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ";

                echo "<?php include 'footer.php'; ?>";
            }
            
        } else {
            echo "<p>Erro ao inserir os dados no Banco de Dados</p>";
        }


    } else {
        //Redireciona para a página formUsuario.php
        header("location:formUsuario.php");
    }

    function  testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converter caracteres especiais

        return($dado);
    }   

?>