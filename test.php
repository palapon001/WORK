<!DOCTYPE html>
<html>
<head>
    <title>ตัวอย่างช่องค้นหาใน &lt;select&gt;</title>
    <script>
        function filterOptions() {
            var input, filter, select, option, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            select = document.getElementById("fruits");
            option = select.getElementsByTagName("option");

            for (i = 0; i < option.length; i++) {
                txtValue = option[i].textContent || option[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<body>

<label for="searchInput">ค้นหาผลไม้: </label>
<input type="text" id="searchInput" onkeyup="filterOptions()" placeholder="ค้นหาผลไม้...">

<label for="fruits">เลือกผลไม้: </label>
<select id="fruits">
    <option value="apple">แอปเปิ้ล</option>
    <option value="banana">กล้วย</option>
    <option value="orange">ส้ม</option>
    <option value="grape">องุ่น</option>
    <option value="kiwi">กีวี</option>
</select>

</body>
</html>
