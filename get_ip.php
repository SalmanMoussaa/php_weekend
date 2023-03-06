<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
    exit;
}

$ip_address = $_SERVER['REMOTE_ADDR'];
header('Content-Type: application/json');
echo json_encode(array('ip_address' => $ip_address));
?>
