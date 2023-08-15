<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Input Form with Delete Button</title>
</head>
<body>
    <button id="createFormButton">สร้าง Input Form</button>
    <div id="formContainer"></div>

    <script>
        let formCount = 0;

        document.getElementById("createFormButton").addEventListener("click", function() {
            createInputForm();
        });

        function createInputForm() {
            formCount++;

            const formContainer = document.getElementById("formContainer");

            const form = document.createElement("form");
            form.id = `inputForm-${formCount}`;

            const label = document.createElement("label");
            label.textContent = `ฟอร์มที่ ${formCount}: `;
            form.appendChild(label);

            const input = document.createElement("input");
            input.type = "text";
            input.name = `inputField-${formCount}`;
            form.appendChild(input);

            const deleteButton = document.createElement("button");
            deleteButton.textContent = "ลบ";
            deleteButton.addEventListener("click", function() {
                formContainer.removeChild(form);
            });
            form.appendChild(deleteButton);

            formContainer.appendChild(form);
        }
    </script>
</body>
</html>
