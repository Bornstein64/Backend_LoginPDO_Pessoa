<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Inicializa a sessão

session_start();

//Renova todas as variáveis da sessão
$_SESSION = array();

//Destruir sessão
session_destroy();

//Redirecionar para tela de login após logout
header("Location: ../view/login.php");
exit;