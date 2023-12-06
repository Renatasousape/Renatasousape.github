<?php
include 'db.php';

// Verificar se o médico está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o médico tem uma sessão válida

session_start();

if (!isset($_SESSION['medico_id'])) {
    header("Location: login_medico.php"); // Redirecionar para a página de login
    exit();
}

// Consulta para obter a disponibilidade atual do médico
$medico_id = $_SESSION['medico_id'];
$sql = "SELECT * FROM disponibilidade WHERE medico_id = '$medico_id'";
$result = $conn->query($sql);

$disponibilidade = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $disponibilidade[] = $row;
    }
}

// Exibir formulário para definir nova disponibilidade
?>

<h2>Definir Disponibilidade</h2>

<!-- Adicione um formulário com campos para data, hora de início e hora de término -->

<!-- Após o envio do formulário, processe os dados para inserir a nova disponibilidade no banco de dados -->