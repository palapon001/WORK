<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<div class="container mt-5">
    <div class="alert alert-danger"  id="emptyAlert">
        กรุณากรอกข้อมูลให้ครบถ้วน
    </div>
    <form>
        <div class="form-group">
            <label for="inputValue1">กรอกข้อมูล 1:</label>
            <input type="text" class="form-control" id="inputValue1">
        </div>
        <div class="form-group">
            <label for="inputValue2">กรอกข้อมูล 2:</label>
            <input type="text" class="form-control" id="inputValue2">
        </div>
        <div class="form-group">
            <label for="inputValue3">กรอกข้อมูล 3:</label>
            <input type="text" class="form-control" id="inputValue3">
        </div>
        
        <div class="form-check">
            <input type="radio" class="form-check-input" name="radioOption" id="radioOption1" value="option1">
            <label class="form-check-label" for="radioOption1">ตัวเลือกที่ 1</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="radioOption" id="radioOption2" value="option2">
            <label class="form-check-label" for="radioOption2">ตัวเลือกที่ 2</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="radioOption" id="radioOption3" value="option3">
            <label class="form-check-label" for="radioOption3">ตัวเลือกที่ 3</label>
        </div>
        
        <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $(".form-control, .form-check-label").on("input", function() {
            var inputValue1 = $("#inputValue1").val();
            var inputValue2 = $("#inputValue2").val();
            var inputValue3 = $("#inputValue3").val();
            var radioValue = $("input[name='radioOption']:checked").val();
            
            if (
                inputValue1.trim() === "" ||
                inputValue2.trim() === "" ||
                inputValue3.trim() === "" ||
                !radioValue
            ) {
                $("#emptyAlert").show();
            } else {
                $("#emptyAlert").hide();
                // ดำเนินการตามที่คุณต้องการหลังจากที่ผู้ใช้กรอกข้อมูลถูกต้องและเลือก radio option แล้ว
            }
        });
        
        $("input[name='radioOption']").change(function () {
            $("#emptyAlert").hide();
        });
    });
</script>
