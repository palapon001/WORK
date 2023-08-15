let formCount = 0;
function createInputForm() {
  const resInput = document.getElementById('resInput');
  formCount++;

  const formContainer = document.getElementById("formContainer");

   const div = document.createElement("div");
  div.className = 'input-group mb-3';

  const label = document.createElement("label");
  label.textContent = `งานวิจัยที่ ${formCount}: `;
  label.className = 'input-group-text' ;
  div.appendChild(label);

  const input = document.createElement("input");
  input.type = "text";
  input.name = `res[]`;
  input.className = "form-control";

  div.appendChild(input);

  const deleteButton = document.createElement("a");
  deleteButton.href = "#";
  deleteButton.className = "btn btn-primary" ;
  deleteButton.textContent = "ลบ";
  deleteButton.addEventListener("click", function () {
    div.removeChild(label);
    div.removeChild(input);
    div.removeChild(deleteButton);
    div.remove();
    formCount--;
  });

  div.appendChild(deleteButton);

  formContainer.appendChild(div);
}
