<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/despesa.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/models/entrada.php';
date_default_timezone_set('America/Sao_Paulo');

if (isset($_GET['data_mes'])) {
    $mes = date('m', strtotime($_GET['data_mes']));
} else {
    $mes = date('m');
}

try {
    $lista_despesas = Despesa::listar($mes);
    $lista_entradas = Entrada::listar($mes);
} catch (Exception $e) {
    echo $e->getMessage();
}

$data = array(array('Titulo', 'Valor'));
$soma_despesa = 0;
foreach ($lista_despesas as $d) {
    array_push($data, array($d["nome_despesa"], $d["valor"]));
    $soma_despesa += $d['valor'];
}

$dataEntrada = array(array('Titulo', 'Valor'));
$soma_entrada = 0;
foreach ($lista_entradas as $e) {
    array_push($dataEntrada, array($e["nome_entrada"], $e["valor"]));
    $soma_entrada += $e['valor'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial</title>
    <link rel="shortcut icon" href="/financial/imgs/dinheiro.svg" type="image/x-icon">

    <link rel="stylesheet" href="/financial/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="/financial/js/menu_lateral.js" async></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/financial/js/grafico.js" async></script>
</head>

<body id="main">
    <header>
        <span id="hamburger" class="material-symbols-outlined" style="cursor:pointer" onclick="openNav()">menu</span>
    </header>

    <nav id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn material-symbols-outlined" onclick="closeNav()">close</a>
        <a href="/financial/index.php"> <span class="material-symbols-outlined">home</span> Inicio</a>
        <a href="/financial/views/adicionar_despesa.php"> <span class="material-symbols-outlined">money_off</span> Cadastrar Despesa</a>
        <a href="/financial/views/adicionar_entrada.php"> <span class="material-symbols-outlined">payments</span> Cadastrar Entrada</a>
        <a href="/financial/views/relatorio.php"> <span class="material-symbols-outlined">table_chart</span> Relatório</a>
    </nav>

    <main>