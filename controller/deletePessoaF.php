<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_POST['deletar'])) {
    $id = (int) $_POST['idPessoa'];

    $pdo = require_once '../pdo/connection.php';
    $sql = "delete from login_pessoa where idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaPessoaF.php");
}
    

