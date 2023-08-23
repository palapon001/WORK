<?php
function generateFormCheck($itemArray, $itemName, $itemHead, $alertText, $foundUser, $defaultValue)
{
    $resultHTML = '';
    $numColumns = 2; // จำนวนคอลัมน์
    $itemsPerColumn = ceil(count($itemArray) / $numColumns); // จำนวนรายการต่อคอลัมน์
    $isHiddenValue = ($foundUser == 1) ? $defaultValue : '';

    if (count($itemArray) > $itemsPerColumn) {
        $itemChunks = array_chunk($itemArray, $itemsPerColumn);

        foreach ($itemChunks as $columnIndex => $columnItems) {
            $resultHTML .= '<div class="col">';
            foreach ($columnItems as $itemIndex => $item) {
                if ($defaultValue == "$item") {
                    $isHiddenValue = '';
                }
                $isChecked = ($foundUser == 1 && $defaultValue == "$item") ? 'checked' : '';
                $index = ($columnIndex * $itemsPerColumn) + $itemIndex;
                $resultHTML .= '
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="' . $itemName . '[]" value="' . $item . '" id="' . $itemName . "-" . ($index + 1) . '" ' . $isChecked . '>
                <label class="form-check-label" for="' . $itemName . "-" . ($index + 1) . '">
                        ' . $item . '
                    </label>
                </div>';
            }
            $resultHTML .= '</div>';
        }
    } else {
        foreach ($itemArray as $index => $item) {
            if ($defaultValue == "$item") {
                $isHiddenValue = '';
            }
            $isChecked = ($foundUser == 1 && $defaultValue == "$item") ? 'checked' : '';
            $resultHTML .= '
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="' . $itemName . '[]" value="' . $item . '" id="' . $itemName . "-" . ($index + 1) . '" ' . $isChecked . '>
            <label class="form-check-label" for="' . $itemName . "-" . ($index + 1) . '">
                    ' . $item . '
                </label>
            </div>';
        }
    }
    $formHTML = '
    <div class="form-control mb-3">
        <p>' . $itemHead . '</p>
        <div class="row">
            ' . $resultHTML . '
        </div>
        <input type="text" class="form-control mt-3" id="' . $itemName . 'Input" name="' . $itemName . 'Input" placeholder="อื่น ๆ โปรดระบุ" value="' . $isHiddenValue . '">
        <div class="alert alert-danger mt-3" id="emptyAlert-' . $itemName . '">
            ' . $alertText . '
        </div>
    </div>
    ';

    return $formHTML;
}
