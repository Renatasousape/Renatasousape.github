<?php
include 'db.php';

// Verificar se o paciente está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o paciente tem uma sessão válida

session_start();

if (!isset($_SESSION['paciente_id'])) {
    header("Location: login_paciente.php"); // Redirecionar para a página de login
    exit();
}

// Consulta para obter a indisponibilidade atual do paciente
$paciente_id = $_SESSION['paciente_id'];
$sql = "SELECT * FROM indisponibilidade WHERE paciente_id = '$paciente_id'";
$result = $conn->query($sql);

$indisponibilidade = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $indisponibilidade[] = $row;
    }
}

// Exibir formulário para indicar nova indisponibilidade
?>

<h2>Indicar Indisponibilidade</h2>

<!-- Adicione um formulário com campos para data, hora de início e hora de término -->

<!-- Após o envio do formulário, processe os dados para inserir a nova indisponibilidade no banco de dados -->