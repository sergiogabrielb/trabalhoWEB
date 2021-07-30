<?php
//including the database connection file
include_once("config.php");
$pdo = pdo_connect_mysql();

$resultado = $pdo->prepare("SELECT * FROM produtos ORDER BY id DESC");
$resultado->execute();



if (isset($_POST['pesquisar'])) {
	$pesquisar = $_POST['pesquisar'];
	$result_produtos = $pdo->prepare("SELECT * FROM produtos WHERE titulo LIKE '%$pesquisar%' LIMIT 5");
	$result_produtos->execute();
	$resultado = $result_produtos;
}

?>


<html>

<head>
	<meta charset="utf-8">
	<link href="./styles/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<title>EletronicBuy</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
</head>

<body>
	<div class="menu">

		<h3><i class="fa fa-mobile" aria-hidden="true"></i>EletronicBuy</h3>
	</div>
	<div class="content">
		<img src="./images/background.jpg" />

		<div class="conteudo">
			<a href="add.html"><button class="addProduto"><i class="fas fa-plus"></i>

					Cadastrar Produto</button></a>

			<form method="POST">
				<input class="pesquisar" type="text" name="pesquisar">
				<input class="editDelete2" type="submit" value="Pesquisar"></input>
			</form>
			<div class="conteudoTabela">
				<table class="tabela">
					<tr bgcolor='#CCCCCC'>
					</tr>
					<div class="produtoListado">
						<?php
						//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
						foreach ($resultado as $res) {
							echo "<ul>";
							echo "<li>" . $res['titulo'] . "</li>";
							echo "<li>" . $res['descricao'] . "</li>";
							echo "<li>" . $res['preco'] . "</li>";
							echo "<li>" . $res['porc_desconto'] . "%</li>";
							echo "<li>" . $res['estoque'] . "</li>";
							echo "<li>" . $res['situacao'] . "</li>";
							echo "<li> <a class=noDecoration href=\"edit.php?id=$res[id]\"><button class=editDelete> Editar </button> </a><a class=noDecoration href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Você tem certeza que deseja excluir esse produto?')\"><button class=editDelete>Excluir</button> </a></td>";
						}
						?>
					</div>
				</table>
			</div>

		</div>

	</div>
	<footer class="footer"><i class="fab fa-instagram"><a href="instagram.com" class="redesSociais">Instagram</a></i>
		<i class="fab fa-twitter"><a href="instagram.com" class="redesSociais">Instagram</a></i>
		<i class="fab fa-facebook"><a href="instagram.com" class="redesSociais">Instagram</a></i>


	</footer>
</body>

</html>