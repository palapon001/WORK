<?php
function generateFormMultiInput($title, $inputName, $containerId, $buttonId) {
    echo '<div class="form-control mb-3">';
    echo '<div class="input-group">';
    echo '<span class="input-group-text">' . $title . '</span>';
    echo '<input name="' . $inputName . '_input" type="text" id="' . $inputName . '_input" class="form-control" required>';
    echo '</div>';
    echo '<button type="button" class="btn btn-primary mt-3" id="add-' . $buttonId . '" onclick="createInputForm(\'' . $title . '\', \'' . $inputName . '\', \'' . $containerId . '\', \'' . $buttonId . '\');" disabled>เพิ่มข้อมูล' . $title . '</button>';
    echo '<div class="form-group mt-3" id="' . $containerId . '">';
    echo '</div>';
    echo '<div class="alert alert-danger mb-3" id="emptyAlert-' . $inputName . '_input" style="display: none;">';
    echo 'กรุณากรอก' . $title;
    echo '</div>';
    echo '</div>';
}

?>