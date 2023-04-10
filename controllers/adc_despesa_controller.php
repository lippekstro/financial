<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/despesa.php';

try {
    $nome_despesa = htmlspecialchars($_POST['nome_despesa']);
    $valor = $_POST['valor'];
    $data = $_POST['data_mes'];

    $despesa = new Despesa();
    $despesa->nome_despesa = $nome_despesa;
    $despesa->valor = $valor;
    $despesa->data_mes = $data;
    $despesa->criar();

    header("Location: /financial/index.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
