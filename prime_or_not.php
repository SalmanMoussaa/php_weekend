<?php
function is_prime($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function is_even($n) {
    return $n % 2 == 0;
}

function is_prime_and_even($year_of_birth) {
    $current_year = date('Y');
    $age = $current_year - $year_of_birth;
    $is_prime = is_prime($age);
    $is_even = is_even($age);
    return array('prime' => $is_prime, 'even' => $is_even);
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
    exit;
}
$post_data = json_decode(file_get_contents('php://input'), true);
if (empty($post_data['year_of_birth'])) {
    http_response_code(400);
    echo json_encode(array('error' => 'Year of birth is required'));
    exit;
}
$response = is_prime_and_even(intval($post_data['year_of_birth']));
header('Content-Type: application/json');
echo json_encode($response);
?>
