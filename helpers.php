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

function getSalesInLast14Days() {
    require "db.php";
    $sql = "select count(s.id) from employees e inner join sales s on e.id = s.idSeller where CURRENT_DATE() - s.saleDate <= 14";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetch();
            
    return $data;
}

function getAllTimeRevenue() {
    require "db.php";
    $sql = "select sum(price) from sales";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetch();
            
    return $data;
}

function getBestSeller() {
    require "db.php";
    $sql = "select e.id, concat(e.name, ' ', e.surname) as name, count(e.id) as noOfSales from employees e inner join sales s on e.id = s.idSeller group by e.id order by count(e.id) desc LIMIT 1";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetch();
            
    return $data;
}