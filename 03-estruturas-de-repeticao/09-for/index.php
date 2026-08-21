<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Estrutura de Repetição — for");
?>

<?php senacClassSession("Estrutura for — sintaxe e uso", __LINE__); ?>

<?php senacTag("for", null, "https://www.php.net/manual/pt_BR/control-structures.for.php"); ?>

<p>
    O <strong>for</strong> repete um bloco de código um número
    <strong>conhecido</strong> de vezes. Ele tem 3 partes, separadas por
    ponto e vírgula: onde começar, até quando repetir, e o que fazer a
    cada volta.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

for ($i = 1; $i <= 10; $i++) {
    echo "5 x $i = " . (5 * $i);
}

?>'
    );
    ?>
</div>

<?php
senacAlert("As 3 partes do for: \$i = 1 (ponto de partida) · \$i <= 10 (condição para continuar) · \$i++ (o que muda a cada volta).", "info");
?>

<?php senacClassSession("Contadores e acumuladores", __LINE__, "orange"); ?>

<p>
    <strong>Contador</strong> é uma variável que só conta quantas vezes o
    laço rodou (o próprio $i do exemplo acima). <strong>Acumulador</strong>
    é uma variável que vai <strong>somando</strong> valores a cada volta —
    duas ideias diferentes que aparecem juntas o tempo todo.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$vendasPorDia = [1200, 1500, 980, 2100, 1750]; // valores fixos, um por dia
$totalVendido = 0; // o acumulador começa zerado

for ($dia = 0; $dia < 5; $dia++) {
    $totalVendido += $vendasPorDia[$dia]; // soma a cada volta
}

echo "Total vendido na semana: R$ $totalVendido";

?>'
    );
    ?>
</div>

<?php
senacAlert("O acumulador sempre precisa começar com um valor inicial (geralmente 0) ANTES do for — se não, o PHP não sabe a partir de que valor somar.", "info");
?>

<?php senacClassSession("Aplicação real — parcelamento de compra", __LINE__); ?>

<p>
    Uma das aplicações mais comuns do <strong>for</strong> no mercado:
    gerar a lista de parcelas de uma compra, exatamente como qualquer
    checkout de e-commerce faz.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$valorTotal = 1200;
$numeroDeParcelas = 4;
$valorDaParcela = $valorTotal / $numeroDeParcelas;

for ($parcela = 1; $parcela <= $numeroDeParcelas; $parcela++) {
    echo "Parcela $parcela de $numeroDeParcelas: R$ $valorDaParcela";
}

?>'
    );
    ?>
</div>

<?php
senacAlert("Exercício: abra o index.php da pasta 10-estrutura-for-pratica e pratique o for.", "accept");
senacFooter("Pedro Leandro");
?>
