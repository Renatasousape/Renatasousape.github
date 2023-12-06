<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $medico_id = $_POST["medico_id"];
    $data = $_POST["data"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];
    $duracao = $_POST["duracao"];

    // Inserir dados no banco de dados
    $sql = "INSERT INTO consultas (medico_id, data, hora_inicio, hora_fim, duracao) VALUES ('$medico_id', '$data', '$hora_inicio', '$hora_fim', '$duracao')";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta registrada com sucesso!";
    } else {
        echo "Erro no registro da consulta: " . $conn->error;
    }
}

$conn->close();
