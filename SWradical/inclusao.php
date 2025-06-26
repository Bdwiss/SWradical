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
						<a href="inclusao.php" class="nav-link">Atualizar</a> 
					</div>
				</div>
				<span class="navbar-text">Registrar Funcionário</span>
			</div>
		</nav>



		<div class="v1">
			<div class="v2">
				<h3 class="text-center">Cadastrar um novo funcionário</h3>
				<form action="incluir.php" method="post" enctype="multipart/form-data" class="text-center">
					<b>CPF:</b> <input type="number" name="cpf" class="pesq" required><br><br>  
					<b>Funcionário:</b> <input type="text" name="funcionario" class="pesq" maxlength="80" style="width:550px"><br><br>
					<b>Descrição: </b><br><textarea name="descricao" rows="5" cols="100" class="pesq" style="resize: none;"></textarea><br><br>
					<b>Admição: </b> <input type="date" name="admicao" class="pesq"><br><br>
					<b>Salário: R$ </b><input type="number" step="0.01" class="pesq" name="salario"><br><br>
					<b>Foto: </b><input type="file" name="foto" id="fileToUpload" ><br><br>
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