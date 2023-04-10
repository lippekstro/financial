<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/entrada.php';

try {
    $id_entrada = $_POST['id_entrada'];
    $nome_entrada = htmlspecialchars($_POST['nome_entrada']);
    $valor = htmlspecialchars($_POST['valor']);
    $data = $_POST['data_mes'];

    $entrada = new entrada($id_entrada);
    $entrada->nome_entrada = $nome_entrada;
    $entrada->valor = $valor;
    $entrada->data_mes = $data;
    $entrada->editar();

    header("Location: /financial/index.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}