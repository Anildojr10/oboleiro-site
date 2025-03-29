<?php
$conn = new mysqli("localhost", "root", "", "oboleiro");
if ($conn->connect_error) die("Erro de conexão");

$result = $conn->query("SELECT * FROM produtos");

echo "<h1>Cardápio da O Boleiro Bolos</h1>";
echo "<form method='POST' action='processar_pedido.php'>";
echo "Nome: <input type='text' name='cliente_nome' required><br>";
echo "Item: <select name='produto_id'>";

while ($row = $result->fetch_assoc()) {
  $nome = htmlspecialchars($row['nome']);
  $preco = number_format($row['preco'], 2, ',', '.');
  echo "<option value='{$row['id']}'>{$nome} - R$ {$preco}</option>";
}

echo "</select><br>";
echo "Quantidade: <input type='number' name='quantidade' value='1' min='1'><br>";
echo "<input type='submit' value='Fazer Pedido'>";
echo "</form>";
?>
