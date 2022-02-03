
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
    echo " | <a href='../controller/logout.php'>Sair</a>";
}

require_once '../controller/cPessoaJ.php';
$id = 0;
if (isset($_POST['updatePJ'])) {
    $id = $_POST['id'];
}
$listaUser = new cPessoaJ();
$lis = $listaUser->getUsuarioById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pessoa</title>
    </head>
    <body>
        <h1>Editar Pessoa Jurídica</h1>
        <form action="../controller/editPessoaJ.php" method="POST">
            <input type="hidden" value="<?php echo $lis[0]['idPessoa']; ?>" name="id"/>
            <input type="text" required value="<?php echo $lis[0]['nome']; ?>" name="nome"/>
            <br><br>
            <input type="tel" required value="<?php echo $lis[0]['telefone']; ?>" name="telefone"/>
            <br><br>
            <input type="text" required value="<?php echo $lis[0]['endereco']; ?>" name="endereco"/>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="update"/>
            <input type="button" value="Cancelar"
                   onclick="location.href = 'listaPessoaJ.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
