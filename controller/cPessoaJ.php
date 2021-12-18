<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author Stein
 */
class cPessoaJ {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvarPJ'])) {
            $nome = $_POST['nome'];
            $tel = $_POST['telefone'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            $end = $_POST['endereco'];
            $cnpj = $_POST['cnpj'];
            $nomeF = $_POST['nomeFantasia'];
            $site = $_POST['site'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into login_pessoa (nome, telefone, email, pas, endereco, cnpj, nomeFantasia, site) values (?,?,?,?,?,?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $tel, PDO::PARAM_STR);
            $sth->bindParam(3, $email, PDO::PARAM_STR);
            $sth->bindParam(4, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $sth->bindParam(5, $end, PDO::PARAM_STR);
            $sth->bindParam(6, $cnpj, PDO::PARAM_STR);
            $sth->bindParam(7, $nomeF, PDO::PARAM_STR);
            $sth->bindParam(8, $site, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }

    public function getAllBD() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select * from login_pessoa where cpf is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

    public function deletarUser() {
        if (isset($_POST['deletar'])) {
            $id = $_POST['idUser'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from login_pessoa where idPessoa = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }
    }

    public function getUsuarioById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select * from login_pessoa where idPessoa = $id";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

}
