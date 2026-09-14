<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Login");
?>

<?php senacClassSession("Formulário de login", __LINE__); ?>

<form action="index_processar.php" method="POST">
    <input type="email" name="email" placeholder="E-mail"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <button type="submit">Entrar</button>
</form>

<?php
senacFooter("Pedro Leandro");
?>
