<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styleAdmin.css">
    <title>Dashboard Design #02 | TatibSystem</title>
</head>

<body>

    <div class="top-container">

        <?php
            include('./components/navbarAdmin.php');
        ?>

        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page == 'dashboard') {
                    include('./pages/dashboard/statusAdmin.php');
                }
            } else {
                include('./pages/dashboard/statusAdmin.php');
            }
        ?>
    </div>

   

    <div class="header">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                    include('./pages/dashboard/pageAdmin.php');
                    
                } else if ($page === 'violance') {
                    include('./pages/violanceAdmin.php');
                    
                }
            } else {
                include('./pages/dashboard/pageAdmin.php');
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Attendance') {
                    include('./pages/AttendanceAdmin.php');
                }
            } else {
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Services') {
                    include('./pages/ServicesAdmin.php');
                }
            } else {     
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Rules') {
                    include('./pages/RulesAdmin.php');
                }
            } else {    
            }
        ?>
    </div>

    <div class="footer">
    <?php
            include('./components/footerAdmin.php');
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./assets/js/scriptAdmin.js"></script>
    <script src="./assets/js/scriptlogin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    


</body>
</html>