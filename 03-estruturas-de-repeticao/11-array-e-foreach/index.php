<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Arrays e a Estrutura foreach");
?>

<?php senacClassSession("O que é um array", __LINE__); ?>

<?php senacTag("array", null, "https://www.php.net/manual/pt_BR/language.types.array.php"); ?>

    <p>
        Um <strong>array</strong> é uma variável que guarda <strong>vários
            valores</strong> ao mesmo tempo, em vez de um só. Pense numa lista —
        cada posição da lista guarda um item.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$produtos = ["Ração", "Coleira", "Brinquedo", "Shampoo"];

echo $produtos[0]; // "Ração" — arrays começam a contar do 0
echo $produtos[2]; // "Brinquedo"

?>'
        );
        ?>
    </div>

<?php
senacAlert("A contagem de posições sempre começa em 0, não em 1. O primeiro item é \$produtos[0], não \$produtos[1].", "info");
?>

<?php senacClassSession("foreach — percorrendo um array", __LINE__, "orange"); ?>

<?php senacTag("foreach", null, "https://www.php.net/manual/pt_BR/control-structures.foreach.php"); ?>

    <p>
        O <strong>foreach</strong> percorre um array <strong>item por item</strong>,
        automaticamente — sem precisar controlar posição nem contador, como o
        for exigiria.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$carrinho = [
    "Ração" => 89.90,
    "Coleira" => 35.00,
    "Shampoo" => 22.50,
];

$totalDaCompra = 0;

foreach ($carrinho as $produto => $preco) {
    echo "$produto: R$ $preco";
    $totalDaCompra += $preco;
}

echo "Total da compra: R$ $totalDaCompra";

?>'
        );
        ?>
    </div>

<?php
senacAlert("Esse é um array associativo — cada item tem uma chave (o nome do produto) e um valor (o preço), em vez de só uma posição numérica.", "info");
?>

<?php senacClassSession("Combinando foreach com if", __LINE__); ?>

    <p>
        O <strong>foreach</strong> fica ainda mais útil combinado com um
        <strong>if</strong> dentro dele — para filtrar ou contar itens que
        atendem a uma condição.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$pedidos = ["entregue", "pendente", "entregue", "cancelado", "entregue"];

$totalEntregues = 0;

foreach ($pedidos as $status) {
    if ($status === "entregue") {
        $totalEntregues++;
    }
}

echo "Pedidos entregues: $totalEntregues de " . count($pedidos);

?>'
        );
        ?>
    </div>

<?php
senacAlert("count() conta quantos itens existem no array — útil para saber o total sem precisar contar na mão.", "info");
senacAlert("Exercício: abra o index.php da pasta 12-foreach-arrays-pratica e pratique o foreach.", "accept");
senacFooter("Pedro Leandro");
?>