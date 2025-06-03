<?php
include 'database_handling.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

mysqli_query($conn, "INSERT INTO customers (name, email, mobile) VALUES ('$name', '$email', '$mobile')");
$customer_id = mysqli_insert_id($conn);

$items = [
  ['name' => $_POST['item1'], 'qty' => $_POST['qty1'], 'price' => 200],
  ['name' => $_POST['item2'], 'qty' => $_POST['qty2'], 'price' => 150]
];

echo "<h2>Bill for $name</h2><table border='1'><tr><th>Item</th><th>Qty</th><th>Price</th><th>Total</th></tr>";
$grand_total = 0;
foreach ($items as $item) {
  $total = $item['qty'] * $item['price'];
  $grand_total += $total;

  mysqli_query($conn, "INSERT INTO orders (customer_id, item_name, quantity, price)
                       VALUES ('$customer_id', '{$item['name']}', '{$item['qty']}', '{$item['price']}')");

  echo "<tr><td>{$item['name']}</td><td>{$item['qty']}</td><td>{$item['price']}</td><td>$total</td></tr>";
}
echo "<tr><td colspan='3'><b>Grand Total</b></td><td><b>$grand_total</b></td></tr></table>";


?>