<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/cabecalho.php';
?>

<div style="margin: 1rem;">
    <form action="">
        <?php if (isset($_GET['data_mes'])) : ?>
            <input type="month" name="data_mes" id="data_mes" value="<?= $_GET['data_mes'] ?>">
        <?php else : ?>
            <input type="month" name="data_mes" id="data_mes" value="<?= date('today') ?>">
        <?php endif; ?>
        <button class="btn">
            Ir
        </button>
    </form>
</div>

<div class="container-flex">
    <section class="graf-tab card" id="despesas">
        <div id="myChart"></div>

        <table>
            <caption>Despesas</caption>
            <tr>
                <th>Titulo</th>
                <th>Valor</th>
                <th colspan="2">
                    <a href="/financial/views/adicionar_despesa.php">
                        <span class="material-symbols-outlined">add</span>
                    </a>
                </th>
            </tr>
            <?php foreach ($lista_despesas as $d) : ?>
                <tr>
                    <td><?= $d['nome_despesa'] ?></td>
                    <td>R$ <?= $d['valor'] ?></td>
                    <td>
                        <a href="/financial/views/editar_despesa.php?id=<?= $d['id_despesa'] ?>">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                    </td>
                    <td>
                        <a href="/financial/controllers/deletar_despesa.php?id=<?= $d['id_despesa'] ?>">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <section class="graf-tab card" id="exibe-valor">
        <span>Saldo: R$ <?= $dinheiro_restante = $soma_entrada - $soma_despesa; ?></span>
        <?php if (isset($_GET['data_mes']) && date('m', strtotime($_GET['data_mes'])) != date('m')) : ?>
            <span>Dias Restantes: Não é o mês atual </span>
        <?php else : ?>
            <span>Dias Restantes: <?= $dias_restantes = date('t') - date('d'); ?></span>
            <span>Disponivel/Dia: R$ <?= number_format($dinheiro_restante / $dias_restantes, 2); ?></span>
        <?php endif; ?>
    </section>

    <section class="graf-tab card" id="entradas">
        <div id="entradasGraf"></div>

        <table>
            <caption>Entradas</caption>
            <tr>
                <th>Titulo</th>
                <th>Valor</th>
                <th colspan="2">
                    <a href="/financial/views/adicionar_entrada.php">
                        <span class="material-symbols-outlined">add</span>
                    </a>
                </th>
            </tr>
            <?php foreach ($lista_entradas as $e) : ?>
                <tr>
                    <td><?= $e['nome_entrada'] ?></td>
                    <td><?= $e['valor'] ?></td>
                    <td>
                        <a href="/financial/views/editar_entrada.php?id=<?= $e['id_entrada'] ?>">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                    </td>
                    <td>
                        <a href="/financial/controllers/deletar_entrada.php?id=<?= $e['id_entrada'] ?>">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>


</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/templates/rodape.php';
?>