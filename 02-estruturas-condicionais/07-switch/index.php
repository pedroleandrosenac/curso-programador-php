<?php
require __DIR__ . "/../senac/senac.php";
senacClassName("Estrutura switch");
?>

<?php senacClassSession("Estrutura switch — quando usar no lugar do if", __LINE__); ?>

<?php senacTag("switch", null, "https://www.php.net/manual/pt_BR/control-structures.switch.php"); ?>

<p>
    O <strong>switch</strong> compara uma mesma variável com vários valores
    possíveis, um por um. É uma alternativa ao <strong>if / elseif / else</strong>
    quando você está testando sempre a <strong>mesma variável</strong> contra
    valores diferentes.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$diaDaSemana = "terça";

switch ($diaDaSemana) {
    case "segunda":
        echo "Início da semana!";
        break;

    case "terça":
        echo "Aula de PHP hoje!";
        break;

    case "sábado":
    case "domingo":
        echo "Fim de semana!";
        break;

    default:
        echo "Dia comum.";
}

?>'
    );
    ?>
</div>

<?php
senacAlert("O break é essencial! Sem ele, o PHP continua executando os cases seguintes, mesmo que não batam com o valor. É um dos erros mais comuns com switch.", "info");
senacAlert("Dois case seguidos sem break entre eles (como sábado e domingo no exemplo) compartilham o mesmo bloco de código — útil quando vários valores devem ter a mesma resposta.", "info");
?>

<?php senacClassSession("PHP 8: match — a versão moderna do switch", __LINE__, "orange"); ?>

<?php senacTag("match()", null, "https://www.php.net/manual/pt_BR/control-structures.match.php"); ?>

<p>
    O PHP 8 trouxe uma alternativa mais enxuta ao <strong>switch</strong>,
    chamada <strong>match</strong>. Vamos ver ela com mais detalhes na
    próxima aula — por enquanto, fica o gancho: o mesmo exemplo acima, em
    match, ficaria bem mais curto, sem precisar de break.
</p>

<?php
senacAlert("Exercício: abra o index.php da pasta 07-switch-pratica e pratique o switch.", "accept");
senacFooter("Pedro Leandro");
?>
