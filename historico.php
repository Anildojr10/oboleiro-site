<?php
$conn = new mysqli("localhost", "root", "", "oboleiro");
if ($conn->connect_error) die("Erro de conexão");

$result = $conn->query("SELECT * FROM pedidos ORDER BY data_pedido DESC");

echo "<h1>Histórico de Pedidos</h1><ul>";
while($row = $result->fetch_assoc()) {
  echo "<li><strong>{$row['cliente_nome']}</strong> pediu <em>{$row['quantidade']}x {$row['item']}</em> (R$ {$row['preco']}) em {$row['data_pedido']}</li>";
}
echo "</ul>";
?>