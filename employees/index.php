<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/employees.css">
    <script src="https://kit.fontawesome.com/e58aedf901.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Dunder Mifflin</title>
</head>
<body>
    <?php require "../helpers.php"; ?>
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
                            <div class="mobile-active-link"></div>
                        </div>
                    </a>
                    <a href="/zavprojekttwe/sales">
                        <div class="mobile-nav-link">
                            
                            <div class="mobile-nav-link-content">
                                <i class="fa-solid fa-shopping-cart"></i>
                            </div>
                            <div class="mobile-non-active-link"></div>
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
            <div class="top-container">
                <div class="top-container-content">
                    <div class="search">
                        <input type="text" class="search-box" placeholder="Search...">
                    </div>
                    <div class="button">
                        <a href="/zavprojekttwe/employees/form.php">
                            <div class="button-content">
                                <i class="fa-solid fa-lg fa-plus"></i>
                                <span>Add Employee</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bottom-container">
                <div class="employee-list">
                    <table class="employee-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="employee-table-data">
                        </tbody>    
                    </table>                
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript">let employeesData = <?php echo json_encode(getEmployees()) ?></script>
    <script src="./employees.js"></script>
    <script src="../toast.js"></script>
</body>
</html>