<?php
// including the database connection file
include_once("config.php");
$pdo = pdo_connect_mysql();
if (isset($_POST['update'])) {

	// checking empty fields
	if (empty($_POST['titulo']) || empty($_POST['descricao']) || empty($_POST['preco']) || empty($_POST['estoque']) || empty($_POST['situacao'])) {

		if (empty($_POST['titulo'])) {
			echo "<font color='red'>O nome do produto está vazio</font><br/>";
		}

		if (empty($_POST['descricao'])) {
			echo "<font color='red'>A descricao está vazia.</font><br/>";
		}

		if (empty($_POST['preco'])) {
			echo "<font color='red'>O preço está vazio.</font><br/>";
		}

		if (empty($_POST['estoque'])) {
			echo "<font color='red'>O estoque do produto está vazio.</font><br/>";
		}

		if (empty($_POST['situacao'])) {
			echo "<font color='red'>Você não selecionou uma situação.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>clique aqui para voltar</a>";
	} else {
		//updating the table
		$resultado = $pdo->prepare("UPDATE produtos SET titulo = ?, descricao = ?, preco = ?, porc_desconto = ?, estoque = ? WHERE id = ?");
		$resultado->execute([$_POST['titulo'], $_POST['descricao'], $_POST['preco'], $_POST['porc_desconto'], $_POST['estoque'], $_POST['situacao'], $_POST['id']]);

		//redirectig to the display page. In our case, it is index.php
		header("Location: manipularProduto.php");
	}
}
?>
<?php
//getting id from url
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

if (!isset($id)) {
	return;
}
$resultados = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$resultados->execute([$id]);
$res = $resultados->fetch(PDO::FETCH_ASSOC);
?>
<html>

<head>
	<title>Editar produto</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet" />
	<link href="./styles/styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
</head>

<body>
	<div class="menu">
		<h3><i class="fa fa-mobile" aria-hidden="true"></i>EletronicBuy</h3>
		<a class="home" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Pagina Inicial</a>
	</div>
	<div class="content">
		<img class="imgfundo" src="./images/background.jpg" />
		<div class="conteudo2">
			<div class="conteudoCadastro2">
				<div class="titulos">
					<h1 class="tituloCadastro">Edição de produtos</h1>
					<a class="icon" href="manipularProduto.php"><i class="fas fa-long-arrow-alt-left"></i>

						Voltar para edição de produtos</a>
				</div>


				<form class="formCadastro" name="form1" method="post" action="edit.php">
					<div class="inputsCadastro">
						<div class="imagem">
							<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
							<lottie-player src="https://assets2.lottiefiles.com/packages/lf20_xjhwr9wv.json" background="transparent" speed="1" style="width: 600px; height: 600px" loop autoplay></lottie-player>
						</div>
						<div class="inputs">
							<div class="info">Insira as informações do produto</div>
							<div class="nomeProduto">
								<p class="nameProduto">Nome do produto:</p>
								<input type="text" name="titulo" />
							</div>
							<div class="nomeProduto">
								<p class="descProduto">Descrição:</p>
								<input type="text" name="descricao" />
							</div>
							<div class="nomeProduto">
								<p class="selectProduto">Porcentagem Desconto:</p>
								<input type="text" name="descricao" />
							</div>
							<div class="nomeProduto">
								<p>Preço:</p>
								<input type="text" name="preco" />
							</div>
							<div class="nomeProduto">
								<p class="estoProduto">Estoque:</p>
								<input type="text" name="estoque" />
							</div>
							<div class="nomeProduto">
								<p class="descProduto">Situação:</p>
								<select class="selectCadastro" name="situacao" id="">
									<option value="disponivel" name="disponivel">
										Disponível
									</option>
									<option value="indisponivel" name="indisponivel">
										Indisponivel
									</option>
									<option value="oferta" name="oferta">Oferta</option>
								</select>
							</div>
							<div class="nomeProduto">
								<p class="selectProduto">Selecione a foto do produto:</p>
								<input class="file" type="file" />
							</div>
							<div class="botaoCadastrar">
								<input class="buttonCadastro" type="update" name="Submit" value="Atualizar" />
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	</form>
</body>

</html>