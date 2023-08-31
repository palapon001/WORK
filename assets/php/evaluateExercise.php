<?php 
function evaluateExercise($daysPerWeek, $intensity, $duration)
{
    if ($daysPerWeek >= 3 && ($intensity >= 'ระดับปานกลาง' && $intensity <= 'ระดับหนัก') && $duration >= 20) {
        return "ผ่านเกณฑ์";
    } else {
        return "ต่ำกว่าเกณฑ์";
    }
}

