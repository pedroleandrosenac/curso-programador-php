<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Funções Nativas do PHP");
?>

<?php senacClassSession("Funções de data — date(), strtotime()", __LINE__); ?>

<?php
senacTag("date()", null, "https://www.php.net/manual/pt_BR/function.date.php");
senacTag("strtotime()", null, "https://www.php.net/manual/pt_BR/function.strtotime.php");
?>

    <p>
        <strong>date()</strong> formata a data/hora atual do jeito que você
        quiser. <strong>strtotime()</strong> converte um texto de data em algo
        que o PHP consegue comparar — as duas são das funções mais usadas em
        qualquer sistema real, sempre que existe "data de cadastro", "data de
        vencimento" ou "última atualização".
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

function registrarMatricula($nomeAluno) {
    $dataDeHoje = date("d/m/Y");
    echo "$nomeAluno matriculado em $dataDeHoje.";
}

registrarMatricula("Carlos");

?>'
        );
        ?>
    </div>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$dataVencimento = strtotime("2026-09-10");
$hoje = strtotime(date("Y-m-d"));

if ($dataVencimento < $hoje) {
    echo "Mensalidade vencida!";
} else {
    echo "Mensalidade em dia.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("strtotime() sempre converte para segundos — por isso dá pra comparar duas datas direto com < ou >, como em qualquer outro número.", "info");
?>

<?php senacClassSession("Arrays — count() e in_array()", __LINE__, "orange"); ?>

<?php
senacTag("count()", null, "https://www.php.net/manual/pt_BR/function.count.php");
senacTag("in_array()", null, "https://www.php.net/manual/pt_BR/function.in-array.php");
?>

    <p>
        <strong>count()</strong> conta quantos itens existem num array.
        <strong>in_array()</strong> verifica se um valor específico está
        presente na lista, devolvendo true ou false.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$produtosEmEstoque = ["Ração", "Coleira", "Shampoo", "Brinquedo"];

echo "Total de produtos cadastrados: " . count($produtosEmEstoque);

if (in_array("Coleira", $produtosEmEstoque)) {
    echo "Coleira está disponível no estoque.";
} else {
    echo "Coleira não encontrada no estoque.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("in_array() é muito usado para validar se um valor digitado pelo usuário é uma opção válida — por exemplo, conferir se a categoria escolhida realmente existe na lista de categorias do sistema.", "info");
?>

<?php senacClassSession("Validação — isset() e empty()", __LINE__); ?>

<?php
senacTag("isset()", null, "https://www.php.net/manual/pt_BR/function.isset.php");
senacTag("empty()", null, "https://www.php.net/manual/pt_BR/function.empty.php");
?>

    <p>
        <strong>isset()</strong> verifica se uma variável existe e não é nula.
        <strong>empty()</strong> verifica se uma variável está vazia (string
        vazia, zero, ou não definida). Praticamente toda função que recebe
        dado de um formulário usa uma dessas duas, para não deixar passar
        campo em branco.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

function verificarCadastroCompleto($nome, $email) {
    if (empty($nome) || empty($email)) {
        return "Preencha todos os campos obrigatórios.";
    }
    return "Cadastro completo!";
}

echo verificarCadastroCompleto("Maria", "maria@email.com");
echo verificarCadastroCompleto("", "joao@email.com");

?>'
        );
        ?>
    </div>

<?php
senacAlert("empty(\"0\") e empty(0) retornam true — cuidado ao validar campos que podem legitimamente valer zero (como quantidade em estoque). Nesses casos, isset() costuma ser mais seguro.", "info");
?>

<?php senacClassSession("Formatação — number_format()", __LINE__, "orange"); ?>

<?php senacTag("number_format()", null, "https://www.php.net/manual/pt_BR/function.number-format.php"); ?>

    <p>
        <strong>number_format()</strong> formata um número no padrão de
        exibição desejado — essencial para mostrar valores em dinheiro do
        jeito que as pessoas estão acostumadas a ler.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$precoDoProduto = 1234.5;

echo number_format($precoDoProduto, 2, ",", "."); // 1.234,50

?>'
        );
        ?>
    </div>

<?php
senacAlert("Os parâmetros são: quantidade de casas decimais, símbolo decimal e separador de milhar — number_format(valor, 2, \",\", \".\") é o padrão brasileiro de dinheiro.", "info");
?>

<?php senacClassSession("Segurança — htmlspecialchars()", __LINE__); ?>

<?php senacTag("htmlspecialchars()", null, "https://www.php.net/manual/pt_BR/function.htmlspecialchars.php"); ?>

    <p>
        <strong>htmlspecialchars()</strong> converte caracteres especiais de
        HTML em texto seguro para exibir na tela — evita que alguém digite
        código malicioso num formulário e ele "execute" quando reaparecer na
        página. É a mesma função que já protege os blocos de código que vocês
        veem nas telas de aula.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
                '<?php

$comentarioDoUsuario = "<script>alert(\"hack\")</script>";

echo htmlspecialchars($comentarioDoUsuario);
// exibe o texto literal na tela, em vez de executar o script

?>'
        );
        ?>
    </div>

<?php
senacAlert("Regra prática: todo dado que veio do usuário e vai ser exibido de volta na tela deve passar por htmlspecialchars() antes do echo.", "accept");
?>

<?php senacClassSession("Exercício prático — usando funções nativas", __LINE__); ?>

    <ul>
        <li><strong>verificarCadastroCompleto($nome, $email)</strong> — usando empty()</li>
        <li><strong>contarProdutosDisponiveis($produtos)</strong> — usando count()</li>
        <li><strong>formatarPrecoParaExibicao($valor)</strong> — usando number_format()</li>
    </ul>

<?php
senacFooter("Pedro Leandro");
?>