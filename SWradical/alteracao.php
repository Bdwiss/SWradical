<!DOCTYPE html>
<html>
    <head>
        <title>AyLu.corp</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Luis e Aydan">
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <link rel="stylesheet" href="css\estilo.css">
        <link rel="stylesheet" href="css/font/bootstrap-icons.min.css">
		<link rel="icon" href="imagens/icon.png">
    </head>
    <body>
        <nav class="navbar bg-dark navbar-dark navbar-expand-sm py-3 sticky-top">
			<div class="container">
				<a href="index.php" class="navbar-brand d-flex align-itens-center">
				<i class="bi bi-bag-fill"></i>
				AyLu.corp
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="menuNavbar"> 
					<div class="navbar-nav">
						<a href="inclusao.php" class="nav-link">Cadastrar</a>
						<a href="#" class="nav-link">Atualizar</a> 
					</div>
				</div>
				<span class="navbar-text">Alterar Registro</span>
			</div>
		</nav>
        <div class="v1 text-center">
            <div class="v2">
                <br>
                <h3>Alterar Cadastro</h3>
                <?php
                try {
                    include("conexao.php");
                    $id = base64_decode($_GET["id"]);
                    $sqlconsulta = "SELECT * FROM tabelaimg WHERE id = $id";
                    $resultado = @mysqli_query($conexao, $sqlconsulta);
                    $dados = mysqli_fetch_assoc($resultado);
                    mysqli_close($conexao);
                } catch (Exception $e) {
                    echo "<h2>Erro: " . $e->getMessage() . "</h2>";
                    exit;
                }
                ?>

                <form action="alterar.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    
                    <b>CPF:</b> <input type="number" name="cpf" value="<?php echo $dados["cpf"]; ?>"><br><br>
                    <b>Funcionario:</b> <input type="text" name="funcionario" maxlength="80" value="<?php echo $dados["funcionario"]; ?>"><br><br>
                    <b>Descrição:</b><br> 
                    <textarea name="descricao" rows="3" cols="100"><?php echo $dados['descricao']; ?></textarea><br><br>
                    <b>Admição:</b> <input type="date" name="admicao" value="<?php echo date_format(date_create($dados["admicao"]), "Y-m-d"); ?>"><br><br>
                    <b>salário:</b> <input type="number" step="0.01" name="salario" value="<?php echo $dados["salario"]; ?>"><br><br>

                    <!-- Exibir imagem atual -->
                    <b>Imagem Atual:</b><br>
                    <?php if (!empty($dados['imagem']) && $dados['imagem'] !== "semimagem.jpg"): ?>
                        <img id="imagem_atual" src="imagens/<?php echo $dados['imagem']; ?>" alt="Imagem do funcionario" width="200"><br>
                        <button type="button" onclick="removerImagem('<?php echo $dados['id']; ?>')">Remover Imagem</button><br><br>
                    <?php else: ?>
                        <img src="imagens/semimagem.jpg" alt="Imagem padrão" width="200"><br><br>
                    <?php endif; ?>

                    <b>Nova Imagem:</b> <input type="file" name="nova_imagem" id="nova_imagem" onchange="previewImagem(event)"><br><br>

                    <!-- Exibir prévia da nova imagem abaixo -->
                     <center>
                         <img id="preview" src="" alt="Prévia da nova imagem" width="200" style="display: none;"><br>
                    </center>

                    <input type="submit" value="Ok">
                    <input type="reset" value="Limpar">
                    <input type="button" onclick="window.location='index.php';" value="Voltar">
                </form>

                <script>
                function previewImagem(event) {
                    const preview = document.getElementById("preview");
                    const arquivo = event.target.files[0];

                    if (arquivo) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = "block"; // Exibir a nova imagem abaixo
                        };
                        reader.readAsDataURL(arquivo);
                    }
                }

                function removerImagem(id) {
                    if (confirm("Tem certeza que deseja remover esta imagem?")) {
                        fetch("alterar.php", {
                            method: "POST",
                            body: JSON.stringify({ remover_imagem: true, id: id }),
                            headers: { "Content-Type": "application/json" }
                        })
                        .then(response => response.text())
                        .then(data => {
                        // alert(data);
                            document.getElementById("imagem_atual").src = "imagens/semimagem.jpg"; // Substitui pela imagem padrão
                        })
                        .catch(error => console.error("Erro ao remover imagem:", error));
                    }
                }
                </script>
                <br>
            </div>
        </div>
    </body>
</html>
 