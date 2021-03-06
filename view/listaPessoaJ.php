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
$cadPJS = new cPessoaJ();
$listaUser = $cadPJS->getAllBD();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title>Lista Pessoas</title>
    </head>
    <body>

        <br><br>
        <button onclick="location.href = 'cadPessoaJ.php'">Voltar Cad. Pessoa Jurídica</button>
        <h1>Lista de Pessoas Jurídicas</h1>
        <table>
            <thead><!-- Cabeçalho da tabela -->
                <tr>
                    <th>ID</th><th>Nome</th><th>E-mail</th><th>CNPJ</th><th>Telefone</th><th>Funções</th>
                </tr>
            </thead>
            <tbody><!-- Corpo da tabela -->
                <?php foreach ($listaUser as $user): ?>
                    <tr>
                        <td><?php echo $user['idPessoa'] ?></td>
                        <td><?php echo $user['nome'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['cnpj'] ?></td>
                        <td><?php echo $user['telefone'] ?></td>
                        <td>
                            <?php if ($user['email'] != $_SESSION['email']) { ?>
                                <form action="../controller/deletePessoaJ.php" method="post">
                                    <input type="hidden" value="<?php echo $user['idPessoa'] ?>" name="idPessoa"/>
                                    <input type="submit" name="deletar" value="Deletar"/>
                                </form>

                                <form action="editarPessoaJ.php" method="POST"> 
                                    <input type="hidden" name="id" value="<?php echo $user['idPessoa']; ?>"/>  
                                    <input type="submit" name="updatePJ" value="EditarPJ"/>
                                </form>

                            <?php }
                            ?>
                        </td>
                    </tr>
                <?php endforeach;
                ?>               
            </tbody>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
