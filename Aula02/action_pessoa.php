    <?php
        //Verifica se o método de requisição é o post

        function exibirErro($campoErro){
            echo "<p style='color:red; padding:20px; background-color:yellow;'> O campo \"$campoErro\" é OBRIGATÓRIO!</p>";
        }

        function checarCampoVazio($campo, $nomeCampo, $campoCifr){
            if (empty($_POST[$campo])){
                exibirErro($nomeCampo);
                return true;
            } else {
                $campoCifr = $_POST[$campo];
                return false;
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $erroPreenchimento;
            //Cria variáveis para receber os dados do formulario
            $nomePessoa = $emailPessoa = $cidadePessoa = "";

            $erroPreenchimento = checarCampoVazio("nomePessoa", "Nome", $nomePessoa);
            $erroPreenchimento = checarCampoVazio("emailPessoa", "Email", $emailPessoa);
            $erroPreenchimento = checarCampoVazio("cidadePessoa", "Cidade", $cidadePessoa);

            if(!$erroPreenchimento){
                echo "
                    <h3> Dados Cadastrados: </h3>
                    <table border='1'>
                        <tr>
                            <th> Nome: </th>
                            <td>$nomePessoa</td>
                        </tr>
                        <tr>
                            <th> Email: </th>
                            <td> $emailPessoa </td>
                        </tr>
                        <tr>
                            <th> Cidade: </th>
                            <td> $cidadePessoa </td>
                        </tr>
                    </table>
                ";
            }

        }else {
            header("Location: form-pessoa.php");
        }


    ?>