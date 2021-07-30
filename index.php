<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
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
		<img src="./images/background.jpg"/>

	<div class="conteudo">
		<a href="add.html"><button class="addProduto"><i class="fas fa-plus"></i>

	Cadastrar Produto</button></a>
		
<div class="conteudoTabela">
			<table class="tabela">
	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
		<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td> <a class=noDecoration href=\"edit.php?id=$res[id]\"><button class=editDelete> Editar </button> </a><a class=noDecoration href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class=editDelete>Excluir</Delete> </a></td>";		
	}
	?>
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
