<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Processamento da Avaliação");
?>

<?php senacClassSession("Processamento da avaliação", __LINE__); ?>

<?php

// A lógica de sanitização e validação será construída aqui, em aula, junto com a turma.
// Campos disponíveis: $_POST["nota"], $_POST["comentario"], $_POST["email"]
//
// Lembrete: a nota deve ser validada com FILTER_VALIDATE_INT (não intval()),
// para conseguir REJEITAR uma entrada inválida em vez de aceitar como 0.

?>

<?php
senacFooter("Pedro Leandro");
?>