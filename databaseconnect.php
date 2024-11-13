<?php
// MySQL connection settings
$mysql_servername = "127.0.0.1";
$mysql_username = "root";
$mysql_password = ""; // Your MySQL password
$mysql_dbname = "logintatib";

// Create MySQL connection
$mysql_conn = new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);

// Check MySQL connection
if ($mysql_conn->connect_error) {
    die("MySQL Connection failed: " . $mysql_conn->connect_error);
} else {
    echo "Connected to MySQL successfully.<br>";
}

// SQL Server connection settings
$sqlsrv_servername = "127.0.0.1"; // Update to your SQL Server IP if necessary
$sqlsrv_username = ""; // Username for SQL Server if not using Windows Authentication
$sqlsrv_password = ""; // Password for SQL Server
$sqlsrv_database = "YourSQLServerDatabase"; // Your SQL Server database name

// Create SQL Server connection using PDO
try {
    $sqlsrv_conn = new PDO("sqlsrv:Server=$sqlsrv_servername;Database=$sqlsrv_database", $sqlsrv_username, $sqlsrv_password);
    $sqlsrv_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to SQL Server successfully.<br>";
} catch (PDOException $e) {
    die("SQL Server Connection failed: " . $e->getMessage());
}

// Sample query for MySQL
$mysql_query = "SELECT * FROM `1`";
$mysql_result = $mysql_conn->query($mysql_query);

if ($mysql_result->num_rows > 0) {
    echo "MySQL Data:<br>";
    while ($row = $mysql_result->fetch_assoc()) {
        echo "Username: " . $row["username"] . ", Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No data found in MySQL.<br>";
}

// Sample query for SQL Server
$sqlsrv_query = "SELECT TOP 5 * FROM YourTable"; // Adjust table name and query as needed
$sqlsrv_stmt = $sqlsrv_conn->query($sqlsrv_query);

if ($sqlsrv_stmt) {
    echo "SQL Server Data:<br>";
    while ($row = $sqlsrv_stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Column1: " . $row["Column1"] . ", Column2: " . $row["Column2"] . "<br>"; // Adjust columns as needed
    }
} else {
    echo "No data found in SQL Server.<br>";
}

// Close connections
$mysql_conn->close();
$sqlsrv_conn = null;
?>
