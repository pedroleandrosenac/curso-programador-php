<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Processamento do Login");
?>

<?php senacClassSession("Processamento do login", __LINE__); ?>

<?php
$contas = [
    ["nome" => "Ana Souza",   "email" => "ana@email.com",   "senha" => "123456"],
    ["nome" => "Carlos Lima", "email" => "carlos@email.com", "senha" => "abcdef"],
];

// A lógica de login será construída aqui, em aula, junto com a turma.

?>

<?php
senacFooter("Pedro Leandro");
?>