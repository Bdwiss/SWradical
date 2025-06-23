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
		<h3>Semana 01 - Exemplo 07 - Detalhes do Produto</h3>
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
		<a href="index.php" class="a1">Voltar</a>
		</div>
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>