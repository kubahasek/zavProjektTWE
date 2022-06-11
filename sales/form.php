<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/saleform.css">
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
        header("Location: /zavprojekttwe/sales/?toast=true&color=green&message=Sale added successfully!&redirect=/zavprojekttwe/sales/");
    } else if (isset($_POST) && !empty($_POST) && isset($_GET["id"])) {
        header("Location: /zavprojekttwe/sales/?toast=true&color=green&message=Sale updated successfully!&redirect=/zavprojekttwe/sales/");
    }
    if (isset($_GET["id"])) {
            $stmt = $pdo->prepare("SELECT * FROM sales WHERE id = :id");
            $stmt->execute(["id" => $_GET["id"]]);
            $row = $stmt->fetch();
        }
    ?>
    <div class="grid-container">
        <div class="mobile-nav">
            <div class="mobile-nav-links">
                    <a href="/zavprojekttwe">
                        <div class="mobile-nav-link">  
                            <div class="mobile-nav-link-content">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="mobile-non-active-link"></div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/employees">
                        <div class="mobile-nav-link">
                            
                            <div class="mobile-nav-link-content">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="mobile-non-active-link"></div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/sales">
                        <div class="mobile-nav-link">
                            
                            <div class="mobile-nav-link-content">
                                <i class="fa-solid fa-shopping-cart"></i>
                            </div>
                            <div class="mobile-active-link"></div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/products">
                        <div class="mobile-nav-link">
                            
                            <div class="mobile-nav-link-content">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <div class="mobile-non-active-link"></div>
                        </div>
                    </a>
            </div>
        </div> 
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
                            <div class=""></div>
                            <div class="sidebar-link-content">
                                <i class="fa-solid fa-users"></i>
                                <span>Employees</span>
                            </div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/sales">
                        <div class="sidebar-link">
                            <div class="active-link"></div>
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
                            <label><span>Seller</span> 
                                        <select name="seller">
                                            <?php foreach (getSellers() as $key => $seller): ?>
                                                <option value="<?= $seller["id"] ?>" <?= isset($_GET["id"]) ? ($row["idSeller"] === $seller["id"] ? "selected" : "") : ""?>><?= $seller["sellerName"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                            </label>
                        </div>
                        <div class="fields-container">
                            <label><span>Product</span> 
                                        <select name="product">
                                            <?php foreach (getProductsForSelect() as $key => $product): ?>
                                                <option value="<?= $product["id"] ?>" <?= isset($_GET["id"]) ? ($row["idProduct"] === $product["id"] ? "selected" : "") : ""?>><?= $product["name"] ?> </option>
                                            <?php endforeach ?>
                                        </select>
                            </label>
                        </div>
                        <div class="fields-container">
                            <label><span>No.</span> <input type="number" name="items" min=0 value="<?php echo isset($_GET["id"]) ? $row["items"] : "" ?>" required></label>
                            <label><span>Date</span> <input type="date" name="date" value="<?php echo isset($_GET["id"]) ? $row["saleDate"] : date("Y-m-d") ?>" required></label>
                        </div>
                        <div class="fields-container checkbox-container">
                            <label><span>10% Sale</span> <input type="checkbox" name="sale" id=""></label>
                        </div>
                        <input class="button" value="<?= isset($_GET["id"]) ? "Edit" : "Add" ?>" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST) && !empty($_POST) && !isset($_GET["id"])) {
        $stmt = $pdo->prepare("INSERT INTO sales (idSeller, idProduct, items, saleDate, price) VALUES (:idSeller, :idProduct, :items, :date, :price)");
        if ($_POST["sale"]) {
            $price = getProductById($_POST["product"])["price"] * 0.9 * $_POST["items"];
        } else {
            $price = getProductById($_POST["product"])["price"] * $_POST["items"];
        }
        $stmt->execute([
            "idSeller" => $_POST["seller"],
            "idProduct" => $_POST["product"],
            "items" => $_POST["items"],
            "date" => $_POST["date"],
            "price" => $price 
        ]);
    };
    if (isset($_POST) && !empty($_POST) && isset($_GET["id"])) {
        $stmt = $pdo->prepare("UPDATE sales SET idSeller = :idSeller, idProduct = :idProduct, items = :items, saleDate = :date, price = :price WHERE id = :id");
        if ($_POST["sale"]) {
            $price = getProductById($_POST["product"])["price"] * 0.9 * $_POST["items"];
        } else {
            $price = getProductById($_POST["product"])["price"] * $_POST["items"];
        }
        $stmt->execute([
            "idSeller" => $_POST["seller"],
            "idProduct" => $_POST["product"],
            "items" => $_POST["items"],
            "date" => $_POST["date"],
            "price" => $price,
            "id" => $_GET["id"]
        ]);
    }
    ?>
</body>
</html>