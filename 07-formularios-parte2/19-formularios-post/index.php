<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Formulários — Método POST");
?>

<?php senacClassSession("O que é POST e para que serve", __LINE__); ?>

<?php senacTag("\$_POST", null, "https://www.php.net/manual/pt_BR/reserved.variables.post.php"); ?>

<p>
    Quando um formulário usa <strong>method="POST"</strong>, os dados
    digitados são enviados <strong>dentro do corpo da requisição</strong>,
    não na URL. Diferente do GET, nada aparece depois de uma
    interrogação no endereço.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<form action="index_processar.php" method="POST">
    <input type="text" name="nome">
    <input type="email" name="email">
    <button type="submit">Enviar</button>
</form>'
    );
    ?>
</div>

<p>No PHP, os valores ficam disponíveis na variável superglobal <strong>$_POST</strong>:</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$nome = $_POST["nome"];
$email = $_POST["email"];

?>'
    );
    ?>
</div>

<?php senacClassSession("Quando usar POST", __LINE__, "orange"); ?>

<p>Use POST quando:</p>

<ul>
    <li>O dado é <strong>sensível</strong> — senha, dado pessoal, qualquer coisa que não deveria ficar visível na URL</li>
    <li>O formulário tem <strong>muitos campos</strong> — cadastro, formulário de contato, etc.</li>
    <li>O envio <strong>cria ou altera algo</strong> — diferente do GET, que só busca/filtra sem mudar nada no sistema</li>
</ul>

<?php
senacAlert("Regra prática: se o formulário tem campo de senha, ou se ele vai CRIAR algo (uma conta, um cadastro, um chamado), é POST. Se é só busca ou filtro, é GET — como vimos na aula passada.", "info");
?>

<?php senacClassSession("Exemplo teórico — Cadastro de conta", __LINE__); ?>

<p>
    O fluxo: o formulário envia os campos por POST, a página de
    processamento pega cada valor de <strong>$_POST</strong> e guarda em
    variáveis, valida, e adiciona a nova conta no array — do mesmo jeito
    que já usaram <strong>array_push()</strong> antes.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$contas = [
    ["nome" => "Ana Souza", "email" => "ana@email.com", "senha" => "123456"],
];

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmarSenha = $_POST["confirmarSenha"];

if (empty($nome) || empty($email) || empty($senha)) {
    echo "Preencha todos os campos.";
} elseif ($senha !== $confirmarSenha) {
    echo "As senhas não conferem.";
} else {
    $contas[] = ["nome" => $nome, "email" => $email, "senha" => $senha];
    echo "Conta criada com sucesso!";
}

?>'
    );
    ?>
</div>

<?php senacClassSession("Exemplo teórico — Login", __LINE__, "orange"); ?>

<p>
    O fluxo: percorrer o array de contas com <strong>foreach</strong>,
    comparando e-mail <strong>e</strong> senha digitados com cada conta
    cadastrada, usando <strong>&&</strong>.
</p>

<div class="code">
    <?php
    echo htmlspecialchars(
        '<?php

$emailDigitado = $_POST["email"];
$senhaDigitada = $_POST["senha"];

$loginValido = false;

foreach ($contas as $conta) {
    if ($conta["email"] === $emailDigitado && $conta["senha"] === $senhaDigitada) {
        $loginValido = true;
    }
}

if ($loginValido) {
    echo "Login bem-sucedido!";
} else {
    echo "E-mail ou senha incorretos.";
}

?>'
    );
    ?>
</div>

<?php
senacAlert("Esse exemplo só verifica se e-mail e senha conferem — não estamos 'mantendo' o usuário logado ao trocar de página. Isso depende de Sessions, assunto de uma próxima aula.", "info");
senacAlert("Em sistemas reais, senha nunca é guardada assim, em texto puro. Usa-se password_hash() para criptografar ao cadastrar, e password_verify() para comparar no login — vocês vão ver isso mais pra frente.", "info");
senacFooter("Pedro Leandro");
?>
