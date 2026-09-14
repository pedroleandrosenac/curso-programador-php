<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Cadastro de Conta");
?>

<?php senacClassSession("Formulário de cadastro", __LINE__); ?>

<form action="index_processar.php" method="POST">
    <input type="text" name="nome" placeholder="Nome completo"><br>
    <input type="email" name="email" placeholder="E-mail"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <input type="password" name="confirmarSenha" placeholder="Confirmar senha"><br>
    <button type="submit">Criar conta</button>
</form>

<?php
senacFooter("Pedro Leandro");
?>
