<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href= '../controller/logout.php'>Sair</a>";
}
require_once '../controller/cPessoaJ.php';
$cadPJS = new cPessoaJ();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title>Cadastro Pessoa Jurídica</title>
    </head>
    <body>

        <h1>Cadastro de Pessoa Jurídica</h1>
        <form action="<?php $cadPJS->inserir(); ?>" method="POST">
            <input type="text" name="nome" required placeholder="Nome aqui ..."/>
            <br><br>
            <input type="tel" name="telefone" placeholder="Telefone aqui ..."/>
            <br><br>
            <input type="email" name="email" required placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="password" name="pas" required placeholder="Senha aqui ..."/>
            <br><br>
            <input type="text" name="endereco" placeholder="Endereço aqui ..."/>
            <br><br>
            <input type="number" name="cnpj" required placeholder="CNPJ aqui ..."/>
            <br><br>
            <input type="text" name="nomeFantasia" required placeholder="Nome Fantasia aqui ..."/>
            <br><br>
            <input type="text" name="site" required placeholder="Site aqui ..."/>
            <br><br>
            <input type="submit" name="salvarPJ" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar"
                   onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Lista Pessoas Jurídicas" 
                   onclick="location.href = 'listaPessoaJ.php'"/>
        </form>
        <?php
// put your code here
        ?>
    </body>
</html>
