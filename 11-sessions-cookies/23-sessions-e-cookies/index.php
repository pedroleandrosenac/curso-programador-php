<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Sessions e Cookies");
?>

<?php senacClassSession("\$_SESSION — o que é e por que existe", __LINE__); ?>

<?php senacTag("\$_SESSION", null, "https://www.php.net/manual/pt_BR/reserved.variables.session.php"); ?>

<p>
    HTTP é um protocolo <strong>sem memória</strong> — cada requisição é
    isolada, o servidor não sabe se é a mesma pessoa que acessou a
    página anterior. Session é como o servidor "lembra" quem é o
    usuário, entre uma página e outra, guardando o dado no próprio
    servidor.
</p>

<table style="width:100%; border-collapse: collapse; margin: 16px 0;">
    <tr>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Função</th>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Para que serve</th>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>session_start()</code></td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Inicia (ou retoma) a sessão. Sempre antes de qualquer saída HTML</td>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>$_SESSION["chave"] = valor</code></td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Guarda um dado na sessão</td>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>isset($_SESSION["chave"])</code></td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Verifica se um dado existe (ex: "está logado?")</td>
    </tr>
    <tr>
        <td style="padding: 6px;"><code>session_destroy()</code></td>
        <td style="padding: 6px;">Apaga a sessão inteira — usado no logout</td>
    </tr>
</table>

<?php senacClassSession("Login com controle de sessão", __LINE__, "orange"); ?>

<p>Exemplo consolidado — guardando a sessão ao logar, e checando em outra página:</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php
// login_processar.php

session_start();

$_SESSION["usuario_id"] = 5;
$_SESSION["usuario_nome"] = "Ana";

header("Location: area-restrita.php");
exit;

?>'
    );
    ?>
</div>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php
// area-restrita.php

session_start();

if (!isset($_SESSION["usuario_nome"])) {
    header("Location: index.php");
    exit;
}

echo "Bem-vindo, " . htmlspecialchars($_SESSION["usuario_nome"]);

?>'
    );
    ?>
</div>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php
// logout.php

session_start();
session_destroy();

header("Location: index.php");
exit;

?>'
    );
    ?>
</div>

<?php
senacAlert("session_start() precisa vir antes de qualquer HTML/echo — colocar depois de algum espaço em branco ou texto já impresso gera o erro 'headers already sent'.", "info");
?>

<?php senacClassSession("\$_COOKIE — o que é e por que existe", __LINE__); ?>

<?php senacTag("\$_COOKIE", null, "https://www.php.net/manual/pt_BR/reserved.variables.cookies.php"); ?>

<p>
    Diferente da sessão, o cookie fica guardado <strong>no navegador do
        usuário</strong>, e pode durar dias, semanas ou meses — mesmo depois
    de fechar o navegador. O servidor não guarda nada; é o navegador
    que devolve o cookie a cada nova requisição.
</p>

<table style="width:100%; border-collapse: collapse; margin: 16px 0;">
    <tr>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Função</th>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Para que serve</th>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>setcookie("chave", "valor", tempo)</code></td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Cria um cookie, com data de expiração</td>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;"><code>$_COOKIE["chave"]</code></td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Lê um cookie já existente</td>
    </tr>
    <tr>
        <td style="padding: 6px;"><code>setcookie("chave", "", time() - 3600)</code></td>
        <td style="padding: 6px;">Deleta um cookie (expiração no passado)</td>
    </tr>
</table>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

// cria um cookie que dura 7 dias
setcookie("nome_usuario", "Ana", time() + (7 * 24 * 60 * 60));

// numa próxima visita, ler:
if (isset($_COOKIE["nome_usuario"])) {
    echo "Bem-vindo de volta, " . htmlspecialchars($_COOKIE["nome_usuario"]);
}

?>'
    );
    ?>
</div>

<?php
senacAlert("setcookie() segue a mesma regra do session_start() — precisa vir antes de qualquer saída HTML.", "info");
senacAlert("Nunca guarde senha ou dado sigiloso em cookie — ele fica salvo no computador do usuário, visível e editável.", "accept");
?>

<?php senacClassSession("Session vs. Cookie — quando usar cada um", __LINE__); ?>

<table style="width:100%; border-collapse: collapse; margin: 16px 0;">
    <tr>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;"></th>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Session</th>
        <th style="text-align:left; padding: 6px; border-bottom: 2px solid #ccc;">Cookie</th>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Onde fica guardado</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">No servidor</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">No navegador do usuário</td>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Duração</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Some ao fechar navegador/logout</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Pode durar dias, semanas, meses</td>
    </tr>
    <tr>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Segurança</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Mais seguro</td>
        <td style="padding: 6px; border-bottom: 1px solid #ddd;">Menos seguro</td>
    </tr>
    <tr>
        <td style="padding: 6px;">Uso típico</td>
        <td style="padding: 6px;">Login, dado sensível</td>
        <td style="padding: 6px;">Preferências, "lembrar-me"</td>
    </tr>
</table>

<?php
senacAlert("Curiosidade: é por causa de cookies (principalmente os de rastreamento/marketing) que a maioria dos sites pede permissão de cookies ao entrar — exigência da LGPD no Brasil e da GDPR na Europa.", "info");
senacAlert("Exercício prático: Prática 1 (login/logout com session) e Prática 2 (lembrar e-mail com cookie), nas pastas 21-sessions-cookies-pratica1 e -pratica2.", "accept");
senacFooter("Pedro Leandro");
?>
