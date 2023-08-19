function createInputForm(nameText, nameInput, nameContainer) {
  const formContainer = document.getElementById(nameContainer);

  const div = document.createElement("div");
  div.className = "input-group mb-3";
  div.id = `div-${nameInput}`;

  const label = document.createElement("label");
  label.textContent = `${nameText} : `;
  label.className = "input-group-text";
  div.appendChild(label);

  const input = document.createElement("input");
  input.type = "text";
  input.name = `${nameInput}[]`;
  input.className = "form-control";
  input.id = `${nameInput}`;

  div.appendChild(input);

  const deleteButton = document.createElement("a");
  deleteButton.href = "#";
  deleteButton.className = "btn btn-primary";
  deleteButton.textContent = "ลบ";
  deleteButton.addEventListener("click", function () {
    div.remove();
  });

  div.appendChild(deleteButton);

  formContainer.appendChild(div);
}
