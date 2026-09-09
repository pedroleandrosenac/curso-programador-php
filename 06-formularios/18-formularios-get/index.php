<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Formulários — Método GET");
?>

<?php senacClassSession("O que é GET e para que serve", __LINE__); ?>

<?php senacTag("\$_GET", null, "https://www.php.net/manual/pt_BR/reserved.variables.get.php"); ?>

    <p>
        Quando um formulário usa <strong>method="GET"</strong>, os dados
        digitados são enviados <strong>direto na URL</strong>, depois de uma
        interrogação, no formato <code>chave=valor</code>.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<!-- Se o campo se chama "busca" e o usuário digitar "Dom Casmurro" -->

http://localhost/biblioteca/index.php?busca=Dom+Casmurro'
        );
        ?>
    </div>

    <p>
        No PHP, esse valor fica disponível na variável superglobal
        <strong>$_GET</strong>, acessando pela mesma chave usada no HTML:
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

echo $_GET["busca"]; // Dom Casmurro

?>'
        );
        ?>
    </div>

<?php senacClassSession("Quando usar GET", __LINE__, "orange"); ?>

    <p>Use GET quando:</p>

    <ul>
        <li>O dado não é sensível (nunca uma senha, nunca um dado sigiloso)</li>
        <li>Faz sentido a URL poder ser <strong>compartilhada ou salva</strong> — por exemplo, o link de uma busca ou de um filtro</li>
        <li>O formulário é de <strong>busca, filtro ou paginação</strong> — não de cadastro ou envio de dados grandes</li>
    </ul>

    <div class="code">
        <?php
        echo htmlspecialchars(
            ' <form action="" method="GET">
            <input type="text" name="busca" placeholder="Buscar livro...">
            <button type="submit">Buscar</button>
        </form>'
        );
        ?>
    </div>

<?php
senacAlert("GET fica visível na URL, no histórico do navegador e em logs do servidor. Nunca use GET para senha, dados de cartão, ou qualquer informação sigilosa — isso é assunto do POST, que veremos na próxima aula.", "info");
?>

<?php senacClassSession("Exemplo teórico — busca de livro na biblioteca", __LINE__); ?>

    <p>
        A ideia: um array simula os livros já cadastrados. O termo digitado
        pelo usuário (vindo do $_GET) é comparado com cada título, usando
        <strong>stripos()</strong> — que verifica se um texto contém outro,
        sem diferenciar maiúsculo de minúsculo.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$livros = ["Dom Casmurro", "O Cortiço", "Memórias Póstumas", "Iracema"];

$termoBuscado = $_GET["busca"];

foreach ($livros as $livro) {
    if (stripos($livro, $termoBuscado) !== false) {
        echo $livro;
    }
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("stripos() retorna a posição onde o texto foi encontrado, ou false se não encontrou. Por isso comparamos com !== false, e não só com um if simples — porque a posição 0 (encontrado logo no início) também seria considerada 'falsa' num if comum.", "info");
?>

<?php senacClassSession("Exemplo teórico — filtro de produto por categoria", __LINE__, "orange"); ?>

    <p>
        Ideia parecida, mas comparando a categoria exata em vez de buscar um
        texto parcial — aqui o valor do $_GET precisa <strong>bater
            exatamente</strong> com a categoria de cada produto.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$produtos = [
    ["nome" => "Ração", "categoria" => "Alimentação"],
    ["nome" => "Shampoo", "categoria" => "Higiene"],
    ["nome" => "Coleira", "categoria" => "Acessórios"],
];

$categoriaEscolhida = $_GET["categoria"];

foreach ($produtos as $produto) {
    if ($produto["categoria"] === $categoriaEscolhida) {
        echo $produto["nome"];
    }
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("Exercício prático: vamos implementar juntos a busca de livros, na pasta 18-formulario-get-pratica.", "accept");
senacFooter("Pedro Leandro");
?>