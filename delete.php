<?php
//including the database connection file
include("config.php");
$pdo = pdo_connect_mysql();

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$resultado = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
$resultado->execute([$id]);

//redirecting to the display page (index.php in our case)
header("Location:manipularProduto.php");
