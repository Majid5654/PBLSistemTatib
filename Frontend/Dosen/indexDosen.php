<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styleDosen.css">
    <title>Dashboard Design #02 | TatibSystem</title>
</head>

<body>

    <div class="top-container">
        <?php
            include('./components/navbarDosen.php');
        ?>
    </div>

    <div class="header">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                    include('./pages/dashboard/pageDosen.php');
                    
                } else if ($page === 'violance') {
                    include('./pages/violance/violanceDosen.php');
                    
                }
            } else {
                include('./pages/dashboard/pageDosen.php');
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Rules') {
                    include('./pages/RulesDosen.php');
                }
            } else {    
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Setting') {
                    include('./pages/SettingDosen.php');
                }
            } else {    
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                if ($page === 'dashboard') {
                } else if ($page === 'Service') {
                    include('./pages/ServicesDosen.php');
                }
            } else {    
            }
        ?>
    </div>

    <div class="footer">
    <?php
            include('./components/footerDosen.php');
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./assets/js/scriptDosen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>