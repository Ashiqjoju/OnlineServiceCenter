<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'insert') {
      // Insert product into the database
      $description = $_POST['description'];
      $amount = $_POST['amount'];


      try {
        $dbh = new PDO($dsn, $username, $password);
        $stmt = $dbh->prepare('INSERT INTO products (description, amount) VALUES (?, ?)');
        $stmt->bindParam(1, $description);
        $stmt->bindParam(2, $amount);
        $stmt->execute();

        echo "Product inserted successfully!";
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    } elseif ($action === 'delete') {
      // Delete product from the database
      $description = $_POST['description'];
      $amount = $_POST['amount'];

      // Perform database deletion using your preferred method (e.g., PDO, MySQLi)
      // Example using PDO
      $dsn = 'mysql:host=localhost;dbname=your_database';
      $username = 'your_username';
      $password = 'your_password';

      try {
        $dbh = new PDO($dsn, $username, $password);
        $stmt = $dbh->prepare('DELETE FROM products WHERE description = ? AND amount = ?');
        $stmt->bindParam(1, $description);
        $stmt->bindParam(2, $amount);
        $stmt->execute();

        echo "Product deleted successfully!";
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}
?>
