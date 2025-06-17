<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "bd_Ong");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$tipo = $data['tipo'];
$dataEvento = $data['data'];

session_start();
$id_fun_fk = $_SESSION['id_fun'] ?? 1;

$sql = "INSERT INTO Evento (tipo_eve, data_eve, id_fun_fk) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $tipo, $dataEvento, $id_fun_fk);

if ($stmt->execute()) {
    echo "Evento salvo com sucesso!";
} else {
    echo "Erro ao salvar evento: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
