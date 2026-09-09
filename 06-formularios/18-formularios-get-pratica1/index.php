<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Busca de Livro com GET");
?>

<?php senacClassSession("Formulário de busca", __LINE__); ?>

    <form action="index_processar.php" method="GET">
        <input type="text" name="busca" placeholder="Buscar livro...">
        <button type="submit">Buscar</button>
    </form>

<?php
senacFooter("Pedro Leandro");
?>