<?php
function selection_sort($input_str) {
    if (empty($input_str)) {
        http_response_code(400);
        return array('error' => 'No input provided');
    }

    // Convert input string to list of integers
    $numbers = explode(',', $input_str);
    foreach ($numbers as &$n) {
        $n = intval($n);
        if (!is_numeric($n)) {
            http_response_code(400);
            return array('error' => 'Invalid input format');
        }
    }
    
    // Perform selection sort
    for ($i = 0; $i < count($numbers); $i++) {
        $min_index = $i;
        for ($j = $i+1; $j < count($numbers); $j++) {
            if ($numbers[$j] < $numbers[$min_index]) {
                $min_index = $j;
            }
        }
        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$min_index];
        $numbers[$min_index] = $temp;
    }
    
    // Return sorted list as JSON
    return array('result' => $numbers);
}

$input_str = isset($_GET['numbers']) ? $_GET['numbers'] : '';
$result = selection_sort($input_str);
header('Content-Type: application/json');
echo json_encode($result);
?>