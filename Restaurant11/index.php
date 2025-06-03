<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Order</title>
</head>

<body>
  <h2>Order Booking</h2>
  <form action="bill.php" method="post">
    <label for="">Customer Name:</label>
    <input type="text" name="name" required><br>

    <label for="">Email :</label>
    <input type="email" name="email" required><br>

    <label>Mobile:</label>
    <input type="text" name="mobile" required><br>

    <label>Item 1:</label>
    <input type="text" name="item1" value="Pizza">
    <label>Qty:</label>
    <input type="number" name="qty1" value="1"><br>

    <label>Item 2:</label>
    <input type="text" name="item2" value="Pasta">
    <label>Qty:</label>
    <input type="number" name="qty2" value="2"><br>

    <input type="submit" value="Place Order">

  </form>
</body>

</html>


<!-- 
  add path in enviroment var 
  C:\xampp\mysql\bin

  command to reset pass - 
  mysqld --skip-grant-tables
  mysql -u root

  FLUSH PRIVILEGES;
  ALTER USER 'root'@'localhost' IDENTIFIED BY 'new_password';
  exit;

  run this in command line 

  mysql -u root -p < db.sql


-->