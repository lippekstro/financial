<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/entrada.php';

try {
    $id_entrada = $_GET['id'];

    $entrada = new entrada($id_entrada);

    $entrada->deletar();

    header("Location: /financial/index.php");
} catch (Exception $e) {
    echo $e->getMessage();
}