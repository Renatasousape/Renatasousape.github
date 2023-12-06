<?php
include 'db.php';

// Verificar se o médico está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o médico tem uma sessão válida

session_start();

if (!isset($_SESSION['medico_id'])) {
    header("Location: login_medico.php"); // Redirecionar para a página de login
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $medico_id = $_SESSION['medico_id'];
    $data = $_POST["data"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];

    // Inserir nova disponibilidade no banco de dados
    $sql = "INSERT INTO disponibilidade (medico_id, data, hora_inicio, hora_fim) VALUES ('$medico_id', '$data', '$hora_inicio', '$hora_fim')";

    if ($conn->query($sql) === TRUE) {
        echo "Disponibilidade definida com sucesso!";
    } else {
        echo "Erro na definição da disponibilidade: " . $conn->error;
    }
}

$conn->close();
