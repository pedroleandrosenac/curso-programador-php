<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Estrutura de Repetição — while");
?>

<?php senacClassSession("Estrutura while — repetição com condição", __LINE__); ?>

<?php senacTag("while", null, "https://www.php.net/manual/pt_BR/control-structures.while.php"); ?>

    <p>
        O <strong>while</strong> repete um bloco de código <strong>enquanto</strong>
        uma condição for verdadeira — diferente do <strong>for</strong>, aqui
        não sabemos de antemão quantas vezes o laço vai rodar.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$senhaDigitada = "1234";
$senhaCorreta = "9999";
$tentativas = 0;

while ($senhaDigitada !== $senhaCorreta && $tentativas < 3) {
    $tentativas++;
    echo "Tentativa $tentativas: senha incorreta.";

    // simulando uma nova tentativa (num sistema real, viria de um formulário)
    $senhaDigitada = "1234";
}

if ($tentativas >= 3) {
    echo "Conta bloqueada por excesso de tentativas.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("Cuidado com o loop infinito! Se a condição do while nunca virar falsa, o código roda para sempre. Sempre garanta que algo dentro do while muda a condição a cada volta.", "info");
?>

<?php senacClassSession("while vs for — quando usar cada um", __LINE__, "orange"); ?>

    <p>
        Use <strong>for</strong> quando você <strong>sabe</strong> quantas vezes
        precisa repetir (ex: "de 1 até 10"). Use <strong>while</strong> quando
        a repetição depende de uma <strong>condição que só se sabe durante a
            execução</strong> — como um estoque que vai sendo consumido até acabar.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$estoqueAtual = 5;
$vendasRealizadas = 0;

while ($estoqueAtual > 0) {
    $estoqueAtual--;
    $vendasRealizadas++;
    echo "Venda $vendasRealizadas realizada. Estoque restante: $estoqueAtual";
}

echo "Estoque esgotado após $vendasRealizadas vendas.";

?>'
        );
        ?>
    </div>

<?php
senacAlert("Exercício: abra o index.php da pasta 11-estrutura-while-pratica e pratique o while.", "accept");
senacFooter("Pedro Leandro");
?>