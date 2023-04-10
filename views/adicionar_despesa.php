<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/cabecalho.php';
?>

<section id="formulario">
    <form action="/financial/controllers/adc_despesa_controller.php" method="post" autocomplete="off">
        <h1 class="form-item">Despesa</h1>
        
        <div class="form-item">
            <label for="nome_despesa">Titulo</label>
            <input type="text" name="nome_despesa" id="nome_despesa" required>
        </div>

        <div class="form-item">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" step="0.10">
        </div>

        <div class="form-item">
            <label for="data_mes">Data</label>
            <input type="date" name="data_mes" id="data_mes">
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