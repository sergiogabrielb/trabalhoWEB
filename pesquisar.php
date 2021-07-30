<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'eletronic_by';

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$pesquisar = $_POST['pesquisar'];

$result_produtos = "SELECT * FROM produtos WHERE titulo LIKE '%$pesquisar%' LIMIT 5";

$resultado_produtos = mysqli_query($conn, $result_produtos);

while($rows_produtos = mysqli_fetch_array($resultado_produtos)){
    echo "Produtos pesquisados: ".$rows_produtos['titulo']."<br/>";
}

?>