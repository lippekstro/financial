<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/despesa.php';

try {
    $id_despesa = $_POST['id_despesa'];
    $nome_despesa = htmlspecialchars($_POST['nome_despesa']);
    $valor = htmlspecialchars($_POST['valor']);
    $data = $_POST['data_mes'];

    $despesa = new Despesa($id_despesa);
    $despesa->nome_despesa = $nome_despesa;
    $despesa->valor = $valor;
    $despesa->data_mes = $data;
    $despesa->editar();

    header("Location: /financial/index.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}