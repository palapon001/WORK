<?php
function generateCard($imageSrc, $buttonId, $buttonText) {
    $html = '<div>';
    $html .= '<div class="card text-center">';
    $html .= '<img class="card-img-top" src="' . $imageSrc . '" alt="">';
    $html .= '<div class="card-body">';
    $html .= '<button type="button" class="zzz btn btn-warning rounded-pill" id="' . $buttonId . '"  data-bs-toggle="modal" data-bs-target="#Modal">';
    $html .= '<h2>' . $buttonText . '</h2>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
?>