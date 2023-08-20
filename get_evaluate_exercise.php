<?php
include 'assets/php/evaluateExercise.php';
if (isset($_GET['daysPerWeek']) && isset($_GET['intensity']) && isset($_GET['duration'])) {
    $daysPerWeek = $_GET['daysPerWeek'];
    $intensity = $_GET['intensity'];
    $duration = $_GET['duration'];
    $pass = 0;
    $not_pass = 0;

    $evaluationResult = evaluateExercise($daysPerWeek, $intensity, $duration);
    //echo $evaluationResult;
    if ($evaluationResult == 'ผ่านเกณฑ์') {
        $pass++;
    } else {
        $not_pass++;
    }
    echo "pass = ". $pass;
    echo "not_pass = ". $not_pass;
} else {
    echo "ไม่สามารถประเมินได้";
}
