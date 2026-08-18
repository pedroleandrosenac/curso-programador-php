<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Estruturas Condicionais — if, else, elseif");
?>

<?php senacClassSession("if — sozinho", __LINE__); ?>

<?php senacTag("if", null, "https://www.php.net/manual/pt_BR/control-structures.if.php"); ?>

<p>
    O <strong>if</strong> executa um bloco de código <strong>somente se</strong>
    a condição for verdadeira. Se for falsa, o PHP simplesmente pula o bloco
    e segue em frente — nada acontece.
</p>

<div class="code">
<?php
    echo htmlspecialchars(
        '<?php

$idade = 20;

if ($idade >= 18) {
    echo "Pode dirigir.";
}

?>'
    );
    ?>
</div>

<?php
senacAlert('Se $idade fosse 15, nada seria exibido na tela — o bloco dentro do if simplesmente não roda.', "info");
?>

<?php senacClassSession("if / else", __LINE__, "orange"); ?>

<?php senacTag("if / else", null, "https://www.php.net/manual/pt_BR/control-structures.else.php"); ?>

<p>
    O <strong>else</strong> adiciona um "caminho alternativo" para quando a
    condição é falsa. Agora, sempre um dos dois blocos roda — nunca os
    dois, nunca nenhum.
</p>

<div class="code">
<?php
    echo htmlspecialchars(
        '<?php

$notaFinal = 6;

if ($notaFinal >= 7) {
    echo "Aprovado!";
} else {
    echo "Reprovado.";
}

?>'
    );
    ?>
</div>

<?php senacClassSession("if / elseif / else", __LINE__); ?>

<?php senacTag("elseif", null, "https://www.php.net/manual/pt_BR/control-structures.elseif.php"); ?>

<p>
    O <strong>elseif</strong> permite testar <strong>várias condições em
        sequência</strong>, cada uma com seu próprio bloco — útil quando existem
    mais de 2 caminhos possíveis. O PHP testa de cima para baixo e para no
    primeiro que for verdadeiro.
</p>

<div class="code">
<?php
    echo htmlspecialchars(
        '<?php

$nota = 8;

if ($nota >= 9) {
    echo "Conceito A";
} elseif ($nota >= 7) {
    echo "Conceito B";
} elseif ($nota >= 5) {
    echo "Conceito C";
} else {
    echo "Conceito D";
}

?>'
    );
    ?>
</div>

<?php
senacAlert('A ordem importa! Se $nota = 8 e a primeira verificação fosse ">= 7", o PHP pararia ali e nunca chegaria a checar ">= 9". Por isso a condição mais "exigente" vem primeiro.', "info");
?>

<?php senacClassSession("Condicionais aninhadas", __LINE__, "orange"); ?>

<?php senacTag("if aninhado"); ?>

<p>
    Um <strong>if dentro de outro if</strong> — útil quando a segunda
    pergunta só faz sentido depois que a primeira já foi confirmada como
    verdadeira.
</p>

<div class="code">
<?php
    echo htmlspecialchars(
        '<?php

$idade = 25;
$temIngressoVIP = true;

if ($idade >= 18) {
    echo "Pode entrar no evento.";

    if ($temIngressoVIP) {
        echo "Acesso liberado à área VIP.";
    }
} else {
    echo "Não pode entrar no evento.";
}

?>'
    );
    ?>
</div>

<?php
senacAlert("Repare que a verificação do ingresso VIP só roda se a pessoa já for maior de idade. Se fosse menor, o PHP nem chegaria a olhar para o ingresso.", "info");
senacAlert("Exercício: abra o index.php da pasta 06-condicional-if-else-pratica e pratique tudo que vimos hoje.", "accept");
senacFooter("Pedro Leandro");
?>
