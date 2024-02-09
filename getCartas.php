<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Consulta SQL para obter todas as cartas
$sql = "SELECT * FROM tbl_carta";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    $cartas = array();

    while ($row = $result->fetch_assoc()) {
        $cartas[] = $row;
    }

    // Retorna as cartas no formato JSON
    header('Content-Type: application/json');
    echo json_encode($cartas);
} else {
   
    echo json_encode(array());
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
