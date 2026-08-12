<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Introdução ao PHP");
?>

<?php senacClassSession("O que é PHP e onde é usado", __LINE__); ?>

<?php
senacTag("PHP", null, "https://www.php.net/manual/pt_BR/");
senacTag("back-end");
senacTag("open-source", "green");
?>

<p>
    PHP é uma linguagem de programação usada para criar a parte de <strong>back-end</strong>
    de um site ou sistema — o que acontece "por trás das telas", no servidor, antes da
    página chegar até o navegador do usuário.
</p>

<p>É o PHP que costuma cuidar de:</p>
<ul>
    <li>Processar o que o usuário digita em um formulário</li>
    <li>Buscar e salvar informações em um banco de dados</li>
    <li>Decidir o que mostrar na tela dependendo da situação</li>
</ul>

<p>Sites grandes que usam PHP: Facebook (nasceu em PHP), Wikipedia, WordPress.</p>

<?php senacClassSession("XAMPP — pasta htdocs", __LINE__, "orange"); ?>

<p>
    O XAMPP instala, de uma vez, tudo que precisamos para rodar PHP no nosso
    computador: o servidor (Apache), o PHP e o banco de dados (MySQL).
</p>

<p>
    A pasta <strong>htdocs</strong> é onde colocamos os projetos — só o que
    está dentro dela é executado pelo servidor.
</p>

<div class="code">
<?php
echo htmlspecialchars(
'C:\xampp\htdocs\
└── aulas-programador-php\
    └── index.php

→ acessado em: http://localhost/aulas-programador-php/'
);
?>
</div>

<?php senacClassSession("Primeiro arquivo PHP", __LINE__); ?>

<p>Todo código PHP fica entre uma tag de abertura e uma de fechamento:</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

// seu código PHP fica aqui

?>'
);
?>
</div>

<?php senacClassSession("echo, comentários de linha e de bloco", __LINE__, "orange"); ?>

<p><strong>echo</strong> exibe algo na tela. Comentários não aparecem para quem visita o site — servem só para quem lê o código.</p>

<div class="code">
<?php
echo htmlspecialchars(
'<?php

// comentário de linha — só essa linha é ignorada

/*
comentário de bloco —
pode ocupar várias linhas
*/

echo "Olá, mundo!";
echo "Minha primeira aula de PHP.";

?>'
);
?>
</div>

<?php
senacAlert("Inspecione o código-fonte da página no navegador (Ctrl+U). Você só vai ver HTML — o PHP já foi processado.", "info");
senacAlert("Exercício: abra o practice.php desta aula e crie seu primeiro echo.", "accept");
senacFooter("Pedro Leandro");
?>
