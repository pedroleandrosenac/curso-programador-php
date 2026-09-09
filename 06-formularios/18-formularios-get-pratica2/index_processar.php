<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Resultado do Filtro");
?>

<?php senacClassSession("Processamento do filtro", __LINE__); ?>

<?php
$gastos = [
    ["descricao" => "Aluguel", "valor" => 1200.00, "categoria" => "Moradia"],
    ["descricao" => "Conta de luz", "valor" => 180.00, "categoria" => "Moradia"],
    ["descricao" => "Supermercado", "valor" => 450.00, "categoria" => "Alimentação"],
    ["descricao" => "Restaurante", "valor" => 95.00, "categoria" => "Alimentação"],
    ["descricao" => "Uber", "valor" => 80.00, "categoria" => "Transporte"],
    ["descricao" => "Gasolina", "valor" => 220.00, "categoria" => "Transporte"],
    ["descricao" => "Netflix", "valor" => 39.90, "categoria" => "Lazer"],
    ["descricao" => "Cinema", "valor" => 60.00, "categoria" => "Lazer"],
    ["descricao" => "Plano de saúde", "valor" => 350.00, "categoria" => "Saúde"],
];

// A lógica de filtro será construída aqui, em aula, junto com a turma.

?>

<?php
senacFooter("Pedro Leandro");
?>