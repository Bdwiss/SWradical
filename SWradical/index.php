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
		<h3>Registro de funcionários da AyLu.corp</h3>
		<?php
			try {
				include("conexao.php");
			
				// ajustando a instrução select para ordenar por produto
				$sql = "select * from tabelaimg order by id";
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$funcionario = $_POST["funcionario"];
					$sql = "select * from tabelaimg where 
					funcionario like '%$funcionario%' order by funcionario";
				}
				$query = mysqli_query($conexao, $sql);
				echo "<header>
					<p>Clique <a href=\"inclusao.php\" class=\"a1\">aqui</a>&nbsp;&nbsp; para cadastrar</p>\n
					<p>Clique <a href=\"index.php\" class=\"a1\">aqui</a> para atualizar</p>\n
					<form action=\"#\" method=\"post\">
						<input type=\"text\" name=\"funcionario\" maxlength=\"80\">
						<button type=\"submit\">Pesquisar</button>

					</form>
				</header>\n";
				echo "<table>\n";// note que abri echo com aspas para executar                                             
				//comando html e os atributos das tags com apostrofe(elu é neutre)
				echo "<tr class=\"text-center\">\n
						<th width=\"30px\" align=\"center\">Id</th>\n
						<th width=\"100px\">CPF</th>\n
						<th width=\"250px\">Funcionário</th>\n
						<th width=\"100px\">Salário</th>\n
						<th width=\"100px\">Foto</th>\n
						<th width=\"100px\">Opções</th>\n
					</tr>\n";

				while($dados = mysqli_fetch_assoc($query)){
					echo "<tr class=\"text-center\">\n";
					echo "<td align='center'>". $dados["id"]."</td>\n";
					echo "<td>{$dados["cpf"]}</td>\n";
					echo "<td>". $dados['funcionario']."</td>\n";
					echo "<td align='right'> R$ ". 
						number_format($dados['salario'],2,",",".")."</td>\n";		
					// buscando na pasta imagem
					if (empty($dados["imagem"])){
						$imagem = "semimagem.jpg";
					}else{
						$imagem = $dados["imagem"];
					}
					$id = base64_encode($dados["id"]);
					echo "<td class=\"text-center\">
							<a href=\"verfuncionario
							.php?id=$id\">
								<img class=\"imagem\" src=\"imagens/$imagem\">
							</a>
						</td>\n";
						echo "<td class=\"\">	
							<a href=\"verfuncionario.php?id=$id\">
								Visualizar
							</a>&nbsp;&nbsp;
							<a href=\"alteracao.php?id=$id\">
								Alterar
							</a>&nbsp;&nbsp;
							
							<a href=\"#\" onclick=\"abrirModal('{$dados['id']}')\">Apagar</a>
						</td>\n
						
	

						";
						echo "</tr>\n";
					}
					
					echo "</table>";
					
				mysqli_close($conexao);
			} catch (Exception $e) {
				echo "<h2>Aconteceu um erro:<br>" . $e->GetMessage() ."</h2>\n";
			}
			/* CRUD
		       ||||> DELETE > confirmação > unlink(php)
			   |||> UPDATE > upload >
			   ||> R=SELECT "não sei pq" 
			   |> CREATE > insert > upload (tem no w3 caso queira procurar)
			*/
			
		?>	
			<div id="modalExcluir" class="modal" style="display: none">
			<div class="modal-content">
				<span class="close" onclick="fecharModal()"></span>
				<h4>Tem certeza que deseja excluir este registro?</h4><br>
				<p>Ao excluir este elemento você não poderá mais restaurá-lo!</p>
				<form method="POST" action="excluir.php">
					<input type="hidden" name="id" id="idExcluir">
					<button type="submit" class="btn btn-danger">Sim</button>
					<button type="button" class="btn btn-secondary" onclick="fecharModal()">Cancelar</button>
				</form>
			</div>
		</div>
		</div>
	</body>
</html>
<script src="js\bootstrap.bundle.min.js"></script>
<script src="js\js.js"></script>