<?php 

require "../db.php";

if(isset($_GET["id"])) {
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = :id");
    $stmt->execute(["id" => $_GET["id"]]);
    $row = $stmt->fetch();

    header("Location: /zavprojekttwe/employees");
}