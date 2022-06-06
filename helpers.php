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
    $sql = "SELECT s.id, concat(e.name,' ', e.surname) as sellerName, p.name as productName, s.items, s.price  FROM sales s inner join employees e on s.idSeller = e.id inner join products p on s.idProduct = p.id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
            
    return $data;
            
}

function getSellers(){
    require "db.php";
    $sql = "SELECT id, concat(name, ' ', surname) as sellerName FROM employees";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
        
    return $data;       
}

function getProductsForSelect(){
    require "db.php";
    $sql = "SELECT id, name FROM products";
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

function getProductById($id){
    require "db.php";        
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute(["id" => $id]);
    $data = $stmt -> fetch();
    
    return $data;
        
}