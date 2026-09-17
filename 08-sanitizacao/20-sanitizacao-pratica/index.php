<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Prática — Avaliação de Serviço");
?>

<?php senacClassSession("Formulário de avaliação", __LINE__); ?>

    <form action="index_processar.php" method="POST">
        <input type="text" name="nota" placeholder="Nota (0 a 10)"><br>
        <textarea name="comentario" placeholder="Comentário"></textarea><br>
        <input type="text" name="email" placeholder="Seu e-mail"><br>
        <button type="submit">Enviar avaliação</button>
    </form>

<?php
senacFooter("Pedro Leandro");
?>