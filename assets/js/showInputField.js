function showInputField(selectTextID,fieldID,InputID) {
    var selectElement = document.getElementById(selectTextID);
    var otherField = document.getElementById(fieldID);
    var otherInput = document.getElementById(InputID);

    if (selectElement.value === "other") {
      otherField.style.display = "block";
      otherInput.required = true;
    } else {
      otherField.style.display = "none";
      otherInput.required = false;
    }
  }