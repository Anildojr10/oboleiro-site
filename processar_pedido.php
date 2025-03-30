<?php
$conn = new mysqli("localhost", "root", "", "oboleiro");
if ($conn->connect_error) die("Erro de conexão");

$nome = $_POST['cliente_nome'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];

// Buscar info do produto
$res = $conn->query("SELECT nome, preco FROM produtos WHERE id = $produto_id");
if ($res->num_rows != 1) die("Produto não encontrado");
$produto = $res->fetch_assoc();

$item = $produto['nome'];
$preco = $produto['preco'];

$stmt = $conn->prepare("INSERT INTO pedidos (cliente_nome, item, quantidade, preco) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssid", $nome, $item, $quantidade, $preco);
$stmt->execute();

echo "<h2>Pedido realizado com sucesso!</h2>";
echo "<p><a href='menu.php'>Fazer novo pedido</a> | <a href='historico.php'>Ver histórico</a></p>";
?>
