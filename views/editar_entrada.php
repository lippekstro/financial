<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/cabecalho.php';

try {
    $entrada = new entrada($_GET['id']);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section id="formulario">
    <form action="/financial/controllers/edt_entrada_controller.php" method="post" autocomplete="off">
        <h1 class="form-item">Editar Entrada</h1>

        <input type="hidden" name="id_entrada" value="<?= $entrada->id_entrada ?>">

        <div class="form-item">
            <label for="nome_entrada">Titulo</label>
            <input type="text" name="nome_entrada" id="nome_entrada" value="<?= $entrada->nome_entrada ?>">
        </div>

        <div class="form-item">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" step="0.10" value="<?= $entrada->valor ?>">
        </div>

        <div class="form-item">
            <label for="data_mes">Data</label>
            <input type="date" name="data_mes" id="data_mes" value="<?= $entrada->data_mes ?>">
        </div>

        <div class="form-item">
            <button type="submit" class="btn btn-confirma">
                Salvar
            </button>
        </div>

    </form>

</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/rodape.php';
?>