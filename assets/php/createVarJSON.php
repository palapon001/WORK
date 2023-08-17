<?php 
function createVarJSON($name, $start, $end) {
    $JSON = [];
    for ($i = $start; $i <= $end; $i++) {
        $JSON[] = "#$name$i";
    }
    return json_encode($JSON);
}
?>
<?php 
function echoTAGID($name, $start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        echo "#$name$i".',';
    }
}
?>
<?php 
function echoIFVar($name, $start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        echo "!$name$i ";
        if ($i !== $end) {
            echo " && ";
        }
    }
}
?>
<?php
function echoCreateVar($name, $start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        echo "var $name$i = $('#$name-$i').prop('checked');\n";
    }
}
?>
