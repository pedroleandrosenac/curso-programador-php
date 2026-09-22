<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Prática de Cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">
            <h1 class="h4 mb-4 text-center">Entrar</h1>

            <?php if (isset($_COOKIE["email_salvo"])): ?>
                <div class="alert alert-info py-2">
                    Bem-vindo de volta, <?= htmlspecialchars($_COOKIE["email_salvo"]) ?>!
                </div>
            <?php endif; ?>

            <form action="index_processar.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= isset($_COOKIE["email_salvo"]) ? htmlspecialchars($_COOKIE["email_salvo"]) : "" ?>" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar" value="1">
                    <label class="form-check-label" for="lembrar">Lembrar meu e-mail</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <?php if (isset($_COOKIE["email_salvo"])): ?>
                <div class="text-center mt-3">
                    <a href="esquecer.php" class="small text-muted">Esquecer e-mail salvo</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
