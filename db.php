<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
include("conexao.php");
$conexao = mysqli_connect($servidor, $usuario, $senha);

if (mysqli_connect_error()) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
