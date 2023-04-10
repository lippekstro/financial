<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/cabecalho.php';

try {
    $despesa = new Despesa($_GET['id']);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section id="formulario">
    <form action="/financial/controllers/edt_despesa_controller.php" method="post" autocomplete="off">
        <h1 class="form-item">Editar Despesa</h1>

        <input type="hidden" name="id_despesa" value="<?= $despesa->id_despesa ?>">

        <div class="form-item">
            <label for="nome_despesa">Titulo</label>
            <input type="text" name="nome_despesa" id="nome_despesa" value="<?= $despesa->nome_despesa ?>">
        </div>

        <div class="form-item">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" step="0.10" value="<?= $despesa->valor ?>">
        </div>
        
        <div class="form-item">
            <label for="data_mes">Data</label>
            <input type="date" name="data_mes" id="data_mes" value="<?= $despesa->data_mes ?>">
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