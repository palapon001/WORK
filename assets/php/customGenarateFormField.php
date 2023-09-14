<?php 
function customGenarateFormField($hname, $name)
{
    $nameInput = $name."Input" ;
    $id = "add-".$nameInput;
    $contain = "formContainer-".$nameInput;
    $customText = '';
    $customText .= <<<HTML
    <button type="button" class="btn btn-primary " id="$id" onclick="createInputForm('$hname','$name','$contain');" disabled>เพิ่มข้อมูล$hname</button>
    <div class="form-group mt-3" id="$contain">
    </div> 
    HTML;
    return $customText;
}
?>