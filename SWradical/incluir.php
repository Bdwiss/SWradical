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
			<?php
				try {
					include("conexao.php");
					// recuperando 
					$cpf = $_POST["cpf"];
					$funcionario = $_POST['funcionario'];	
					$descricao = $_POST['descricao'];	
					$admicao = $_POST['admicao'];	
					$salario = $_POST['salario'];
					$foto ="";
					
					//Upload da foto do produto
					$target_dir = "imagens/";
					$arquivo = basename($_FILES["foto"]["name"]);
					$target_file = $target_dir . $arquivo;
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["foto"]["tmp_name"]);
						if($check !== false) {
							echo "<h4>O arquivo é uma imagem - " . $check["mime"] . ".</h4>\n";
							$uploadOk = 1;
						} else {
							echo "<h4>Erro: O arquivo não é uma imagem!</h4>\n";
							$uploadOk = 0;
						}
					}

					// Check if file already exists
					if (file_exists($target_file)) {
						echo "<h4>Erro: O arquivo já existe no repositório!</h4>\n";
						$uploadOk = 0;
					}

					// Check file size
					if ($_FILES["foto"]["size"] > 500000) {
						echo "<h4>Erro: O arquivo é muito grande!</h4>\n";
						$uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" 
						&& $imageFileType != "jpeg"	&& $imageFileType != "gif" ) {
						echo "<h4>Erro: Os únicos tipos imagens permidos são: 
						JPG, JPEG, PNG e GIF!</h4>\n";
						$uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "<h4>Erro: A imagem não foi gravada!</h4>\n";
						// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
							echo "<h4>A imagem ".
							htmlspecialchars($arquivo) . 
							" foi gravada!</h4>\n";
						} else {
							echo "<h4>Erro: A imagem não foi gravada!</h4>\n";
						}
					}
					
					// criando a linha de INSERT
					$sqlinsert =  "insert into tabelaimg (cpf, funcionario, descricao, admicao, salario)
					values ($cpf,'$funcionario', '$descricao', '$admicao', $salario)";
					if ($uploadOk == 1) {
						$sqlinsert =  "insert into tabelaimg (cpf, funcionario, descricao, admicao, salario, imagem)
						values ($cpf,'$funcionario', '$descricao', '$admicao', $salario, '$arquivo')";
					}
					// executando instrução SQL
					$resultado = mysqli_query($conexao, $sqlinsert);
					echo "<h3>Registro Cadastrado com sucesso!</h3>\n";
					
					/*
					if (!$resultado) {
						die('Query Inválida: ' . @mysqli_error($conexao));  
					} else {
						echo "Registro Cadastrado com Sucesso";
					}
					*/
					mysqli_close($conexao);
				} catch (Exception $e){
					echo "<h4>Ocorreu um erro: <br>" . $e->GetMessage() . "</h4>\n";
				}
				
			?>
			<br><br>
			<input type='button' onclick="window.location='index.php';" value="Voltar">
			</div>
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>