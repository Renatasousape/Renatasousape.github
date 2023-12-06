<?php
include 'db.php';

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    // Consulta para verificar as credenciais do médico
    $sql = "SELECT * FROM medicos WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            // Autenticação bem-sucedida
            session_start();
            $_SESSION['medico_id'] = $row['id'];
            header("Location: visualizar_prontuarios.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Médico não encontrado.";
    }
}
