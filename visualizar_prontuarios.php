<?php
include 'db.php';

// Verificar se o médico está autenticado (implemente a autenticação conforme necessário)
// Exemplo simples: Verificar se o médico tem uma sessão válida

session_start();

if (!isset($_SESSION['medico_id'])) {
    header("Location: login_medico.php"); // Redirecionar para a página de login
    exit();
}

// Consulta para obter os prontuários do médico
$medico_id = $_SESSION['medico_id'];
$sql = "SELECT * FROM prontuarios WHERE medico_id = '$medico_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir prontuários
    while ($row = $result->fetch_assoc()) {
        echo "ID do Prontuário: " . $row["id"] . "<br>";
        echo "ID do Paciente: " . $row["paciente_id"] . "<br>";
        echo "Descrição: " . $row["descricao"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Nenhum prontuário disponível para este médico.";
}

$conn->close();
