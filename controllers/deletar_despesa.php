<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/despesa.php';

try {
    $id_despesa = $_GET['id'];

    $despesa = new Despesa($id_despesa);

    $despesa->deletar();

    header("Location: /financial/index.php");
} catch (Exception $e) {
    echo $e->getMessage();
}