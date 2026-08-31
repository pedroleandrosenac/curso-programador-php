<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções Nativas do PHP");
?>

<?php senacClassSession("Funções de data — date(), time(), strtotime()", __LINE__); ?>

<?php
senacTag("date()", null, "https://www.php.net/manual/pt_BR/function.date.php");
senacTag("time()", null, "https://www.php.net/manual/pt_BR/function.time.php");
senacTag("strtotime()", null, "https://www.php.net/manual/pt_BR/function.strtotime.php");
?>

    <p>
        <strong>date()</strong> formata a data/hora atual do jeito que você
        quiser. <strong>time()</strong> retorna o instante atual em segundos
        (a base de qualquer cálculo com tempo). <strong>strtotime()</strong>
        converte um texto de data em algo que o PHP consegue comparar.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

function registrarMatricula($nomeAluno) {
    $dataDeHoje = date("d/m/Y");
    echo "$nomeAluno matriculado em $dataDeHoje.";
}

registrarMatricula("Carlos");

?>'
        );
        ?>
    </div>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$dataVencimento = strtotime("2026-09-10");
$hoje = time();

if ($dataVencimento < $hoje) {
    echo "Mensalidade vencida!";
} else {
    echo "Mensalidade em dia.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("strtotime() e time() sempre trabalham com segundos — por isso dá pra comparar as duas datas direto com < ou >, como em qualquer outro número.", "info");
?>

<?php senacClassSession("Funções matemáticas — round(), ceil(), floor(), abs()", __LINE__, "orange"); ?>

<?php
senacTag("round()", null, "https://www.php.net/manual/pt_BR/function.round.php");
senacTag("ceil()", null, "https://www.php.net/manual/pt_BR/function.ceil.php");
senacTag("floor()", null, "https://www.php.net/manual/pt_BR/function.floor.php");
senacTag("abs()", null, "https://www.php.net/manual/pt_BR/function.abs.php");
?>

    <p><strong>round()</strong> arredonda para o mais próximo:</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

echo round(4.495, 2); // 4.5 — resolve aquele preço "estranho" do saco de ração!

?>'
        );
        ?>
    </div>

    <p><strong>ceil()</strong> sempre arredonda para cima — útil para calcular quantas caixas são necessárias:</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

function calcularCaixasNecessarias($totalDeItens, $itensPorCaixa) {
    return ceil($totalDeItens / $itensPorCaixa);
}

echo calcularCaixasNecessarias(25, 6); // 5 caixas — mesmo sobrando só 1 item, precisa de mais uma caixa inteira

?>'
        );
        ?>
    </div>

    <p><strong>floor()</strong> sempre arredonda para baixo — útil para calcular quantos meses inteiros um saldo cobre:</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

function mesesCobertos($saldoDisponivel, $valorMensalidade) {
    return floor($saldoDisponivel / $valorMensalidade);
}

echo mesesCobertos(500, 120); // 4 meses (sobra um pouco, mas não fecha o 5º mês inteiro)

?>'
        );
        ?>
    </div>

    <p><strong>abs()</strong> sempre devolve o valor positivo — útil para medir uma diferença, não importando o sinal:</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$estoqueEsperado = 50;
$estoqueContado = 47;

$diferenca = abs($estoqueEsperado - $estoqueContado);

echo "Diferença no estoque: $diferenca unidades";

?>'
        );
        ?>
    </div>

<?php senacClassSession("Exercício prático — usando funções nativas", __LINE__); ?>

    <ul>
        <li><strong>formatarDataDeCadastro()</strong> — retorna a data de hoje formatada como "dd/mm/aaaa"</li>
        <li><strong>calcularCaixasNecessarias($totalDeItens, $itensPorCaixa)</strong> — usando ceil()</li>
        <li><strong>arredondarPreco($precoComCasasDecimaisEstranhas)</strong> — usando round() com 2 casas decimais</li>
    </ul>

<?php
senacFooter("Pedro Leandro");
?>