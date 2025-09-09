<?php
// 1) Data array
// $product = [
//     'sku' => 'MAG1002',
//     'name' => 'Cotton Saree T22',
//     'price' => 249.50
// ];

// // 2) PDO connection (replace credentials)
// $dsn = 'mysql:host=db;dbname=magento;charset=utf8mb4';
// $pdo = new PDO($dsn, 'magento', 'magento');

// // 3) Prepared statement insert
// $sql = "INSERT INTO products (sku, name, price) VALUES (:sku, :name, :price)";
// $stmt = $pdo->prepare($sql);
// $ok = $stmt->execute([
//     ':sku'   => $product['sku'],
//     ':name'  => $product['name'],
//     ':price' => $product['price']
// ]);

// // 4) Check result and show inserted id
// if ($ok) {
//     $insertedId = $pdo->lastInsertId();
//     echo "Inserted product with id: {$insertedId}\n";
// } else {
//     echo "Insert failed\n";
// }


// $productUpdate = ['sku' => 'MAG1001', 'price' => 2799.00];

// // Create MySQLi connection
// $mysqli = mysqli_connect('db', 'magento', 'magento', 'magento');
// if (!$mysqli) {
//     die('Connect error: ' . mysqli_connect_error());
// }
// mysqli_set_charset($mysqli, 'utf8mb4');

// // Prepare update (note: bind_param needs variables, not array elements)
// $sku = $productUpdate['sku'];
// $price = $productUpdate['price'];

// $stmt = mysqli_prepare($mysqli, "UPDATE products SET price = ? WHERE sku = ?");
// mysqli_stmt_bind_param($stmt, "ds", $price, $sku); // d = double, s = string
// mysqli_stmt_execute($stmt);

// // Check affected rows
// $affected = mysqli_stmt_affected_rows($stmt);
// echo "Updated rows: {$affected}\n";

// mysqli_stmt_close($stmt);
// mysqli_close($mysqli);


// $order = ['customer_id' => 1001, 'total' => 2998.00, 'status' => 'pending'];
// $items = [
//     ['sku' => 'MAG1001', 'qty' => 1, 'price' => 1499.00],
//     ['sku' => 'MAG1002', 'qty' => 1, 'price' => 1499.00],
// ];

// $dsn = 'mysql:host=db;dbname=magento;charset=utf8mb4';
// $pdo = new PDO($dsn, 'magento', 'magento');

// // Begin transaction
// $pdo->beginTransaction();

// // 1) Insert order
// $orderSql = "INSERT INTO orders (customer_id, total, status) VALUES (:customer_id, :total, :status)";
// $orderStmt = $pdo->prepare($orderSql);
// $okOrder = $orderStmt->execute([
//     ':customer_id' => $order['customer_id'],
//     ':total'       => $order['total'],
//     ':status'      => $order['status']
// ]);

// $okItems = true;
// if ($okOrder) {
//     $orderId = $pdo->lastInsertId();
//     // 2) Insert items
//     $itemSql = "INSERT INTO order_items (order_id, sku, qty, price) VALUES (:order_id, :sku, :qty, :price)";
//     $itemStmt = $pdo->prepare($itemSql);
//     foreach ($items as $it) {
//         $ok = $itemStmt->execute([
//             ':order_id' => $orderId,
//             ':sku'      => $it['sku'],
//             ':qty'      => $it['qty'],
//             ':price'    => $it['price']
//         ]);
//         if (!$ok) {
//             $okItems = false;
//             break;
//         }
//     }
// } else {
//     $okItems = false;
// }

// // Commit or rollback
// if ($okOrder && $okItems) {
//     $pdo->commit();
//     echo "Order {$orderId} created with " . count($items) . " items. Transaction committed.\n";
// } else {
//     $pdo->rollBack();
//     echo "Transaction failed: rolled back.\n";
// }

// $order = ['customer_id' => 1001, 'total' => 2998.00, 'status' => 'pending'];
// $items = [
//     ['sku' => 'MAG1001', 'qty' => 1, 'price' => 1499.00],
//     ['sku' => 'MAG1002', 'qty' => 1, 'price' => 1499.00],
// ];

// $dsn = 'mysql:host=db;dbname=magento;charset=utf8mb4';
// $pdo = new PDO($dsn, 'magento', 'magento');

// // Begin transaction
// $pdo->beginTransaction();

// // 1) Insert order
// $orderSql = "INSERT INTO orders (customer_id, total, status) VALUES (:customer_id, :total, :status)";
// $orderStmt = $pdo->prepare($orderSql);
// $okOrder = $orderStmt->execute([
//     ':customer_id' => $order['customer_id'],
//     ':total'       => $order['total'],
//     ':status'      => $order['status']
// ]);

// $okItems = true;
// if ($okOrder) {
//     $orderId = $pdo->lastInsertId();
//     // 2) Insert items
//     $itemSql = "INSERT INTO order_items (order_id, sku, qty, price) VALUES (:order_id, :sku, :qty, :price)";
//     $itemStmt = $pdo->prepare($itemSql);
//     foreach ($items as $it) {
//         $ok = $itemStmt->execute([
//             ':order_id' => $orderId,
//             ':sku'      => $it['sku'],
//             ':qty'      => $it['qty'],
//             ':price'    => $it['price']
//         ]);
//         if (!$ok) {
//             $okItems = false;
//             break;
//         }
//     }
// } else {
//     $okItems = false;
// }

// // Commit or rollback
// if ($okOrder && $okItems) {
//     $pdo->commit();
//     echo "Order {$orderId} created with " . count($items) . " items. Transaction committed.\n";
// } else {
//     $pdo->rollBack();
//     echo "Transaction failed: rolled back.\n";
// }

// Connecting with PDO

// Step 1: Connection
// $dsn = 'mysql:host=db;dbname=magento;charset=utf8mb4';
// $username = 'magento';
// $password = 'magento';

// // Create a PDO object (the connection)
// $pdo = new PDO($dsn, $username, $password);

// // Step 2: Prepare & Execute
// $sql = "SELECT sku, name, price FROM products";
// $stmt = $pdo->query($sql);

// // Step 3: Fetch rows
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['sku'] . " - " . $row['name'] . " - " . $row['price'] . "\n";
// }

// $conn = mysqli_connect("db", "magento", "magento", "magento");

// // Check if connection worked
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// echo "Connected successfully";

// // Close connection
// mysqli_close($conn);

// // PDO Connection

// $dsn = "mysql:host=db;dbname=magento;charset=utf8mb4";
// $username = "magento";
// $password = "magento";

// try {
//     $pdo = new PDO($dsn, $username, $password);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }


$host = 'db';
$db = "magento";
$user = 'magento';
$pass = 'magento';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // helpful for debug
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// $product = [
//     'sku' => 'MAG1001',
//     'name' => 'Cotton Saree',
//     'price' => 2499.50,
//     'qty' => 10
// ];

// $sql = "INSERT INTO products (sku, name, price, qty) VALUES (:sku, :name, :price, :qty)";
// $stmt = $pdo->prepare($sql);

// $ok = $stmt->execute([
//     ':sku' => $product['sku'],
//     ':name' => $product['name'],
//     ':price' => $product['price'],
//     ':qty' => $product['qty']
// ]);

// if ($ok) {
//     echo "Inserted product id: " . $pdo->lastInsertId() . PHP_EOL;
// } else {
//     echo "Insert failed" . PHP_EOL;
// }

// Read single product by SKU


// $sku = 'MAG1001';

// $sql = "SELECT id, sku, name, price, qty FROM products WHERE sku = :sku";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([':sku' => $sku]);
// $productRow = $stmt->fetch();

// if ($productRow) {
//     echo "Found: {$productRow['sku']} - {$productRow['name']} - {$productRow['price']} - qty:{$productRow['qty']}" . PHP_EOL;
// } else {
//     echo "Product not found" . PHP_EOL;
// }

// Read multiple (paged) products (basic optimization: LIMIT)

// $page = 1;
// $pageSize = 10;
// $offset = ($page - 1) * $pageSize;

// $sql = "SELECT id, sku, name, price FROM products ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':limit', (int)$pageSize, PDO::PARAM_INT);
// $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
// $stmt->execute();
// $rows = $stmt->fetchAll();

// foreach ($rows as $r) {
//     echo "{$r['sku']} - {$r['name']} - {$r['price']}" . PHP_EOL;
// }

// UPDATE (UPDATE) using PDO


// $update = ['sku' => 'MAG1001', 'price' => 2799.00, 'qty' => 8];

// $sql = "UPDATE products SET price = :price, qty = :qty WHERE sku = :sku";
// $stmt = $pdo->prepare($sql);
// $ok = $stmt->execute([
//     ':price' => $update['price'],
//     ':qty' => $update['qty'],
//     ':sku' => $update['sku']
// ]);

// $affected = $stmt->rowCount();
// echo "Rows updated: $affected" . PHP_EOL;

// DELETE (DELETE) using PDO

// $sku = 'MAG1001';

// $sql = "DELETE FROM products WHERE sku = :sku";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([':sku' => $sku]);

// echo "Rows deleted: " . $stmt->rowCount() . PHP_EOL;

// $dsn = "mysql:host=db;dbname=magento;charset=utf8mb4";
// $pdo = new PDO($dsn, "magento", "magento", [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ]);

// $order = [
//     'customer_id' => 1,
//     'total' => 4500.00,
//     'items' => [
//         ['sku' => 'MAG1001', 'price' => 2500.00, 'qty' => 1],
//         ['sku' => 'MAG1002', 'price' => 2000.00, 'qty' => 1],
//     ]
// ];

// try {
//     // Start transaction
//     $pdo->beginTransaction();

//     // Insert into orders
//     $stmt = $pdo->prepare("INSERT INTO orders (customer_id, total) VALUES (:cid, :total)");
//     $stmt->execute([':cid' => $order['customer_id'], ':total' => $order['total']]);
//     $orderId = $pdo->lastInsertId();

//     // Insert items
//     $stmtItem = $pdo->prepare("INSERT INTO order_items (order_id, sku, price, qty) 
//                                VALUES (:oid, :sku, :price, :qty)");

//     foreach ($order['items'] as $item) {
//         $stmtItem->execute([
//             ':oid' => $orderId,
//             ':sku' => $item['sku'],
//             ':price' => $item['price'],
//             ':qty' => $item['qty']
//         ]);
//     }

//     // Commit transaction
//     $pdo->commit();
//     echo "Order created with ID: $orderId\n";

// } catch (Exception $e) {
//     $pdo->rollBack();
//     echo "Failed to create order: " . $e->getMessage();
// }

// READ Order with Items

// $orderId = 1;

// $sqlOrder = "SELECT * FROM orders WHERE id = :id";
// $stmtOrder = $pdo->prepare($sqlOrder);
// $stmtOrder->execute([':id' => $orderId]);
// $order = $stmtOrder->fetch();

// $sqlItems = "SELECT * FROM order_items WHERE order_id = :id";
// $stmtItems = $pdo->prepare($sqlItems);
// $stmtItems->execute([':id' => $orderId]);
// $items = $stmtItems->fetchAll();

// echo "Order #{$order['id']} (Customer {$order['customer_id']}) Total: {$order['total']}\n";
// foreach ($items as $i) {
//     echo " - {$i['sku']} | {$i['price']} x {$i['qty']}\n";
// }

// UPDATE Order Total

// $newTotal = 4700.00; // maybe price changed
// $orderId = 1;

// $sql = "UPDATE orders SET total = :total WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([':total' => $newTotal, ':id' => $orderId]);

// echo "Rows updated: " . $stmt->rowCount() . "\n";

// DELETE Order

// $orderId = 1;

// $sql = "DELETE FROM orders WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([':id' => $orderId]);

// echo "Order deleted. Rows affected: " . $stmt->rowCount() . "\n";


// $dsn = "mysql:host=db;dbname=magento;charset=utf8mb4";
// $pdo = new PDO($dsn, "magento", "magento", [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ]);

// $orderId = 1;
// $newTotal = 5000.00;

// // New items data (from array)
// $newItems = [
//     ['id' => 1, 'qty' => 2], // item ID 1 → qty 2
//     ['id' => 2, 'qty' => 3], // item ID 2 → qty 3
// ];

// try {
//     $pdo->beginTransaction();

//     // Update orders table
//     $stmt = $pdo->prepare("UPDATE orders SET total = :total WHERE id = :id");
//     $stmt->execute([':total' => $newTotal, ':id' => $orderId]);

//     // Update order_items table
//     $stmtItem = $pdo->prepare("UPDATE order_items SET qty = :qty WHERE id = :id AND order_id = :oid");
//     foreach ($newItems as $item) {
//         $stmtItem->execute([
//             ':qty' => $item['qty'],
//             ':id' => $item['id'],
//             ':oid' => $orderId
//         ]);
//     }

//     $pdo->commit();
//     echo "Order $orderId updated successfully!\n";

// } catch (Exception $e) {
//     $pdo->rollBack();
//     echo "Failed to update order: " . $e->getMessage();
// }

// Delete Order + Items (Cascade)

// $orderId = 1;

// try {
//     $pdo->beginTransaction();

//     // Delete order (items auto-delete via cascade)
//     $stmt = $pdo->prepare("DELETE FROM orders WHERE id = :id");
//     $stmt->execute([':id' => $orderId]);

//     $pdo->commit();
//     echo "Order $orderId deleted successfully!\n";

// } catch (Exception $e) {
//     $pdo->rollBack();
//     echo "Failed to delete order: " . $e->getMessage();
// }


// $dsn = "mysql:host=db;dbname=magento;charset=utf8mb4";
// $pdo = new PDO($dsn, "magento", "magento", [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ]);

// $orderId = 1;

// try {
//     $pdo->beginTransaction();

//     // Update order total
//     $stmt = $pdo->prepare("UPDATE orders SET total = :total WHERE id = :id");
//     $stmt->execute([':total' => 6000, ':id' => $orderId]);

//     // Update existing item (id=1)
//     $stmtUpdate = $pdo->prepare("UPDATE order_items SET qty = :qty WHERE id = :id AND order_id = :oid");
//     $stmtUpdate->execute([':qty' => 3, ':id' => 1, ':oid' => $orderId]);

//     // Insert new item
//     $stmtInsert = $pdo->prepare("INSERT INTO order_items (order_id, sku, price, qty) 
//                                  VALUES (:oid, :sku, :price, :qty)");
//     $stmtInsert->execute([
//         ':oid' => $orderId,
//         ':sku' => 'MAG2003',
//         ':price' => 1500.00,
//         ':qty' => 2
//     ]);

//     $pdo->commit();
//     echo "Order updated + new item added successfully!\n";

// } catch (Exception $e) {
//     $pdo->rollBack();
//     echo "Failed: " . $e->getMessage();
// }

?>
