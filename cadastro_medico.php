<?php
include '../../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $nome = $_POST["nome"];
    $username = $_POST["username"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Armazenar senha de forma segura
    $email = $_POST["email"];
    $ativacao = isset($_POST["ativacao"]) ? 1 : 0;

    // Inserir dados no banco de dados
    $sql = "INSERT INTO medicos (nome, username, senha, email, ativacao) VALUES ('$nome', '$username', '$senha', '$email', $ativacao)";

    if (mysqli_query($conexao, $sql)) {
        echo "Novo registro inserido com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
}
