<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Algoritmo e Pensamento Computacional");
?>

<?php senacClassSession("O que é um algoritmo", __LINE__); ?>

<p>
    Um algoritmo é uma sequência de passos para resolver um problema.
    Antes de aprender qualquer linguagem, precisamos aprender a pensar assim.
</p>

<h3>Exemplo do dia a dia — fazer um sanduíche</h3>
<ul>
    <li>Pegue duas fatias de pão</li>
    <li>Passe manteiga em uma delas</li>
    <li>Coloque o recheio</li>
    <li>Junte as duas fatias</li>
</ul>

<p>
    Programar é basicamente isso — escrever passos, em ordem, para o computador
    seguir. A diferença é que o computador precisa que esses passos estejam
    numa linguagem que ele entenda.
</p>

<?php senacClassSession("Pensamento computacional", __LINE__, "orange"); ?>

<p>
    É o nome que damos para esse jeito de pensar: pegar um problema grande
    e quebrar em passos pequenos e simples, até que cada passo seja óbvio
    de resolver.
</p>

<?php
senacAlert("Todo problema de programação começa assim: primeiro no papel, depois no código.", "info");
senacAlert("Exercício: abra o practice.php desta aula e escreva seu próprio algoritmo.", "accept");
senacFooter("Pedro Leandro");
?>