<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Dashboard Design #02 | TatibSystem</title>
</head>

<body>

    <div class="top-container">

        <?php
            include('./components/navbar.php');
        ?>

        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page == 'dashboard') {
                    include('./pages/dashboard/status.php');
                }
            } else {
                include('./pages/dashboard/status.php');
            }
        ?>
    </div>

    <div class="header">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                    include('./pages/dashboard/page.php');
                    
                } else if ($page === 'violance') {
                    include('./pages/violance.php');
                    
                }
            } else {
                include('./pages/dashboard/page.php');
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Attendance') {
                    include('./pages/Attendance.php');
                }
            } else {
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Services') {
                    include('./pages/Services.php');
                }
            } else {     
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Rules') {
                    include('./pages/Rules.php');
                }
            } else {    
            }
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/scriptlogin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    


</body>
</html>