<?php
//including the database connection file
include_once("config.php");
$pdo = pdo_connect_mysql();

$resultado = $pdo->prepare("SELECT * FROM produtos ORDER BY id DESC");
$resultado->execute()
?>


<html>

<head>
	<meta charset="utf-8">
	<link href="./styles/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<title>EletronicBuy</title>
</head>

<body>
	<div class="menu">

		<h3><i class="fa fa-mobile" aria-hidden="true"></i>EletronicBuy</h3>
	</div>
	<div class="content">
		<img src="./images/background.jpg" />

		<div class="conteudo">
			<a href="add.html"><button class="addProduto"><i class="fas fa-plus"></i>

					<tr bgcolor='#CCCCCC'>
						<td>Name</td>
						<td>Age</td>
						<td>Email</td>
						<td>Update</td>
					</tr>
					<?php
					//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
					foreach ($resultado as $produto) {
						echo "<tr>";
						echo "<td>" . $produto['name'] . "</td>";
						echo "<td>" . $produto['age'] . "</td>";
						echo "<td>" . $produto['email'] . "</td>";
						echo "<td><a href=\"edit.php?id=$produto[id]\">Edit</a> | <a href=\"delete.php?id=$produto[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
					}
					?>
					</table>
		</div>

	</div>


</body>

</html>