<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Sanitização e Validação de Dados");
?>

<?php senacClassSession("Por que sanitizar", __LINE__); ?>

    <p>
        Todo dado que vem de um formulário deveria ser tratado como
        <strong>não confiável</strong> — o usuário pode digitar qualquer
        coisa, inclusive código malicioso. Sanitizar é "limpar" esse dado
        antes de usar ou exibir de volta na tela.
    </p>

<?php senacClassSession("htmlspecialchars() vs strip_tags()", __LINE__, "orange"); ?>

<?php
senacTag("htmlspecialchars()", null, "https://www.php.net/manual/pt_BR/function.htmlspecialchars.php");
senacTag("strip_tags()", null, "https://www.php.net/manual/pt_BR/function.strip-tags.php");
?>

    <p>
        As duas lidam com tags HTML dentro de um texto, mas de jeitos
        diferentes:
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$comentario = "<b>Muito bom!</b>";

echo htmlspecialchars($comentario); // <b>Muito bom!</b>  (mostra o texto, com os sinais visíveis)
echo strip_tags($comentario);       // Muito bom!          (remove a tag, mantém só o texto de dentro)

?>'
        );
        ?>
    </div>

<?php
senacAlert("htmlspecialchars() NEUTRALIZA — o navegador mostra o código como texto, sem executar. strip_tags() REMOVE a tag inteira. Use htmlspecialchars() como padrão para exibir dado do usuário; use strip_tags() quando não quiser tag nenhuma, nem visível.", "info");
?>

<?php senacClassSession("O ataque XSS na prática", __LINE__); ?>

    <p>
        <strong>XSS (Cross-Site Scripting)</strong> é quando um código
        malicioso, digitado por alguém num formulário, é executado pelo
        navegador de outra pessoa que visualiza esse dado depois.
    </p>

    <p><strong>Versão vulnerável — NUNCA fazer isso:</strong></p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$comentario = $_POST["comentario"];

echo "Comentário recebido: " . $comentario;

// Se alguém digitar:
// <script>alert("Isso executou!")</script>
// o navegador EXECUTA o script, em vez de só mostrar o texto.

?>'
        );
        ?>
    </div>

    <p><strong>Versão corrigida:</strong></p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$comentario = $_POST["comentario"];

echo "Comentário recebido: " . htmlspecialchars($comentario);

// Agora o navegador mostra o texto do script na tela,
// sem executar nada.

?>'
        );
        ?>
    </div>

<?php
senacAlert("Regra de ouro: todo dado do usuário que volta pra tela precisa passar por htmlspecialchars() antes do echo. Sem exceção.", "accept");
?>

<?php senacClassSession("intval() e floatval() — visão rápida", __LINE__, "orange"); ?>

<?php
senacTag("intval()", null, "https://www.php.net/manual/pt_BR/function.intval.php");
senacTag("floatval()", null, "https://www.php.net/manual/pt_BR/function.floatval.php");
?>

    <p>Convertem qualquer valor para número — mas nunca "falham": se não acham um número, devolvem 0, sem avisar que algo deu errado.</p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

intval("8abc");    // 8 — pega só a parte numérica do início
intval("abc");     // 0 — não achou número, vira 0
floatval("19.90"); // 19.9 — atenção: ponto, não vírgula

?>'
        );
        ?>
    </div>

<?php
senacAlert("Como não dá pra distinguir '0 digitado de propósito' de 'entrada inválida', vamos preferir os filtros de validação do filter_input() para isso — a seguir.", "info");
?>

<?php senacClassSession("filter_input() — os principais filtros", __LINE__); ?>

<?php senacTag("filter_input()", null, "https://www.php.net/manual/pt_BR/function.filter-input.php"); ?>

    <p>
        <strong>filter_input()</strong> captura um dado do $_POST ou $_GET
        já validando (ou sanitizando) ele, num passo só. Existem dois grupos
        de filtro: os que <strong>validam</strong> (rejeitam se o formato
        estiver errado) e os que <strong>sanitizam</strong> (limpam o dado,
        sem rejeitar nada).
    </p>

    <table style="width:100%; border-collapse: collapse; margin: 16px 0;">
        <tr>
            <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Filtro</th>
            <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Tipo</th>
            <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Para que serve</th>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>FILTER_VALIDATE_EMAIL</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Valida</td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Confere se o formato é de um e-mail válido</td>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>FILTER_VALIDATE_INT</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Valida</td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Confere se é um número inteiro válido</td>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>FILTER_VALIDATE_FLOAT</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Valida</td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Confere se é um número decimal válido</td>
        </tr>
        <tr>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>FILTER_VALIDATE_URL</code></td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Valida</td>
            <td style="padding: 6px; border-bottom: 1px solid #ddd;">Confere se o formato é de uma URL válida</td>
        </tr>
        <tr>
            <td style="padding: 6px;"><code>FILTER_SANITIZE_FULL_SPECIAL_CHARS</code></td>
            <td style="padding: 6px;">Sanitiza</td>
            <td style="padding: 6px;">Converte caracteres especiais em HTML seguro — o substituto atual do htmlspecialchars(), usado direto dentro do filter_input()</td>
        </tr>
    </table>

    <p><strong>Exemplo — validando e-mail:</strong></p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if ($email === false) {
    echo "E-mail inválido.";
} else {
    echo "E-mail válido: $email";
}

?>'
        );
        ?>
    </div>

    <p><strong>Exemplo — sanitizando com FILTER_SANITIZE_FULL_SPECIAL_CHARS:</strong></p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$comentario = filter_input(INPUT_POST, "comentario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

echo $comentario; // já vem seguro para exibir, sem precisar chamar htmlspecialchars() depois

?>'
        );
        ?>
    </div>

<?php
senacAlert("Quando usar cada um: use os filtros VALIDATE quando o dado pode ser rejeitado (e-mail, número, URL). Use FILTER_SANITIZE_FULL_SPECIAL_CHARS quando só quer limpar o texto para exibir, sem rejeitar nada — é uma alternativa ao htmlspecialchars(), só que já dentro do filter_input().", "accept");
senacAlert("filter_input() retorna false se o dado não passar na validação, ou null se o campo nem foi enviado — sempre bom checar os dois casos.", "info");
senacAlert("Não usamos FILTER_SANITIZE_STRING aqui de propósito — essa constante está depreciada desde o PHP 8.1. FILTER_SANITIZE_FULL_SPECIAL_CHARS é o substituto recomendado pela própria documentação do PHP.", "info");
?>

<?php
senacAlert("Exercício prático: abra o index.php da pasta 20-sanitizacao-pratica e pratique.", "accept");
senacFooter("Pedro Leandro");
?>