<?php
require __DIR__ . "/../../senac/senac.php";
senacClassName("Upload de Arquivos em PHP");
?>

<?php senacClassSession("Por que o formulário precisa de enctype", __LINE__); ?>

    <p>
        Um formulário HTML comum envia só texto. Para enviar
        <strong>arquivos</strong> (imagem, PDF, etc.), o navegador precisa
        empacotar os dados de um jeito diferente — e quem avisa isso pro
        navegador é o atributo <code>enctype="multipart/form-data"</code>
        na tag <code>&lt;form&gt;</code>.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="foto">Selecione uma imagem:</label>
    <input type="file" name="foto" id="foto">
    <button type="submit">Enviar</button>
</form>'
        );
        ?>
    </div>

<?php
senacAlert("Sem enctype=\"multipart/form-data\", o arquivo simplesmente não chega no PHP — o \$_FILES fica vazio, mesmo que o usuário tenha selecionado um arquivo.", "info");
?>

<?php senacClassSession("\$_FILES — a estrutura do arquivo recebido", __LINE__, "orange"); ?>

<?php senacTag("\$_FILES", null, "https://www.php.net/manual/pt_BR/reserved.variables.files.php"); ?>

    <p>
        Quando um arquivo é enviado, o PHP guarda as informações dele no
        superglobal <strong>$_FILES</strong>, usando o <code>name</code> do
        input como chave. Para o input <code>name="foto"</code> do exemplo
        acima, a estrutura fica assim:
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '$_FILES["foto"] = [
    "name"     => "gato.jpg",              // nome original do arquivo, no computador do usuário
    "type"     => "image/jpeg",            // tipo MIME informado pelo navegador (não confiável!)
    "tmp_name" => "/tmp/phpA1B2C3",        // onde o PHP guardou o arquivo temporariamente
    "error"    => 0,                       // código de erro (0 = sem erro)
    "size"     => 204800                   // tamanho em bytes
];'
        );
        ?>
    </div>

<?php
senacAlert("O campo 'type' vem do navegador — o usuário pode renomear um .exe para foto.jpg e mandar o navegador dizer que é image/jpeg. Nunca confie nele sozinho para decidir se o arquivo é seguro.", "info");
?>

<?php senacClassSession("Passo 1 — verificar erro e tamanho", __LINE__); ?>

<?php senacTag("UPLOAD_ERR_OK", null, "https://www.php.net/manual/pt_BR/features.file-upload.errors.php"); ?>

    <p>
        Antes de qualquer outra checagem, sempre confira o
        <code>error</code>. Se não for <code>UPLOAD_ERR_OK</code> (0), algo
        deu errado no envio e nem vale a pena seguir.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$arquivo = $_FILES["foto"];

if ($arquivo["error"] !== UPLOAD_ERR_OK) {
    echo "Erro no envio do arquivo.";
    exit;
}

$tamanhoMaximo = 2 * 1024 * 1024; // 2 MB

if ($arquivo["size"] > $tamanhoMaximo) {
    echo "Arquivo muito grande. Máximo permitido: 2MB.";
    exit;
}

?>'
        );
        ?>
    </div>

<?php senacClassSession("Passo 2 — verificar extensão", __LINE__); ?>

<?php senacTag("pathinfo()", null, "https://www.php.net/manual/pt_BR/function.pathinfo.php"); ?>

    <p>
        A extensão do arquivo (a parte depois do ponto no nome) dá uma
        primeira pista do tipo de arquivo, mas sozinha ela também pode ser
        forjada — é só uma primeira barreira, não a única.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$extensoesPermitidas = ["jpg", "jpeg", "png", "gif"];

$extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));

if (!in_array($extensao, $extensoesPermitidas)) {
    echo "Extensão não permitida. Envie um arquivo: " . implode(", ", $extensoesPermitidas);
    exit;
}

?>'
        );
        ?>
    </div>

<?php senacClassSession("Passo 3 — verificar o tipo MIME de verdade", __LINE__, "orange"); ?>

<?php senacTag("finfo_file()", null, "https://www.php.net/manual/pt_BR/function.finfo-file.php"); ?>

    <p>
        Para saber o tipo real do arquivo, o PHP consegue olhar o
        <strong>conteúdo</strong> dele (não o nome, não a extensão) usando a
        extensão <code>fileinfo</code>. É essa checagem que realmente
        protege contra alguém renomear um arquivo malicioso.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$mimesPermitidos = ["image/jpeg", "image/png", "image/gif"];

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeReal = finfo_file($finfo, $arquivo["tmp_name"]);
finfo_close($finfo);

if (!in_array($mimeReal, $mimesPermitidos)) {
    echo "Tipo de arquivo não permitido (detectado: $mimeReal).";
    exit;
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("Extensão + tamanho barram os casos óbvios. O tipo MIME real (via finfo_file) é quem confirma que o conteúdo do arquivo bate com o que ele diz ser. Use os três juntos.", "accept");
?>

<?php senacClassSession("Passo 4 — mover o arquivo para o destino final", __LINE__); ?>

<?php
senacTag("move_uploaded_file()", null, "https://www.php.net/manual/pt_BR/function.move-uploaded-file.php");
senacTag("is_uploaded_file()", null, "https://www.php.net/manual/pt_BR/function.is-uploaded-file.php");
?>

    <p>
        Depois de validado, o arquivo ainda está numa pasta temporária. Use
        <code>move_uploaded_file()</code> para movê-lo ao destino definitivo
        — essa função também confirma, por segurança, que o arquivo veio
        mesmo de um upload HTTP.
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$novoNome = uniqid() . "." . $extensao;
$destino  = __DIR__ . "/uploads/" . $novoNome;

if (move_uploaded_file($arquivo["tmp_name"], $destino)) {
    echo "Upload feito com sucesso: $novoNome";
} else {
    echo "Não foi possível salvar o arquivo.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("Nunca use o \"name\" original do arquivo para salvar no servidor. Gere um nome novo (uniqid(), por exemplo) — evita que dois usuários sobrescrevam o arquivo um do outro e evita nomes com código malicioso (ex: '.php.jpg').", "info");
?>

<?php senacClassSession("Exemplo completo — imagem e documento juntos", __LINE__); ?>

    <p>
        Juntando os 4 passos, um upload.php completo, aceitando imagens
        (jpg, png) ou documentos (pdf), fica assim:
    </p>

    <div class="code">
        <?php
        echo htmlspecialchars(
            '<?php

$arquivo = $_FILES["arquivo"] ?? null;

if (!$arquivo || $arquivo["error"] !== UPLOAD_ERR_OK) {
    echo "Nenhum arquivo válido enviado.";
    exit;
}

// Passo 1 — tamanho
if ($arquivo["size"] > 5 * 1024 * 1024) {
    echo "Arquivo maior que 5MB.";
    exit;
}

// Passo 2 — extensão
$extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));
$extensoesPermitidas = ["jpg", "jpeg", "png", "pdf"];

if (!in_array($extensao, $extensoesPermitidas)) {
    echo "Extensão não permitida.";
    exit;
}

// Passo 3 — MIME real
$mimesPermitidos = [
    "image/jpeg"      => true,
    "image/png"       => true,
    "application/pdf" => true,
];

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeReal = finfo_file($finfo, $arquivo["tmp_name"]);
finfo_close($finfo);

if (!isset($mimesPermitidos[$mimeReal])) {
    echo "Conteúdo do arquivo não corresponde a um tipo permitido.";
    exit;
}

// Passo 4 — mover para o destino
$novoNome = uniqid("upl_") . "." . $extensao;
$destino  = __DIR__ . "/uploads/" . $novoNome;

if (move_uploaded_file($arquivo["tmp_name"], $destino)) {
    echo "Arquivo salvo como: $novoNome";
} else {
    echo "Falha ao salvar o arquivo.";
}

?>'
        );
        ?>
    </div>

<?php
senacAlert("Checklist de segurança em upload: (1) checar error, (2) checar tamanho, (3) checar extensão, (4) checar MIME real com finfo, (5) gerar nome novo, (6) salvar fora da pasta pública sempre que possível, ou bloquear execução de PHP na pasta de uploads.", "accept");
?>

<?php
senacAlert("Exercício prático: crie um formulário com enctype=\"multipart/form-data\" e um upload.php que valide extensão, tamanho e tipo MIME antes de salvar o arquivo numa pasta /uploads.", "accept");
senacFooter("Pedro Leandro");
?><?php
