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
		<div class="v1">
			<div class="v2">
				<h3 class="text-center">Cadastrar um novo funcionário</h3>
				<form action="incluir.php" method="post" enctype="multipart/form-data" class="text-center">
					<b>CPF:</b> <input type="number" name="cpf" required><br><br>  
					<b>Funcionário:</b> <input type="text" name="funcionario" maxlength="80" style="width:550px"><br><br>
					<b>Descrição: </b><br><textarea name="descricao" rows="5" cols="100" style="resize: none;"></textarea><br><br>
					<b>Admição: </b> <input type="date" name="admicao"><br><br>
					<b>Salário: R$ </b><input type="number" step="0.01" name="salario"><br><br>
					<b>Foto: </b><input type="file" name="foto" id="fileToUpload"><br><br>
					<input type="submit" value="Ok">&nbsp;&nbsp;
					<input type="reset" value="Limpar">
					<input type='button' onclick="window.location='index.php';" value="Voltar">
				</form>	
				<br>
			</div>
		</div>
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>