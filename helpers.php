<?php

function getEmployees(){
    require "db.php";
    $sql = "SELECT * FROM employees";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
        
    return $data;
        
}

function getSales(){
    require "db.php";
    $sql = "SELECT * FROM sales";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
            
    return $data;
            
}

function getProducts(){
    require "db.php";                    
    $sql = "SELECT * FROM products";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
                    
    return $data;

}

function getEmployeeById($id){
    require "db.php";        
    $sql = "SELECT * FROM employees WHERE id = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(["id" => $id]);
    $data = $stmt -> fetch();
    
    return $data;
        
}