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

$conn = mysqli_connect($db_host, $db_user, $db_pass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

function fetch_assoc($conn, $sql)
{
    printf("[x] fetching assoc %s\n", $sql);

    if ($response = $conn->query($sql)) {
        while ($row = $response->fetch_assoc()) {
            print_r($row);
        }
    } else {
        printf("Unable to fetch assoc");
    }
}

function step0($conn)
{
    printf("Tables list\n----------------\n");
    fetch_assoc($conn, "SHOW TABLES");
}

// step0($conn);

$users_table = "";
function step1($conn, $users_table)
{
    printf("Users table list\n----------------\n");
    fetch_assoc($conn, vsprintf("SELECT * FROM `%s`", $users_table));
}

// step1($conn, $users_table);

function step2($conn, $users_table, $admin_id)
{
    print("Dropping admin password\n");

    $sql = vsprintf("UPDATE `%s` SET `user_pass` = MD5('1234567') WHERE `ID` = %d", [$users_table, $admin_id]);

    if ($conn->query($sql)) {
        printf("Admin password dropped\n");
    } else {
        printf("Unable to drop admin password %s\n", $conn->error);
    }
}

// step2($conn, $users_table, 1);

echo "</pre>";
