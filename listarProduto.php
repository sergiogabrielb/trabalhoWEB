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
		<img class="img3" src="./images/background.jpg" />

		<div class="conteudo3">
			<form class="post" method="POST">
				<input class="pesquisar" type="text" name="pesquisar">
				<input class="editDelete2" type="submit" value="Pesquisar"></input>
			</form>
			<div class="conteudoTabela">
				<table class="tabela">
					<tr bgcolor='#CCCCCC'>
						<div>
							<?php
							//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
							foreach ($resultado as $res) {
								$strm = $pdo->prepare("SELECT * FROM arquivos WHERE id = ?");
								$strm->execute([$res['arquivoId']]);
								$fotos = $strm->fetch(PDO::FETCH_ASSOC);

								echo "<tr>";
								echo "<td>";
								echo "<ul>";
								echo "<div class=Total>";
								echo "<div class=listImg>" . "<img class=imglist src=\"./upload/$fotos[arquivo]\" alt=foto style=\"width:50px; height:auto\">" . "</div>";
								echo "<div class=listTitulo>" . $res['titulo'] . "</div>";
								echo "<div class=listdescricao>" . $res['descricao'] . "</div>";
								echo "<div class=listpreco>" . $res['preco'] . "</div>";
								echo "<div class=listdesconto>" . $res['porc_desconto'] . "%</div>";
								echo "<div class=listestoque>" . $res['estoque'] . "</div>";
								echo "<div class=listsituacao>" . $res['situacao'] . "</div>";
								echo " <a class=noDecoration href=\"edit.php?id=$res[id]\"><button class=editDelete> Editar </button> </a><a class=noDecoration href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Você tem certeza que deseja excluir esse produto?')\"><button class=editDelete>Excluir</button> </a></ul></div><td>";
							}
							?>
						</div>
					</tr>
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