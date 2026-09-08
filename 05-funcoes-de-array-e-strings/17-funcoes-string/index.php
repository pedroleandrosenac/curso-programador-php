<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções de String — normal vs. multi-byte (mb_)");
?>

<?php senacClassSession("strlen() vs mb_strlen()", __LINE__); ?>

<?php
senacTag("strlen()", null, "https://www.php.net/manual/pt_BR/function.strlen.php");
senacTag("mb_strlen()", null, "https://www.php.net/manual/pt_BR/ref.mbstring.php");
?>

<p>
    <strong>strlen()</strong> conta o tamanho do texto em bytes.
    <strong>mb_strlen()</strong> (multi-byte) conta em caracteres de
    verdade. Com acento, os dois divergem.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$nome = "José";

echo strlen($nome);     // 5  — ERRADO! conta bytes, não letras
echo mb_strlen($nome);  // 4  — CORRETO — conta caracteres

?>'
    );
    ?>
</div>

<?php senacClassSession("strtoupper() vs mb_strtoupper()", __LINE__, "orange"); ?>

<?php
senacTag("strtoupper()", null, "https://www.php.net/manual/pt_BR/function.strtoupper.php");
senacTag("mb_strtoupper()", null, "https://www.php.net/manual/pt_BR/ref.mbstring.php");
?>

<p>A versão normal não converte corretamente letras acentuadas.</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$cidade = "São Paulo";

echo strtoupper($cidade);     // SãO PAULO  — errado, não converteu o ã
echo mb_strtoupper($cidade);  // SÃO PAULO  — correto

?>'
    );
    ?>
</div>

<?php senacClassSession("trim() vs mb_trim()", __LINE__); ?>

<?php
senacTag("trim()", null, "https://www.php.net/manual/pt_BR/function.trim.php");
senacTag("mb_trim()", null, "https://www.php.net/manual/pt_BR/ref.mbstring.php");
?>

<p>
    <strong>trim()</strong> remove espaços em branco do início e do fim
    do texto. <strong>mb_trim()</strong> faz o mesmo, mas lida melhor com
    espaços especiais de outros idiomas/codificações.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$nomeDoProduto = "   Ração Premium   ";

echo trim($nomeDoProduto);    // "Ração Premium"
echo mb_trim($nomeDoProduto); // "Ração Premium"

?>'
    );
    ?>
</div>

<?php
senacAlert("mb_trim() é recente (PHP 8.4+). Em versões mais antigas do PHP, trim() já resolve bem a maioria dos casos comuns de espaço em branco.", "info");
?>

<?php senacClassSession("strpos() vs mb_strpos()", __LINE__, "orange"); ?>

<?php
senacTag("strpos()", null, "https://www.php.net/manual/pt_BR/function.strpos.php");
senacTag("mb_strpos()", null, "https://www.php.net/manual/pt_BR/ref.mbstring.php");
?>

<p>
    As duas encontram a <strong>posição</strong> onde um trecho aparece
    dentro do texto. Com acento antes do trecho buscado, a contagem de
    posição pode divergir entre as duas versões.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$descricaoChamado = "Vazamento urgente no bebedouro";

var_dump(strpos($descricaoChamado, "urgente"));    // posição em bytes
var_dump(mb_strpos($descricaoChamado, "urgente")); // posição em caracteres

?>'
    );
    ?>
</div>

<?php senacClassSession("strstr() vs mb_strstr()", __LINE__); ?>

<?php
senacTag("strstr()", null, "https://www.php.net/manual/pt_BR/function.strstr.php");
senacTag("mb_strstr()", null, "https://www.php.net/manual/pt_BR/ref.mbstring.php");
?>

<p>
    A mais elaborada do grupo: <strong>strstr()</strong> retorna tudo a
    partir da <strong>primeira ocorrência</strong> de um trecho dentro do
    texto (não só a posição, o texto restante inteiro). Com texto
    acentuado antes do trecho buscado, a versão normal pode cortar um
    caractere no meio; a versão mb_ não.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$descricaoChamado = "Reforma no pátio: piso quebrado";

echo strstr($descricaoChamado, "piso");     // "piso quebrado"
echo mb_strstr($descricaoChamado, "piso");  // "piso quebrado"

?>'
    );
    ?>
</div>

<?php
senacAlert("Regra prática: todo sistema em português deveria usar as versões mb_ por padrão, não só quando 'der problema'. Documentação completa: php.net/manual/pt_BR/ref.mbstring.php", "accept");
senacFooter("Pedro Leandro");
?>
