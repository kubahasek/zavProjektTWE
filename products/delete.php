<?php 

require "../db.php";

if(isset($_GET["id"])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(["id" => $_GET["id"]]);
        $row = $stmt->fetch();
        header("Location: /zavprojekttwe/products/?toast=success");
    } catch (Exception $e) {
        header("Location: /zavprojekttwe/products/?toast=fail");
    }   
}