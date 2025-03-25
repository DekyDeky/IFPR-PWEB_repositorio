<?php include "header.php"; ?>

<?php

    $erroPreenchimento = false;

    //Verifica o método de requisição de servidores
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $fotoUsuario = $nomeUsuario = $cidadeUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = $dataNascimentoUsuario = "";

        //validação do campo nomeUSuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["nomeUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Nome</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $nomeUsuario = $_POST["nomeUsuario"];
            //Usa a função preg_match para verificar o padrão de caracteres
            if(!preg_match('/^[\p{L} ]+$/u', $nomeUsuario)){
                echo "<div class='alert alert-warning text-center'>
                    O <strong>Nome</strong> deve conter apenas letras!
                    </div>
                ";
                $erroPreenchimento = true;
            }
        }

        if(empty($_POST["dataNascimentoUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Data de Nascimento</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $dataNascimentoUsuario= testar_entrada($_POST["dataNascimentoUsuario"]);

            //Use a função strlen para verificar o comprimento da string
            if(strlen($dataNascimentoUsuario) == 10){
                //Usa a função substr para pegar partes da string
                $dia = substr($dataNascimentoUsuario, 8, 2);
                $mes = substr($dataNascimentoUsuario, 5, 2);
                $ano = substr($dataNascimentoUsuario,0, 4);


                //Usa a função checkdate para checkdate
                if(!checkdate($mes, $dia, $ano)){

                    echo "<div class ='alert alert-warning text-center'>
                        O campo <strong>Data de Nascimento</strong> possui uma data aaaa inválida!
                    </div>";

                    $erroPreenchimento = true;
                }
            }else {
                echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Data de Nascimento</strong> possui uma data inválida!
                </div>";

                $erroPreenchimento = true;
            }
        }

        if(empty($_POST["cidadeUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Cidade</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $cidadeUsuario = testar_entrada($_POST["cidadeUsuario"]);
        }

        if(empty($_POST["telefoneUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>telefone</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $telefoneUsuario = testar_entrada($_POST["telefoneUsuario"]);
        }

        if(empty($_POST["emailUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Email</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $emailUsuario = testar_entrada($_POST["emailUsuario"]);
        }

        if(empty($_POST["senhaUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Senha</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $senhaUsuario = testar_entrada($_POST["senhaUsuario"]);
        }

        if(empty($_POST["confirmarSenhaUsuario"])){
            echo "<div class ='alert alert-warning text-center'>
                    O campo <strong>Senha Usuário</strong> é obrigatório!
                </div>";
            $erroPreenchimento = true;
        } else {
            //Armazena o valor na variável
            $confirmarSenhaUsuario = testar_entrada($_POST["confirmarSenhaUsuario"]);
            if($senhaUsuario != $confirmarSenhaUsuario){
                echo "<div class ='alert alert-warning text-center'>
                    As <strong>Senhas</strong> não conferem!
                </div>";
                $erroPreenchimento = true;
            }
        }

        //Inicio da validação do campo foto
        $diretorio = "img/"; //Define para qual diretório as imagens serão movidas
        $fotoUsuario = $diretorio . basename($_FILES["fotoUsuario"]["name"]); 
        $erroUpload = false;
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION)); //converter para minusculo a extensão do arquivo

        //Verifica se o tamanho do arquivo é maior que zero
        if($_FILES['fotoUsuario']['size'] != 0){
            //Verificar se o tamanho do arquivo é maior que 5MB
            if($_FILES['fotoUsuario']['size'] > 5000000) {
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
            if(!move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $fotoUsuario)){
                echo "<div class='alert alert-warning text-center'>
                Erro ao tentar mover a <strong>Foto</strong> para o diretório $diretorio!
                </div>
                ";
                $erroUpload = true;
            }
        }

        if(!$erroPreenchimento && !$erroUpload){

            echo "<div class='alert alert-success text-center'>
                Usuário(a) cadastrado com sucesso!
                </div>";

            echo "<div class='container mt-3>
                    <div class='mt-3 text-center'>
                        <img src='$fotoUsuario' width='250px'>
                    </div>
                    <div class='table-responsive'>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeUsuario</td>
                            </tr>
                            <tr>
                                <th>Data de Nascimento</th>
                                <td>$dia/$mes/$ano</td>
                            </tr>
                            <tr>
                                <th>CIDADE</th>
                                <td>$cidadeUsuario</td>
                            </tr>
                             <tr>
                                <th>TELEFONE</th>
                                <td>$telefoneUsuario</td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>$emailUsuario</td>
                            </tr>
                        </table>
                    </div>
                </div>
            ";

            echo "<?php include 'footer.php'; ?>";
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