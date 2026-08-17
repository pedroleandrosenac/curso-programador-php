<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Operadores Lógicos");
?>

<?php senacClassSession("Operadores lógicos", __LINE__); ?>

<?php
senacTag("&&", null, "https://www.php.net/manual/pt_BR/language.operators.logical.php");
senacTag("||");
senacTag("!");
?>

    <p>
        Operadores lógicos combinam <strong>duas ou mais condições</strong> em
        uma única resposta — sempre <strong>true</strong> ou <strong>false</strong>,
        assim como os operadores relacionais que já vimos.
    </p>

    <ul>
        <li><strong>&amp;&amp;</strong> (E) — true somente se TODAS as condições forem verdadeiras</li>
        <li><strong>||</strong> (OU) — true se PELO MENOS UMA condição for verdadeira</li>
        <li><strong>!</strong> (NÃO) — inverte o resultado: true vira false, e false vira true</li>
    </ul>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$idade = 20;
$temCarteira = true;

var_dump($idade >= 18 && $temCarteira);   // true  — as DUAS condições são verdadeiras
var_dump($idade >= 18 && false);          // false — uma das condições é falsa

var_dump($idade < 18 || $temCarteira);    // true  — pelo menos UMA é verdadeira
var_dump($idade < 18 || false);           // false — nenhuma das duas é verdadeira

var_dump(!$temCarteira);                  // false — inverte true para false

?>'
        );
        ?>
    </div>

<?php
senacAlert("&& só falha se alguma condição for falsa. || só falha se TODAS forem falsas. É mais fácil lembrar pensando no dia a dia: 'preciso ser maior de idade E ter carteira' (as duas) vs. 'aceito dinheiro OU cartão' (qualquer um dos dois).", "info");
?>

<?php senacClassSession("Combinando condições com operadores lógicos", __LINE__, "orange"); ?>

    <p>
        O poder real desses operadores aparece quando juntamos vários
        operadores relacionais em uma verificação só — muito comum em
        situações do dia a dia.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$idade = 22;
$possuiCNH = true;
$possuiVeiculo = false;

// pode alugar um carro? precisa ter 21+ anos E carteira de habilitação
$podeAlugarCarro = $idade >= 21 && $possuiCNH;
var_dump($podeAlugarCarro);   // true

// pode dirigir hoje? precisa ter CNH E (veículo próprio OU carro alugado)
$podeDirigirHoje = $possuiCNH && ($possuiVeiculo || $podeAlugarCarro);
var_dump($podeDirigirHoje);   // true

?>'
        );
        ?>
    </div>

<?php
senacAlert("Parênteses ajudam a deixar claro qual condição é calculada primeiro — igual na matemática. Sem eles, o PHP segue uma ordem própria que nem sempre é óbvia de cabeça.", "info");
senacAlert("Exercício: abra o index.php da pasta 05-operadores-logicos-pratica e monte suas próprias verificações combinando condições.", "accept");
senacFooter("Pedro Leandro");
?>