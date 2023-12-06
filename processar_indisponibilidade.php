<?php
include 'db.php';

// Verificar se o paciente está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o paciente tem uma sessão válida

session_start();

if (!isset($_SESSION['paciente_id'])) {
    header("Location: login_paciente.php"); // Redirecionar para a página de login
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $paciente_id = $_SESSION['paciente_id'];
    $data = $_POST["data"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];

    // Inserir nova indisponibilidade no banco de dados
    $sql = "INSERT INTO indisponibilidade (paciente_id, data, hora_inicio, hora_fim) VALUES ('$paciente_id', '$data', '$hora_inicio', '$hora_fim')";

    if ($conn->query($sql) === TRUE) {
        echo "Indisponibilidade indicada com sucesso!";
    } else {
        echo "Erro na indicação da indisponibilidade: " . $conn->error;
    }
}

$conn->close();
