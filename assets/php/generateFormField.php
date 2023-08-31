<?php
function generateFormField($name, $label, $placeholder, $isRequired, $showAlert = true, $value = "", $type = "text" , $custom = "")
{
    $fieldHTML = '';
    $alertId = "emptyAlert-" . $name;
    $alertMessage = "กรุณากรอก" . $label;
    $isRequiredAttr = $isRequired ? 'required' : '';

    if ($showAlert) {


        if ($type === "hidden") {
            $fieldHTML .= <<<HTML
            <input name="$name" type="hidden" value="$value">
HTML;
        } else {
            if (strlen($label) > 100) {
                $fieldHTML .= <<<HTML
                <div class="mb-3">
                    <p>$label</p>
                    <div class="input-group mb-3">
                        <input name="$name" type="$type" id="$name" class="form-control" $isRequiredAttr value="$value" placeholder="$placeholder" >
                    </div>
                    $custom
                    <div class="alert alert-danger mb-3" id="$alertId" style="display: none;">
                        $alertMessage
                    </div>
                </div>
HTML;
            } else {
                $fieldHTML .= <<<HTML
                <div class="input-group mb-3">
                    <span class="input-group-text">$label</span>
                    <input name="$name" type="$type" id="$name" class="form-control" $isRequiredAttr value="$value" placeholder="$placeholder" >
                </div>
                $custom
                <div class="alert alert-danger mb-3" id="$alertId" style="display: none;">
                    $alertMessage
                </div>
HTML;
            }
        }
    } else {
        if ($type === "hidden") {
            $fieldHTML .= <<<HTML
            <input name="$name" type="hidden" value="$value">
HTML;
        } else {
            if (strlen($label) > 100) {
                $fieldHTML .= <<<HTML
                <div class="mb-3">
                    <p>$label</p>
                    <div class="input-group mb-3">
                        <input name="$name" type="$type" id="$name" class="form-control" $isRequiredAttr value="$value" placeholder="$placeholder">
                    </div>
                </div>
HTML;
            } else {
                $fieldHTML .= <<<HTML
                <div class="input-group mb-3">
                    <span class="input-group-text">$label</span>
                    <input name="$name" type="$type" id="$name" class="form-control" $isRequiredAttr value="$value" placeholder="$placeholder" >
                </div>
HTML;
            }
        }
    }

    return $fieldHTML;
}

?>
