<?php
require __DIR__ . "/../senac/senac.php";
senacClassName("Estrutura match");
?>

<?php senacClassSession("match() — a versão moderna do switch", __LINE__); ?>

<?php senacTag("match()", null, "https://www.php.net/manual/pt_BR/control-structures.match.php"); ?>

<p>
    O <strong>match</strong> chegou no PHP 8 e resolve o mesmo problema do
    <strong>switch</strong> — comparar uma variável com vários valores — mas
    de forma mais curta e mais segura.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$diaDaSemana = "terça";

$mensagem = match ($diaDaSemana) {
    "segunda" => "Início da semana!",
    "terça" => "Aula de PHP hoje!",
    "sábado", "domingo" => "Fim de semana!",
    default => "Dia comum.",
};

echo $mensagem;

?>'
    );
    ?>
</div>

<?php senacClassSession("As 3 diferenças em relação ao switch", __LINE__, "orange"); ?>

<ul>
    <li><strong>Sem break</strong> — o match nunca "cai" para o próximo caso por engano</li>
    <li><strong>Retorna um valor</strong> — dá para guardar o resultado direto numa variável, como no exemplo acima</li>
    <li><strong>Comparação estrita (===)</strong> — o match compara tipo e valor, diferente do switch, que compara só o valor</li>
</ul>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$codigo = "1";

// switch usa == por baixo dos panos — compara só o valor
switch ($codigo) {
    case 1:
        echo "Bate! (switch compara só valor, ignora tipo)";
        break;
}

// match usa === — não bate, porque "1" (string) é diferente de 1 (int)
$resultado = match ($codigo) {
    1 => "Não vai cair aqui",
    default => "Caiu no default, porque match é estrito",
};

echo $resultado;

?>'
    );
    ?>
</div>

<?php
senacAlert("Regra prática: em código novo, prefira match ao switch sempre que possível. É mais moderno, mais seguro (compara tipo) e mais enxuto.", "accept");
senacAlert("Exercício: abra o index.php da pasta 08-match-pratica e pratique o match.", "accept");
senacFooter("Pedro Leandro");
?>
