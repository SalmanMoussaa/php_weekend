<?php
function is_palindrome($str) {
    $clean_str = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $str));
    return strrev($clean_str) === $clean_str;
}

$input_str = isset($_GET['input']) ? $_GET['input'] : '';
$is_palindrome = is_palindrome($input_str);
$response = array('result' => $is_palindrome ? 'true' : 'false');
header('Content-Type: application/json');
echo json_encode($response);
?>