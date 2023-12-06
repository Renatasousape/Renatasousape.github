<?php
include 'db.php';

// Verificar se o paciente está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o paciente tem uma sessão válida

session_start();

if (!isset($_SESSION['paciente_id'])) {
    header("Location: login_paciente.php"); // Redirecionar para a página de login
    exit();
}

// Consulta para obter a disponibilidade atual dos médicos
$sql = "SELECT * FROM disponibilidade";
$result = $conn->query($sql);

$disponibilidade = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $disponibilidade[] = $row;
    }
}

// Exibir formulário para agendamento de consulta
?>

<h2>Agendar Consulta</h2>

<!-- Adicione um formulário com campos para médico, data, hora de início e hora de término -->

<!-- Após o envio do formulário, processe os dados para inserir o agendamento no banco de dados -->