<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Tel = $_POST['telefone'];
    $End = $_POST['endereco'];

    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE login_pessoa SET nome = ?, telefone = ?, endereco = ? WHERE idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $Nome, PDO::PARAM_STR);
    $sth->bindParam(2, $Tel, PDO::PARAM_STR);
    $sth->bindParam(3, $End, PDO::PARAM_STR);
    $sth->bindParam(4, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaPessoaJ.php");
}
