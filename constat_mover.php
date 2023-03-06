<?php
function move_consonants($str) {
    $words = explode(' ', $str); 
    $result = '';
    foreach ($words as $word) {
        $consonants = '';
        while (preg_match('/^[^aeiouAEIOU]/', $word, $matches)) {
            $consonants .= $matches[0];
            $word = substr($word, strlen($matches[0]));
        }
        $result .= $word . $consonants . ' ';
    }
    return rtrim($result); 
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
    exit;
}
if (empty($_POST['input'])) {
    http_response_code(400);
    echo json_encode(array('error' => 'Input string is required'));
    exit;
}
$response = move_consonants($_POST['input']);
header('Content-Type: application/json');
echo json_encode(array('result' => $response));
?>
