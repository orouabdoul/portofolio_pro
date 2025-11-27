<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portofolio_pro','root','');
$stmt = $pdo->query("SELECT id,email,password,created_at FROM admins WHERE email='admin@portfolio.com' LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($row, JSON_PRETTY_PRINT);
