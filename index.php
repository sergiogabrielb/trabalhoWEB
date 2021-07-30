<?php
//including the database connection file
include_once("config.php");
$pdo = pdo_connect_mysql();

$resultado = $pdo->prepare("SELECT * FROM produtos ORDER BY id DESC");
$resultado->execute()
?>


<html>

<head>
	<title>Homepage</title>
</head>

<body>
	<a href="add.html">Add New Data</a><br /><br />

	<table width='80%' border=0>

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
</body>

</html>