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
	</head>
	<body>
		<h3>Semana 01 - Exemplo 14 - Exclusão</h3>
		<?php
			include("conexao.php");

			if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])){
				$id = intval($_POST["id"]);

				$sql = "select * from tabelaimg where id = $id";
				$query = mysqli_query($conexao, $sql);
				$dados = mysqli_fetch_assoc($query);

				$target_dir = "imagens/";
				$imagem_antiga = $dados["imagem"];
				$imagem_antigaTarget = $target_dir.$dados["imagem"];


				if(file_exists($imagem_antigaTarget)){
					unlink($imagem_antigaTarget);
				}

				$sql = "delete from tabelaimg WHERE id = $id";
				if (mysqli_query($conexao, $sql)) {
					echo "<script>alert('Registro excluído com sucesso!'); window.location='index.php';</script>";
				} else {
					echo "<script>alert('Erro ao excluir: " . mysqli_error($conexao) . "'); window.location='index.php';</script>";
				}

				mysqli_close($conexao);
			} else {
				echo "<script>alert('Requisição inválida.'); window.location='index.php';</script>";
			}
		?>
		<br><br>
		<input type='button' onclick="window.location='index.php';" value="Voltar">
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>