<?php

require "db.php";

function getEmployees(){
        
    $sql = "SELECT * FROM employees";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
        
    return $data;
        
}

function getSales(){
            
    $sql = "SELECT * FROM sales";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
            
    return $data;
            
}

function getProducts(){
                    
    $sql = "SELECT * FROM products";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
                    
    return $data;

}

function getEmployeeById($id){
        
    $sql = "SELECT * FROM employees WHERE id = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(["id" => $id]);
    $data = $stmt -> fetch();
    
    return $data;
        
}