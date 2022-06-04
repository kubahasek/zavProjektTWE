<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/productform.css">
    <script src="https://kit.fontawesome.com/e58aedf901.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Dunder Mifflin</title>
</head>
<body>
    <?php require "../helpers.php"; ?>
    <?php require "../db.php"; ?>
    <?php
    if (isset($_POST) && !empty($_POST) && !isset($_GET["id"])) {
        header("Location: /zavprojekttwe/products/?toast=true&color=green&message=Product added successfully!");
    } else if (isset($_POST) && !empty($_POST) && isset($_GET["id"])) {
        header("Location: /zavprojekttwe/products/?toast=true&color=green&message=Product updated successfully!");
    }
    if (isset($_GET["id"])) {
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->execute(["id" => $_GET["id"]]);
            $row = $stmt->fetch();
        }
    ?>
    <div class="grid-container">
        <div class="sidebar">
            <div class="content">
                <div class="user-info">
                    <img src="https://via.placeholder.com/150" alt="" srcset="">
                    <h2>user name</h2>
                    <i class="fa-solid fa-xl fa-arrow-right-from-bracket sign-out"></i>
                </div>
                <div class="sidebar-links">
                    <a href="/zavprojekttwe">
                        <div class="sidebar-link">
                            <div></div>
                            <div class="sidebar-link-content">
                                <i class="fa-solid fa-chart-line"></i>
                                <span>Dashboard</span>
                            </div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/employees">
                        <div class="sidebar-link">
                            <div class="active-link"></div>
                            <div class="sidebar-link-content">
                                <i class="fa-solid fa-users"></i>
                                <span>Employees</span>
                            </div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/sales">
                        <div class="sidebar-link">
                            <div></div>
                            <div class="sidebar-link-content">
                                <i class="fa-solid fa-shopping-cart"></i>
                                <span>Sales</span>
                            </div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/products">
                        <div class="sidebar-link">
                            <div></div>
                            <div class="sidebar-link-content">
                                <i class="fa-solid fa-box"></i>
                                <span>Products</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-container">
            <div class="form-container">
                <?= isset($_GET["id"]) ? "<h1>Edit product</h1>" :"<h1>Add a new product</h1>" ?>
                <form action="" method="POST">
                    <div class="form-fields">
                        <div class="fields-container">
                            <label><span>Name</span> <input type="text" name="name" value="<?php echo isset($_GET["id"]) ? $row["name"] : "" ?>" autofocus required></label>
                        </div>
                        <div class="fields-container">
                            <label><span>Description</span><textarea name="description" id="" cols="30" rows="5"><?php echo isset($_GET["id"]) ? $row["description"] : "" ?></textarea></label>
                        </div>
                        <div class="fields-container">
                            <label><span>Category</span>
                            <div class="radio-container">
                                <label for=""><input type="radio" name="category" value="Elektronika" id="" <?= isset($_GET["id"]) && $row["category"] === "Elektronika" ? "checked" : "" ?>><span>Electronics</span></label>
                                <label for=""><input type="radio" name="category" value="Psací potřeby" id="" <?= isset($_GET["id"]) && $row["category"] === "Psací potřeby" ? "checked" : "" ?>><span>Writing</span></label>
                                <label for=""><input type="radio" name="category" value="Papír" id="" <?= isset($_GET["id"]) && $row["category"] === "Papír" ? "checked" : "" ?>><span>Paper</span></label>
                            </div>
                        </div>
                        <div class="fields-container">
                            <label><span>Price</span> <input type="number" name="price" min=0 value="<?php echo isset($_GET["id"]) ? $row["price"] : "" ?>" required></label>
                            <label><span>Stock</span> <input type="number" name="stock" min=0 value="<?php echo isset($_GET["id"]) ? $row["stock"] : "" ?>" required></label>
                        </div>
                        <input class="button" value="<?= isset($_GET["id"]) ? "Edit" : "Add" ?>" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST) && !empty($_POST) && !isset($_GET["id"])) {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, category, price, stock) VALUES (:name, :description, :category, :price, :stock)");

        $stmt->execute([
            "name" => $_POST["name"],
            "description" => $_POST["description"],
            "category" => $_POST["category"],
            "price" => $_POST["price"],
            "stock" => $_POST["stock"]
            
        ]);
    };
    if (isset($_POST) && !empty($_POST) && isset($_GET["id"])) {
        $stmt = $pdo->prepare("UPDATE products SET name = :name, description = :description, category = :category, price = :price, stock = :stock WHERE id = :id");

        $stmt->execute([
            "name" => $_POST["name"],
            "description" => $_POST["description"],
            "category" => $_POST["category"],
            "price" => $_POST["price"],
            "stock" => $_POST["stock"],
            "id" => $_GET["id"]
            
        ]);
    }
    ?>
</body>
</html>