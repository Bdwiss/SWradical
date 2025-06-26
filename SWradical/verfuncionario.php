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
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse; 
				width: 90%;
				/* border-spacing: 0px;*/
			}

			table, td, th {
				border: 1px solid #000;
			}
			.imagem {
				width: 120px;
			}
		</style>
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
				<span class="navbar-text">Registro de Funcionário</span>
			</div>
		</nav>
		<div class="v1">
			<h3>Detalhes do Funcionário</h3>
			<?php
				date_default_timezone_set("America/Sao_Paulo");
				function formataData($admicao, $fomato){ // 2005-04-15 00:00:00
					$datanova = date_create($admicao);
					return date_format($datanova, $fomato);
				}
				
				function formataData2($admicao){ // 2005-04-15 00:00:00
					return substr($admicao, 8, 2). "/" .substr($admicao, 5, 2).
					"/" . substr($admicao, 0, 4);
				}
				
				function convertedata($admicao){
					$data_vetor = explode("-", substr($admicao, 0, 10));
					$novadata = implode("/", array_reverse ($data_vetor));
					return $novadata;
				}
			
				try {
					include("conexao.php");
					// recuperando a informação da URL
					// verifica se parâmetro está correto e dento da normalidade 
					if(isset($_GET["id"]) && is_numeric(base64_decode($_GET["id"]))){
						$id = base64_decode($_GET["id"]);
					} else {
						header("Location: index.php");
					}
					//$id = base64_decode($_GET['id']);
					
					// realizando a pesquisa com o id recebido
					$sql = "select * from tabelaimg where id = $id";
					$query = mysqli_query($conexao, $sql);
					/*
					if (!$query) {
						die('Query Inválida: ' . @mysqli_error($conexao));  
					}
					*/
					$dados = mysqli_fetch_assoc($query);
					
					echo "<div class=\"d1\"><table>
						<tr>
							<td>";
					if (empty($dados["imagem"])){
						$imagem = "semimagem.jpg";
					}else{
						$imagem = $dados["imagem"];
					}
					echo "<img src=\"imagens/$imagem\" class=\"i1\">";
					echo "</td> <td>";
					echo "<b>Id: </b>".$dados['id']."<br>";
					echo "<b>CPF: </b>".$dados['cpf']."<br>";
					echo "<b>Funcionario: </b>".$dados['funcionario']."<br>";	
					echo "<b>Descrição: </b>{$dados["descricao"]}<br>";
					echo "<b>Admição: </b>" . formataData($dados["admicao"],"d/m/Y") . "<br>";				
					echo "<b>Salário: </b> R$ ". number_format($dados["salario"], 2, ",", ".")."<br>";
					echo "</td>
					</tr>
					</table>";
					
					mysqli_close($conexao);
				} catch (Exception $e){
					echo "<h4>Ocorreu um erro: <br>" . $e->GetMessage() . "</h4>\n";
				}		
			?>
			<br>
			<button type="button" class="btn btn-secondary" ><a href="index.php" class="a1">Voltar</a></button>
			
		</div>		
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>