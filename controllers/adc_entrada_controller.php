<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/entrada.php';

try {
    $nome_entrada = htmlspecialchars($_POST['nome_entrada']);
    $valor = $_POST['valor'];
    $data = $_POST['data_mes'];

    $entrada = new entrada();
    $entrada->nome_entrada = $nome_entrada;
    $entrada->valor = $valor;
    $entrada->data_mes = $data;
    $entrada->criar();

    header("Location: /financial/index.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
