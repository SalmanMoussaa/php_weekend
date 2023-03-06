<?php
function reverse_numbers($str) {
    $words = explode(' ', $str); 
    $result = '';
    foreach ($words as $word) {
        if (is_numeric($word)) {
            // reverse digits in number
            $reversed = strrev($word);
            $result .= $reversed . ' ';
        } else {
            $result .= $word . ' ';
        }
    }
    return rtrim($result); 
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
    exit;
}

if (empty($_GET['input'])) {
    http_response_code(400);
    echo json_encode(array('error' => 'Input string is required'));
    exit;
}
$response = reverse_numbers($_GET['input']);
header('Content-Type: application/json');
echo json_encode(array('result' => $response));
?>
