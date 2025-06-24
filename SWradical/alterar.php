<!DOCTYPE html>
<html>
<head>
    <title>Exemplo 04</title>
    <meta charset="UTF-8">
</head>
<body>
<h3>Alterando Cadastro</h3>

<?php
try {
    include("conexao.php");

    // Processar a remoção da imagem via AJAX
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (isset($data['remover_imagem']) && isset($data['id'])) {
            $id = mysqli_real_escape_string($conexao, $data['id']);

            // Buscar imagem antiga
            $sqlconsulta = "SELECT imagem FROM tabelaimg WHERE id = $id";
            $resultado = @mysqli_query($conexao, $sqlconsulta);
            $dados = mysqli_fetch_assoc($resultado);

            $target_dir = "imagens/";
            $imagem_antiga = $dados['imagem'];
            $imagem_antigaTarget = $target_dir.$dados["imagem"];

            // Apagar a imagem se não for "semimagem.jpg"
            if (!empty($imagem_antiga) && file_exists("imagens/" . $imagem_antiga) && $imagem_antiga !== "semimagem.jpg") {
                unlink("imagens/" . $imagem_antiga);
            }

            // Atualizar banco para remover a imagem
            $sqlupdate = "UPDATE tabelaimg SET imagem='semimagem.jpg' WHERE id=$id";
            @mysqli_query($conexao, $sqlupdate);

            echo "Imagem removida com sucesso!";
            exit;
        }
    }

    // Processar o envio do formulário
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $funcionario = mysqli_real_escape_string($conexao, $_POST['funcionario']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $admicao = mysqli_real_escape_string($conexao, $_POST['admicao']);
    $salario = mysqli_real_escape_string($conexao, $_POST['salario']);

    // Atualizar imagem se uma nova for enviada
    if (!empty($_FILES['nova_imagem']['name'])) {
        $nova_imagem = basename($_FILES["nova_imagem"]["name"]);
        move_uploaded_file($_FILES["nova_imagem"]["tmp_name"], "imagens/" . $nova_imagem);
        $sqlupdate = "UPDATE tabelaimg SET imagem='$nova_imagem', cpf='$cpf', funcionario='$funcionario', descricao='$descricao', admicao='$admicao', salario=$salario WHERE id=$id";
    } else {
        $sqlupdate = "UPDATE tabelaimg SET cpf='$cpf', funcionario='$funcionario', descricao='$descricao', admicao='$admicao', salario=$salario WHERE id=$id";
    }

    @mysqli_query($conexao, $sqlupdate);

    echo "<h4>Registro Alterado com Sucesso!</h4>";

    mysqli_close($conexao);
} catch (Exception $e) {
    echo "<h2>Erro: " . $e->getMessage() . "</h2>";
}
?>

<br><br>
<input type="button" onclick="window.location='index.php';" value="Voltar">
</body>
</html>
