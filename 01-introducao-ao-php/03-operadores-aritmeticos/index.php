<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Operadores Aritméticos");
?>

<?php senacClassSession("Operadores de atribuição", __LINE__); ?>

<?php
senacTag("=", null, "https://www.php.net/manual/pt_BR/language.operators.assignment.php");
?>

<p>
    O <strong>=</strong> atribui um valor a uma variável.
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$total = 10;
$nome = "Maria";

?>'
);
?>
</div>

<?php senacClassSession("Incremento e decremento", __LINE__, "orange"); ?>

<?php senacTag("++ e --", null, "https://www.php.net/manual/pt_BR/language.operators.increment.php"); ?>

<p>
    Um atalho ainda mais curto para somar ou subtrair exatamente
    <strong>1</strong> — o caso mais comum de todos, principalmente em
    contadores.
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$contador = 5;

$contador++;   // é o mesmo que: $contador += 1;   → 6
$contador--;   // é o mesmo que: $contador -= 1;   → 5

?>'
);
?>
</div>

<?php senacClassSession("Operadores aritméticos", __LINE__); ?>

<?php senacTag("+ - * / % **", null, "https://www.php.net/manual/pt_BR/language.operators.arithmetic.php"); ?>

<p>As operações matemáticas básicas do PHP:</p>

<ul>
    <li><strong>+</strong> — soma</li>
    <li><strong>-</strong> — subtração</li>
    <li><strong>*</strong> — multiplicação</li>
    <li><strong>/</strong> — divisão</li>
    <li><strong>%</strong> — módulo (o resto de uma divisão)</li>
    <li><strong>**</strong> — potência (elevado a)</li>
</ul>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$soma = 10 + 3;        // 13
$subtracao = 10 - 3;   // 7
$multiplicacao = 10 * 3;   // 30
$divisao = 10 / 3;     // 3.3333...
$modulo = 10 % 3;      // 1  (resto da divisão de 10 por 3)
$potencia = 10 ** 3;   // 1000  (10 elevado a 3)

?>'
);
?>
</div>

<?php
senacAlert('O módulo (%) é muito usado para descobrir se um número é par ou ímpar: se $numero % 2 for igual a 0, o número é par.', "info");
senacAlert("Exercício: abra o index.php da pasta 03-operadores-aritmeticos-pratica e monte sua calculadora simples.", "accept");
senacFooter("Pedro Leandro");
?>