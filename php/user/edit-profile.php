<?php ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Edit Profile</title>
</head>

<body>
    <div id="showAlert"></div>
    <div class="container">
        <div id="loadTable">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
<script>
function loadTable() {
    let sno =
        $.ajax({
            url: 'get-user-data.php',
            type: 'POST',
            success: function(data) {
                $("#loadTable").html(data);
            }
        })
}
loadTable();
$(document).on("click", "#updateMyProfile", function() {
    // let e_no=$("#e_no").val();
    // let f_name=$("#f_name").val();
    // let l_name=$("#l_name").val();
    // let gender=$("#gender").val();
    // let mobile_no=$("#mobile_no").val();
    // let email=$("#email").val();
    // let password=$("#password").val();
    // let address=$("#address").val();

    $.ajax({
        url: 'update-user-profile.php',
        type: 'POST',
        data: {
            e_no: e_no,
            f_name: f_name,
            l_name: l_name,
            gender: gender,
            mobile_no: mobile_no,
            email: email,
            password: password,
            address: address
        },
        success: function(data) {
            $('#showAlert').html(data);
            loadTable();
        }
    })

})
</script>

</html>