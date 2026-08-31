<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções — Declaração, Parâmetros e Retorno");
?>

<?php senacClassSession("O que é uma função e por que ela existe", __LINE__); ?>

<?php senacTag("function", null, "https://www.php.net/manual/pt_BR/functions.user-defined.php"); ?>

<p>
    Uma função é um <strong>bloco de código com nome</strong>, que você
    escreve uma vez e pode usar quantas vezes quiser — sem precisar copiar
    e colar a mesma lógica repetidamente.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

function saudacao($nome) {
    echo "Olá, $nome! Bem-vindo ao Pet Shop.";
}

saudacao("Maria");
saudacao("João");

?>'
    );
    ?>
</div>

<?php
senacAlert("A função é a mesma nos dois casos — só o parâmetro \$nome muda. Essa é a ideia central que vale para toda função que você for criar.", "info");
?>

<?php senacClassSession("Retorno — return vs echo", __LINE__, "orange"); ?>

<?php senacTag("return", null, "https://www.php.net/manual/pt_BR/function.return.php"); ?>

<p>
    <strong>echo</strong> mostra algo na tela e "morre" ali. <strong>return</strong>
    devolve um valor que pode ser guardado numa variável e reaproveitado
    depois, em outra parte do código.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

function verificarMaioridade($idade) {
    return $idade >= 18;
}

$podeAdotarSozinho = verificarMaioridade(20);

if ($podeAdotarSozinho) {
    echo "Cliente pode adotar um pet sem responsável.";
}

?>'
    );
    ?>
</div>

<?php senacClassSession("Escopo de variáveis — local e global", __LINE__); ?>

<?php senacTag("global", null, "https://www.php.net/manual/pt_BR/language.variables.scope.php"); ?>

<p>
    O que é criado <strong>dentro</strong> de uma função só existe ali
    dentro — como uma sala com a porta fechada. Para uma função enxergar
    uma variável de fora, é preciso usar <strong>global</strong>.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$nomeDaLoja = "Pedro Pet Shop"; // variável global

function mostrarNomeErrado() {
    echo $nomeDaLoja; // não funciona — a função não enxerga
}

function mostrarNomeCorreto() {
    global $nomeDaLoja;
    echo $nomeDaLoja; // agora funciona
}

mostrarNomeCorreto();

?>'
    );
    ?>
</div>

<?php
senacAlert("Na prática, é mais comum PASSAR a variável como parâmetro do que usar global — deixa a função mais clara sobre o que ela precisa para funcionar.", "info");
?>

<?php senacClassSession("Exemplo completo — calculando o salário líquido", __LINE__, "orange"); ?>

<p>
    Reaproveitando o <strong>if/elseif</strong> das faixas de INSS que já
    resolvemos antes — agora encapsulado numa função reutilizável.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

function calcularSalarioLiquido($salarioBruto) {
    if ($salarioBruto <= 1621) {
        $aliquotaINSS = 0.075;
    } elseif ($salarioBruto <= 2902.84) {
        $aliquotaINSS = 0.09;
    } elseif ($salarioBruto <= 4354.27) {
        $aliquotaINSS = 0.12;
    } else {
        $aliquotaINSS = 0.14;
    }

    $descontoINSS = $salarioBruto * $aliquotaINSS;
    return $salarioBruto - $descontoINSS;
}

echo calcularSalarioLiquido(3000);
echo calcularSalarioLiquido(5000);
echo calcularSalarioLiquido(7000);

?>'
    );
    ?>
</div>

<?php
senacAlert("Antes, esse cálculo era feito uma vez só. Agora, com a função, dá pra calcular o salário líquido de quantos funcionários quiser, sem repetir o bloco de if inteiro.", "accept");
?>

<?php senacClassSession("Exercício prático — funções reutilizáveis", __LINE__); ?>

<p>Crie 3 funções, cada uma recebendo parâmetros e usando <strong>return</strong>:</p>

<ul>
    <li><strong>saudacaoPersonalizada($nome, $horario)</strong> — retorna "Bom dia", "Boa tarde" ou "Boa noite" + nome, dependendo do horário</li>
    <li><strong>calcularFrete($peso)</strong> — retorna o valor do frete por faixa de peso</li>
    <li><strong>verificarEstoqueBaixo($quantidadeAtual, $quantidadeMinima)</strong> — retorna true/false dizendo se é hora de repor o estoque</li>
</ul>

<?php
senacAlert("Chame cada função pelo menos duas vezes, com valores diferentes, e exiba o resultado com echo.", "accept");
senacFooter("Pedro Leandro");
?>
