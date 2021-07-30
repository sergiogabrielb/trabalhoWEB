<?php
// including the database connection file
include_once("config.php");
$pdo = pdo_connect_mysql();
if (isset($_POST['update'])) {

	// checking empty fields
	if (empty($_POST['titulo']) || empty($_POST['descricao']) || empty($_POST['preco']) || empty($_POST['porc_desconto']) || empty($_POST['estoque'])) {

		if (empty($_POST['titulo'])) {
			echo "<font color='red'>O nome do produto está vazio</font><br/>";
		}

		if (empty($_POST['descricao'])) {
			echo "<font color='red'>A descricao está vazia.</font><br/>";
		}

		if (empty($_POST['preco'])) {
			echo "<font color='red'>O preço está vazio.</font><br/>";
		}

		if (empty($_POST['porc_desconto'])) {
			echo "<font color='red'>A porcentagem de desconto está vazia.</font><br/>";
		}

		if (empty($_POST['estoque'])) {
			echo "<font color='red'>O estoque do produto está vazio.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>clique aqui para voltar</a>";
	} else {
		//updating the table
		$resultado = $pdo->prepare("UPDATE produtos SET titulo = ?, descricao = ?, preco = ?, porc_desconto = ?, estoque = ? WHERE id = ?");
		$resultado->execute([$_POST['titulo'], $_POST['descricao'], $_POST['preco'], $_POST['porc_desconto'], $_POST['estoque'], $_POST['id']]);

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
</head>

<body>
	<a href="manipularProduto.php">Voltar para edição de produtos</a>
	<br /><br />

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Nome do produto</td>
				<td><input type="text" name="titulo" value="<?php echo $res['titulo']; ?>"></td>
			</tr>
			<tr>
				<td>Descricao</td>
				<td><input type="text" name="descricao" value="<?php echo $res['descricao']; ?>"></td>
			</tr>
			<tr>
				<td>Preço</td>
				<td><input type="text" name="preco" value="<?php echo  $res['preco']; ?>"></td>
			</tr>
			<tr>
				<td>Porcentagem de desconto</td>
				<td><input type="text" name="porc_desconto" value="<?php echo  $res['porc_desconto']; ?>"></td>
			</tr>
			<tr>
				<td>Estoque</td>
				<td><input type="text" name="estoque" value="<?php echo  $res['estoque']; ?>"></td>
			</tr>
			<tr>
				<td>Situacao</td>
				<td>
					<select name="situacao" id="">
						<option value="disponivel" name="disponivel">disponivel</option>
						<option value="indisponivel" name="indisponivel">
							indisponivel
						</option>
						<option value="oferta" name="oferta">oferta</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>