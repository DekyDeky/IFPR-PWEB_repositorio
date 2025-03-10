<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário legal :D</title>
</head>
<body>
    <h3>Formulário para cadastro de Pessoa legal :O</h3>

    <form name="formPessoaLegal" method="post" action="action_pessoa.php">
        <label for="nomePessoa">Nome:</label><br>
        <input name="nomePessoa" type="text"><br><br>
        
        <label for="emailPessoa">Email:</label><br>
        <input name="emailPessoa" type="email"><br><br>

        <label for="senhaPessoa">Senha:</label><br>
        <input name="senhaPessoa" type="password"><br><br>
        
        <label for="cidadePessoa">Cidade:</label><br>
        <select name="cidadePessoa">
            <option value="">...</option>
            <option value="telemaco">Telêmaco Borba</option>
            <option value="imbau">Imbaú</option>
            <option value="curiuva">Curiúva</option>
            <option value="ortigueira">Ortigueira</option>
        </select>    
        <br><br>
        
        <input type="submit" name="btCadastrar" value="Cadastrar"> 
    </form>
        
    <?php

    ?>

</body>
</html>