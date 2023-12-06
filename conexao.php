<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($servidor, $usuario, $senha);

if (mysqli_connect_error()) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$conexao->select_db("renatalorena");
