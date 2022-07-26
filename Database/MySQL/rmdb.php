<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = '';
$db_user = '';
$db_pass = '';
$dbname = '';

echo "<pre>";

printf("Connecting to %s using credentials of %s\n", $db_host, $db_user);

$conn = mysqli_connect($db_host, $db_user, $db_pass);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

printf("Dropping database %s\n", $dbname);

$sql = sprintf("DROP DATABASE %s", $dbname);

if (!$conn->query($sql)) {
    printf("Error deleting database %s\n", $conn->error);
} else {
    printf("Database has been deleted\n");
}

printf("Checking database existence...\n");

$sql = 'SELECT * FROM wp_posts';

if ($result = $conn->query($sql)) {
    printf("Request to table wp_posts has returned %d rows\n", $result->num_rows);
} else {
    printf("Request to table wp_posts has returned now rows\n");
}

$conn->close();

echo "</pre>";
