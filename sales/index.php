<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/base.css">
    <script src="https://kit.fontawesome.com/e58aedf901.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Dunder Mifflin</title>
</head>
<body>
    <?php require "../helpers.php"; ?>
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
                            <div></div>
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

        </div>
    </div>
    
</body>
</html>