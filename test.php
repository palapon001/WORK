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
            <label for="inputValue">กรอกข้อมูล:</label>
            <input type="text" class="form-control" id="inputValue">
        </div>
        <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#inputValue").on("input", function () {
            var inputValue = $(this).val().trim();
            
            if (inputValue === "") {
                $("#emptyAlert").show();
            } else {
                $("#emptyAlert").hide();
            }
        });
    });
</script>
