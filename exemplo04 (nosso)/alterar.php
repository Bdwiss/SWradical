<!DOCTYPE html>
<html>
	<head>
		<title>Exemplo 04</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML, CSS, JavaScript">
		<meta name="author" content="Luis e Aydan">
		<link rel="stylesheet" href="mystyle.css">
	</head>
	<body>
	<h3>Semana 01 - Exemplo 19 - Alterar</h3>
	<?php
		try{
			include("conexao.php");
			// recuperando 
			$id = mysqli_real_escape_string($conexao, $_POST['id']);
$codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);
$produto = mysqli_real_escape_string($conexao, $_POST['produto']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
$data = mysqli_real_escape_string($conexao, $_POST['data']);
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);


			$id = isset($_POST['id']) ? $_POST['id'] : null;

			// criando a linha do  UPDATE
			$sqlupdate = "UPDATE tabelaimg SET codigo='$codigo', produto='$produto', 
descricao='$descricao', data='$data', valor=$valor WHERE id=$id";




			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlupdate);

				echo "<h4>Registro Alterado com Sucesso!</h4>\n";

			mysqli_close($conexao);
		} catch (Exception $e) {
			echo "<h2>Aconteceu um erro:<br>" . $e->GetMessage() ."</h2>\n";
		}
	?>
	<br><br>
	<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
