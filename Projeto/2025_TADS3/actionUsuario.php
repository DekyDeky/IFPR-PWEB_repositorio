<?php

    $erroPreenchimento = false;

    //Verifica o método de requisição de servidores
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $fotoUsuario = $nomeUsuario = $cidadeUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";

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

        if(!$erroPreenchimento){

            echo "<div class='alert alert-sucess text-center'>
                Usuário(a) cadastrado com sucesso!
                </div>";

            echo "<div class='container mt-3>
                    <div class='mt-3 text-center'>
                        FOTO :D
                    </div>
                    <div class='table-responsive'>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeUsuario</td>
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