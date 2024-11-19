<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="./assets/css/Dashboard.css">
	<title>PBLTatibSystem</title>
</head>
<body>
	<!-- SIDEBAR -->
    <?php
        include("./components/sidebar.php");
    ?>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	 
	<section id="content">
		<!-- NAVBAR -->
        <?php
            include("./components/navbar.php");
        ?>
		<!-- NAVBAR -->
		<main>
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    if ($page === 'dashboard') {
                        include('./pages/dashboard.php');
                    } else if ($page === 'attendance') {
                        include('./pages/attendance.php');
                    } else if ($page === 'violation') { 
                        include('./pages/violation.php');
                    } else if ($page === 'rules') {
                        include('./pages/rules.php');
                    } else if ($page === 'services') {
                        include('./pages/services.php');
                    } else {
                        include('./pages/dashboard.php');
                    }
                } else {
                    echo 'Tidak ada page';
                }
            ?>
		</main>
	</section>
	<!-- CONTENT -->
	

	<script src="./assets/js/scriptDashboard.js"></script>
</body>
</html>