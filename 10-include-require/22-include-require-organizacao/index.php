<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("include, require e Organização de Código");
?>

<?php senacClassSession("Por que não repetir código", __LINE__); ?>

    <p>
        Cabeçalho, rodapé, menu — pedaços de HTML que aparecem repetidos em
        várias páginas. Se precisar mudar algo, é fácil esquecer de
        atualizar em algum lugar. A solução: escrever uma vez, reaproveitar
        em todo lugar.
    </p>

<?php senacClassSession("include vs require", __LINE__, "orange"); ?>

<?php
senacTag("include", null, "https://www.php.net/manual/pt_BR/function.include.php");
senacTag("require", null, "https://www.php.net/manual/pt_BR/function.require.php");
?>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

include "includes/header.php";  // se faltar: warning, script CONTINUA
require "includes/header.php";  // se faltar: erro fatal, script PARA

?>'
        );
        ?>
    </div>

<?php
senacAlert("Regra prática: require para tudo ESSENCIAL (conexão com banco, autenticação). include para o que é decorativo (algo que, se sumir, a página ainda funciona).", "accept");
?>

<?php senacClassSession("include_once e require_once", __LINE__); ?>

    <p>Evitam incluir o <strong>mesmo arquivo duas vezes</strong> sem querer — comum causar "Cannot redeclare function" quando isso acontece.</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

require_once "core/conexao.php"; // mesmo se outro arquivo já incluiu, não duplica

?>'
        );
        ?>
    </div>

<?php senacClassSession("__DIR__ e outras constantes mágicas", __LINE__, "orange"); ?>

<?php senacTag("Constantes mágicas", null, "https://www.php.net/manual/pt_BR/language.constants.magic.php"); ?>

    <p>
        São constantes que o PHP preenche <strong>sozinho</strong>, com
        informação sobre o próprio código — mudam de valor dependendo de
        onde são usadas.
    </p>

    <table style="width:100%; border-collapse: collapse; margin: 16px 0;">
        <tr>
            <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Constante</th>
            <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Retorna</th>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>__DIR__</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Pasta onde o arquivo atual está (caminho absoluto)</td>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>__FILE__</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Caminho completo do arquivo atual (pasta + nome do arquivo)</td>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>__LINE__</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Número da linha atual do código</td>
        </tr>
        <tr>
            <td style="padding: 6px;"><code>__FUNCTION__</code></td>
            <td style="padding: 6px;">Nome da função onde está sendo usada</td>
        </tr>
    </table>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

require_once __DIR__ . "/../config/config.php"; // sempre a partir da pasta do arquivo atual

?>'
        );
        ?>
    </div>

<?php
senacAlert("__DIR__ resolve o problema clássico de caminho relativo 'torto', que quebra dependendo de qual página chamou o arquivo — o mesmo bug que já corrigimos no projeto de vocês.", "info");
?>

<?php senacClassSession("Como variáveis atravessam entre arquivos", __LINE__); ?>

    <p>
        <strong>include/require não são como chamar uma função</strong> —
        eles colam o código do arquivo no mesmo escopo de quem chamou.
        Variáveis são compartilhadas nos dois sentidos.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php
// index.php
$nomeDoUsuario = "Ana";
include "includes/header.php"; // header.php ENXERGA $nomeDoUsuario

// includes/header.php
echo "Olá, $nomeDoUsuario"; // funciona — mesmo escopo

?>'
        );
        ?>
    </div>

<?php
senacAlert("A ordem importa: se a variável fosse definida DEPOIS do include, o arquivo incluído não a veria ainda.", "info");
senacAlert("Dentro de uma função, o include só enxerga o escopo daquela função, não as variáveis globais — mesma regra de escopo da aula de funções.", "info");
?>

<?php senacClassSession("Organização de pastas sugerida", __LINE__, "orange"); ?>

    <div class="code">
        <?php
        echo htmlspecialchars(
            'projeto/
├── core/          (conexão, autenticação, funções auxiliares)
├── controllers/   (processamento)
├── views/         (telas)
├── includes/      (header, footer, navbar — reaproveitados)
└── assets/        (CSS, JS, imagens)'
        );
        ?>
    </div>

<?php
senacAlert("Já bate com a estrutura que vocês já usam no Janus/Cerberus — só falta a pasta includes/ para os pedaços repetidos de HTML.", "accept");
senacFooter("Pedro Leandro");
?>