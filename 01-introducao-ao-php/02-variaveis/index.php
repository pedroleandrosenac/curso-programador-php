<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Variáveis, Tipos de Dados e Constantes");
?>

<?php senacClassSession("Variáveis — o que são e como declarar", __LINE__); ?>

<?php
senacTag("variáveis", null, "https://www.php.net/manual/pt_BR/language.variables.basics.php");
senacTag("$");
?>

<p>
    Imagine um <strong>guarda-roupa</strong>: com várias gavetas, e cada
    gaveta tem uma etiqueta dizendo o que tem dentro dela. Uma variável
    funciona assim — é uma "gaveta" que guarda um alguma coisa, no caso do computador, guarda o valor de alguma coisa, identificada por um nome.
</p>

<p>
    Em PHP, toda variável começa com o símbolo <strong>$</strong>, seguido
    do nome que você escolher:
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$nome = "Maria";
$idade = 20;

?>'
);
?>
</div>

<p>
    Assim como você pode trocar o conteúdo de uma gaveta sem trocar a
    etiqueta, você pode trocar o valor de uma variável quantas vezes quiser
    — o nome continua o mesmo:
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$idade = 20;
$idade = 21; // a mesma gaveta, com outro valor dentro

?>'
);
?>
</div>

<?php senacClassSession("Tipos de dados", __LINE__, "orange"); ?>

<?php
senacTag("string", null, "https://www.php.net/manual/pt_BR/language.types.string.php");
senacTag("int", null, "https://www.php.net/manual/pt_BR/language.types.integer.php");
senacTag("float", null, "https://www.php.net/manual/pt_BR/language.types.float.php");
senacTag("bool", null, "https://www.php.net/manual/pt_BR/language.types.boolean.php");
senacTag("null", null, "https://www.php.net/manual/pt_BR/language.types.null.php");
?>

<p>Toda variável guarda um valor de um determinado tipo:</p>

<ul>
    <li><strong>string</strong> — texto, sempre entre aspas</li>
    <li><strong>int</strong> — número inteiro, sem casas decimais</li>
    <li><strong>float</strong> — número com casas decimais</li>
    <li><strong>bool</strong> — verdadeiro ou falso (true / false)</li>
    <li><strong>null</strong> — ausência de valor</li>
</ul>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$nome = "Maria";      // string
$idade = 20;           // int
$altura = 1.65;        // float
$aprovado = true;      // bool
$telefone = null;      // null — ainda não tem valor

?>'
);
?>
</div>

<p>
    Diferente de outras linguagens, em PHP você <strong>não precisa
    declarar o tipo</strong> antes — ele é identificado automaticamente
    pelo valor que você atribuir.
</p>

<?php senacClassSession("var_dump() — inspecionando variáveis", __LINE__); ?>

<?php senacTag("var_dump()", null, "https://www.php.net/manual/pt_BR/function.var-dump.php"); ?>

<p>
    <strong>var_dump()</strong> mostra o valor <strong>e</strong> o tipo de
    uma variável ao mesmo tempo — ótimo para "espiar" o que está guardado
    ali dentro, principalmente quando você não tem certeza do tipo.
</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

$idade = 20;
var_dump($idade);

// resultado exibido na tela:
// int(20)

?>'
);
?>
</div>

<?php
senacAlert("var_dump() é uma das ferramentas mais usadas no dia a dia para descobrir por que um código não está se comportando como esperado.", "info");
?>

<?php senacClassSession("Constantes — define() e const", __LINE__, "orange"); ?>

<?php
senacTag("const", null, "https://www.php.net/manual/pt_BR/language.constants.php");
senacTag("define()", null, "https://www.php.net/manual/pt_BR/function.define.php");
?>

<p>
    Diferente de uma variável, uma <strong>constante</strong> não muda
    depois de criada — é como uma gaveta que, depois de fechada, fica
    trancada com cadeado.
</p>

<p>Existem duas formas de criar uma constante em PHP:</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

define("PI", 3.14);   // forma mais antiga

const NOME_DO_SITE = "Meu Projeto";   // forma mais moderna

?>'
);
?>
</div>

<p>
    A comunidade PHP recomenda usar <strong>const</strong> sempre que
    possível — é o padrão mais moderno e mais alinhado com as boas
    práticas (PSR) que iremos estudar em breve.
</p>

<?php
senacAlert("Por convenção, o nome de uma constante é escrito em LETRAS_MAIÚSCULAS, separado por underline. Isso ajuda a diferenciar visualmente de uma variável comum.", "info");
senacAlert("Exercício: abra o index.php da pasta 02-variaveis-pratica e pratique tudo que vimos hoje.", "accept");
senacFooter("Pedro Leandro");
?>