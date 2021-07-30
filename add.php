<html>

<head>
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");
	$pdo = pdo_connect_mysql();

	if (isset($_POST['Submit'])) {

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

			if (empty($_POST['estoque'])) {
				echo "<font color='red'>O estoque do produto está vazio.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>clique aqui para voltar</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database	
			$resultado = $pdo->prepare("INSERT INTO produtos (titulo, descricao, preco, porc_desconto, estoque) VALUES (?, ?, ?, ?, ?)");

			$resultado->execute([$_POST['titulo'], $_POST['descricao'], $_POST['preco'], $_POST['porc_desconto'], $_POST['estoque']]);

			echo "<font color='green'>O produto foi adicionado com sucesso!.";
			echo "<br/><a href='manipularProduto.php'>Visualizar resultado</a>";
		}
	}
	?>
</body>

</html>