<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
include("conexao.php");
$conexao = mysqli_connect($servidor, $usuario, $senha);

if (mysqli_connect_error()) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
$sql_create_db = "CREATE DATABASE IF NOT EXISTS hospital";
if ($conexao->query($sql_create_db) === TRUE) {
    echo "Banco de dados 'hospital' criado com sucesso.<br>";
} else {
    echo "Erro ao criar o banco de dados: " . $conexao->error;
}
$conexao->select_db("hospital");

// SQL para criar tabela de médicos
$sql_medicos = "CREATE TABLE IF NOT EXISTS medicos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    ativacao BOOLEAN NOT NULL
)";

// SQL para criar tabela de pacientes
$sql_pacientes = "CREATE TABLE IF NOT EXISTS pacientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    ativacao BOOLEAN NOT NULL
)";

$sql_pacientes = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    ativacao BOOLEAN NOT NULL
)";




// Adicione outras tabelas conforme necessário (prontuários, consultas, etc.)

if ($conn->query($sql_medicos) === TRUE && $conn->query($sql_pacientes) === TRUE) {
    echo "Tabelas criadas com sucesso!";
} else {
    echo "Erro na criação das tabelas: " . $conn->error;
}


$conexao->close();
