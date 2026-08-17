<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Operadores Relacionais");
?>

<?php senacClassSession("Operadores relacionais", __LINE__); ?>

<?php
senacTag("== != > <", null, "https://www.php.net/manual/pt_BR/language.operators.comparison.php");
senacTag("=== !==");
?>

<p>
    Operadores relacionais <strong>comparam</strong> dois valores e sempre
    resultam em <strong>true</strong> ou <strong>false</strong> — nunca em
    outro tipo de valor.
</p>

<ul>
    <li><strong>==</strong> — igual (compara só o valor)</li>
    <li><strong>===</strong> — idêntico (compara valor e tipo)</li>
    <li><strong>!=</strong> — diferente (compara só o valor)</li>
    <li><strong>!==</strong> — não idêntico (compara valor e tipo)</li>
    <li><strong>&gt;</strong> — maior que</li>
    <li><strong>&lt;</strong> — menor que</li>
    <li><strong>&gt;=</strong> — maior ou igual</li>
    <li><strong>&lt;=</strong> — menor ou igual</li>
</ul>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$idade = 18;

var_dump($idade == 18);    // true
var_dump($idade > 17);     // true
var_dump($idade < 17);     // false
var_dump($idade >= 18);    // true

?>'
);
?>
</div>

<?php senacClassSession("Diferença entre == e === na prática", __LINE__, "orange"); ?>

<?php senacTag("== vs ===", null, "https://www.php.net/manual/pt_BR/types.comparisons.php"); ?>

<p>
    Essa é uma das pegadinhas mais comuns do PHP. O <strong>==</strong>
    compara só o <strong>valor</strong>, ignorando o tipo. Já o
    <strong>===</strong> exige que o valor <strong>e</strong> o tipo sejam
    iguais.
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

var_dump(10 == "10");    // true  — mesmo valor, tipos diferentes (int vs string), mas == ignora isso
var_dump(10 === "10");   // false — mesmo valor, mas tipos diferentes, e === não aceita

var_dump(0 == false);    // true  — PHP converte 0 para false ao comparar com ==
var_dump(0 === false);   // false — int e bool são tipos diferentes

?>'
);
?>
</div>

<?php
senacAlert("Na dúvida, use sempre === e !==. Eles evitam comparações inesperadas causadas pelo PHP convertendo tipos escondido de você.", "accept");
senacAlert("Exercício: abra o index.php da pasta 04-operadores-relacionais-pratica e teste essas comparações você mesmo.", "accept");
senacFooter("Pedro Leandro");
?>