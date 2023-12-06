<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $nome = $_POST["nome"];
    $username = $_POST["username"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Armazenar senha de forma segura
    $email = $_POST["email"];
    $ativacao = isset($_POST["ativacao"]) ? 1 : 0;

    // Inserir dados no banco de dados
    $sql = "INSERT INTO pacientes (nome, username, senha, email, ativacao) VALUES ('$nome', '$username', '$senha', '$email', $ativacao)";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro de paciente realizado com sucesso!";
    } else {
        echo "Erro no cadastro de paciente: " . $conn->error;
    }
}

$conn->close();
