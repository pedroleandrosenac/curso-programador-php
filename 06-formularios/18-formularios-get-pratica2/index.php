<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Filtro de Gastos por Categoria");
?>

<?php senacClassSession("Formulário de filtro", __LINE__); ?>

    <form action="index_processar.php" method="GET">
        <select name="categoria">
            <option value="">Todas as categorias</option>
            <option value="Moradia">Moradia</option>
            <option value="Alimentação">Alimentação</option>
            <option value="Transporte">Transporte</option>
            <option value="Lazer">Lazer</option>
            <option value="Saúde">Saúde</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

<?php
senacFooter("Pedro Leandro");
?>