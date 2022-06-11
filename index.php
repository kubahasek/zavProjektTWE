<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <script src="https://kit.fontawesome.com/e58aedf901.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Dunder Mifflin</title>
</head>
<body>
    <?php require "./helpers.php"; ?>
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
                            <div class="active-link"></div>
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
            <div class="top-container">
                <div class="top-container-content">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <h2>Sales</h2>
                            <p>14 days</p>
                        </div>
                        <div class="stat-card-data">
                            <h2><?= getSalesInLast14Days()["noOfSales"] ?> sales</h2>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <h2>Revenue</h2>
                            <p>All time</p>
                        </div>
                        <div class="stat-card-data">
                            <h2><?= number_format(getAllTimeRevenue()["revenue"], 0, ",", " ") ?> KČ</h2>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <h2>Top seller</h2>
                            <p>All time</p>
                        </div>
                        <div class="stat-card-data">
                            <h2><?= getBestSeller()["name"] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-container">
                <div class="chart">
                    <h1>Sales</h1>
                    <p>Last 7 days</p>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./toast.js"></script>
    <script type="text/javascript">var sales7daysData = <?= json_encode(getNoOfSales7Days()) ?></script>
    <script src="./dashboard.js"></script>
</body>
</html>