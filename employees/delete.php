<?php 

require "../db.php";

if(isset($_GET["id"])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM employees WHERE id = :id");
        $stmt->execute(["id" => $_GET["id"]]);
        $row = $stmt->fetch();
        header("Location: /zavprojekttwe/employees/?toast=true&color=green&message=Employee deleted successfully!");
    } catch (Exception $e) {
        header("Location: /zavprojekttwe/employees/?toast=true&color=red&message=Employee could not be deleted!");
    }
    



    
}