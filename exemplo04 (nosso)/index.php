<!DOCTYPE html>
<html>
	<head>
		<title>Exemplo 04</title>
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
					$produto = $_POST["produto"];
					$sql = "select * from tabelaimg where 
					produto like '%$produto%' order by produto";
				}
				$query = mysqli_query($conexao, $sql);
				echo "<header>
					<p>Clique <a href=\"inclusao.php\" class=\"a1\">aqui</a>&nbsp;&nbsp; para cadastrar</p>\n
					<p>Clique <a href=\"index.php\" class=\"a1\">aqui</a> para atualizar</p>\n
					<form action=\"#\" method=\"post\">
						<input type=\"text\" name=\"produto\" maxlength=\"80\">
						<button type=\"submit\">Pesquisar</button>

					</form>
				</header>\n";
				echo "<table>\n";// note que abri echo com aspas para executar                                             
				//comando html e os atributos das tags com apostrofe(elu é neutre)
				echo "<tr>\n
						<th width=\"30px\" align=\"center\">Id</th>\n
						<th width=\"100px\">Código</th>\n
						<th width=\"250px\">Funcionário</th>\n
						<th width=\"100px\">Salário</th>\n
						<th width=\"100px\">Foto</th>\n
						<th width=\"100px\">Opções</th>\n
					</tr>\n";

				while($dados = mysqli_fetch_assoc($query)){
					echo "<tr>\n";
					echo "<td align='center'>". $dados["id"]."</td>\n";
					echo "<td>{$dados["codigo"]}</td>\n";
					echo "<td>". $dados['produto']."</td>\n";
					echo "<td align='right'> R$ ". 
						number_format($dados['valor'],2,",",".")."</td>\n";		
					// buscando na pasta imagem
					if (empty($dados["imagem"])){
						$imagem = "semimagem.jpg";
					}else{
						$imagem = $dados["imagem"];
					}
					$id = base64_encode($dados["id"]);
					echo "<td>
							<a href=\"verproduto.php?id=$id\">
								<img class=\"imagem\" src=\"imagens/$imagem\">
							</a>
						</td>\n";
					echo "<td>
							<a href=\"verproduto.php?id=$id\">
								Visualizar
							</a>&nbsp;&nbsp;
							<a href=\"alteracao.php?id=$id\">
								Alterar
							</a>&nbsp;&nbsp;
							
							<a href=\"#\" id=\"myBtn\">
								Apagar
							</a>\n
						</td>\n
						
						 <div id=\"myModal\" class=\"modal\">

						<div class=\"modal-content\">
							<span class=\"close\">&times;</span>
							<p>Ao realizar essa ação não à como restaurar os dados excluidos</p>
							<div class=\"modal-footer\">
							<a href=\"excluir.php?id=$id\"><button type=\"button\" class=\"btn btn-primary\">Excluir</button></a>
						</div>
						</div>

						</div>
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
		<script src="js\bootstrap.bundle.min.js"></script>
		</div>
	</body>
</html>
<script>
    
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>