<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções de Verificação — isset() e empty()");
?>

<?php senacClassSession("isset() — a variável existe?", __LINE__); ?>

<?php senacTag("isset()", null, "https://www.php.net/manual/pt_BR/function.isset.php"); ?>

<p>
    <strong>isset()</strong> verifica se uma variável foi criada e não é
    nula. Retorna true ou false.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$tituloDoLivro = "O Cortiço";
// $anoDePublicacao ainda não foi definida

var_dump(isset($tituloDoLivro));    // true  — a variável existe
var_dump(isset($anoDePublicacao));  // false — a variável nem foi criada

?>'
    );
    ?>
</div>

<?php senacClassSession("empty() — tem conteúdo de verdade?", __LINE__, "orange"); ?>

<?php senacTag("empty()", null, "https://www.php.net/manual/pt_BR/function.empty.php"); ?>

<p>
    <strong>empty()</strong> verifica se uma variável está vazia (string
    vazia, zero, ou não definida) — pergunta diferente de isset().
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$tituloDoLivro = "O Cortiço";
$autorDoLivro = "";

var_dump(empty($autorDoLivro));    // true  — existe, mas está vazia
var_dump(empty($tituloDoLivro));   // false — existe e tem conteúdo

?>'
    );
    ?>
</div>

<?php
senacAlert("Uma variável pode existir E estar vazia ao mesmo tempo — é o caso de \$autorDoLivro: isset() dá true, empty() também dá true. As duas funções perguntam coisas diferentes, não são substitutas uma da outra.", "info");
senacFooter("Pedro Leandro");
?>
