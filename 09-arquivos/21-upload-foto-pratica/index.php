<?php
$extensoesPossiveis = ["jpg", "jpeg", "png"];
$fotoPerfil = null;

foreach ($extensoesPossiveis as $ext) {
    if (file_exists(__DIR__ . "/uploads/perfil.$ext")) {
        $fotoPerfil = "perfil.$ext";
        break;
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foto de Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <?php if ($fotoPerfil): ?>
                <img src="uploads/<?= htmlspecialchars($fotoPerfil) ?>?v=<?= time() ?>"
                     alt="Foto de perfil" class="rounded-circle"
                     style="width: 150px; height: 150px; object-fit: cover;">
            <?php else: ?>
                <p class="text-muted">Você ainda não tem foto de perfil.</p>
            <?php endif; ?>
        </div>

        <form action="" method="" enctype="multipart/form-data"
              class="p-4 border rounded shadow-sm">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto de perfil (JPG, JPEG ou PNG, máx. 2MB)</label>
                <input type="file" id="foto" name="foto" class="form-control"
                       accept=".jpg,.jpeg,.png" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Atualizar foto</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>