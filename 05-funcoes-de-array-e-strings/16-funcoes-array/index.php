<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções de Array");
?>

<?php senacClassSession("count() — quantos itens existem", __LINE__); ?>

<?php senacTag("count()", null, "https://www.php.net/manual/pt_BR/ref.array.php"); ?>

<p><strong>count()</strong> conta quantos itens existem num array.</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$produtosEmEstoque = ["Ração", "Coleira", "Shampoo", "Brinquedo"];

echo count($produtosEmEstoque); // 4

?>'
    );
    ?>
</div>

<?php senacClassSession("in_array() — o valor existe na lista?", __LINE__, "orange"); ?>

<?php senacTag("in_array()", null, "https://www.php.net/manual/pt_BR/ref.array.php"); ?>

<p><strong>in_array()</strong> verifica se um valor específico está presente no array, devolvendo true ou false.</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$produtosEmEstoque = ["Ração", "Coleira", "Shampoo", "Brinquedo"];

var_dump(in_array("Coleira", $produtosEmEstoque)); // true
var_dump(in_array("Ossinho", $produtosEmEstoque));  // false

?>'
    );
    ?>
</div>

<?php senacClassSession("array_search() — em qual posição está o valor?", __LINE__); ?>

<?php senacTag("array_search()", null, "https://www.php.net/manual/pt_BR/ref.array.php"); ?>

<p>
    <strong>array_search()</strong> é parecida com in_array(), mas em vez
    de true/false, retorna a <strong>posição</strong> onde o valor foi
    encontrado — útil quando você precisa atualizar aquele item depois.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$produtosEmEstoque = ["Ração", "Coleira", "Shampoo", "Brinquedo"];

$posicao = array_search("Shampoo", $produtosEmEstoque);

echo $posicao; // 2

?>'
    );
    ?>
</div>

<?php
senacAlert("Se o valor não for encontrado, array_search() retorna false — cuidado ao comparar o resultado, porque a posição 0 também pode ser confundida com false se você usar == em vez de ===.", "info");
?>

<?php senacClassSession("array_push() — adicionando um item", __LINE__, "orange"); ?>

<?php senacTag("array_push()", null, "https://www.php.net/manual/pt_BR/ref.array.php"); ?>

<p><strong>array_push()</strong> adiciona um novo item ao final do array.</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$chamadosPendentes = ["Vazamento na torneira", "Lâmpada queimada"];

array_push($chamadosPendentes, "Ar-condicionado com defeito");

print_r($chamadosPendentes);
// [Vazamento na torneira, Lâmpada queimada, Ar-condicionado com defeito]

?>'
    );
    ?>
</div>

<?php senacClassSession("sort() e rsort() — reordenando o array", __LINE__); ?>

<?php
senacTag("sort()", null, "https://www.php.net/manual/pt_BR/ref.array.php");
senacTag("rsort()");
?>

<p>
    <strong>sort()</strong> reordena o array em ordem crescente.
    <strong>rsort()</strong> reordena em ordem decrescente. As duas
    alteram o array original e reorganizam as posições dele.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$quantidadesEmEstoque = [30, 5, 18, 42, 9];

sort($quantidadesEmEstoque);
print_r($quantidadesEmEstoque); // [5, 9, 18, 30, 42]

rsort($quantidadesEmEstoque);
print_r($quantidadesEmEstoque); // [42, 30, 18, 9, 5]

?>'
    );
    ?>
</div>

<?php senacClassSession("array_merge() — juntando dois arrays", __LINE__, "orange"); ?>

<?php senacTag("array_merge()", null, "https://www.php.net/manual/pt_BR/ref.array.php"); ?>

<p>
    <strong>array_merge()</strong> junta dois (ou mais) arrays em um só —
    a mais elaborada das funções de hoje, porque trabalha com dois
    arrays de entrada em vez de um só.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$candidatosVaga1 = ["Ana", "Carlos"];
$candidatosVaga2 = ["Beatriz", "Diego"];

$todosOsCandidatos = array_merge($candidatosVaga1, $candidatosVaga2);

print_r($todosOsCandidatos); // [Ana, Carlos, Beatriz, Diego]

?>'
    );
    ?>
</div>

<?php
senacAlert("Documentação completa de funções de array: php.net/manual/pt_BR/ref.array.php", "info");
senacFooter("Pedro Leandro");
?>
