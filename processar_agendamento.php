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
    $medico_id = $_POST["medico_id"];
    $data = $_POST["data"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];

    // Verificar se a consulta está dentro da disponibilidade do médico
    $sql_disponibilidade = "SELECT * FROM disponibilidade WHERE medico_id = '$medico_id' AND data = '$data' AND hora_inicio <= '$hora_inicio' AND hora_fim >= '$hora_fim'";
    $result_disponibilidade = $conn->query($sql_disponibilidade);

    if ($result_disponibilidade->num_rows > 0) {
        // Inserir novo agendamento no banco de dados
        $sql_agendamento = "INSERT INTO consultas (medico_id, paciente_id, data, hora_inicio, hora_fim) VALUES ('$medico_id', '$paciente_id', '$data', '$hora_inicio', '$hora_fim')";

        if ($conn->query($sql_agendamento) === TRUE) {
            echo "Consulta agendada com sucesso!";
        } else {
            echo "Erro no agendamento da consulta: " . $conn->error;
        }
    } else {
        echo "O médico não está disponível nesse horário.";
    }
}

$conn->close();
