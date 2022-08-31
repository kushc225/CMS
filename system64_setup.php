<?php

if (file_exists("conn/conn.php")) {
    header("Location: login.php");
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Form</title>
    <style>
    body {
        background: #8496de;
    }

    .heading {
        display: flex;
        justify-content: center;
        color: rgb(66, 44, 212);
    }

    .box {
        margin-top: 50px;
        width: 751px;
        border-radius: 36px;
        background: #425cc2;
        box-shadow: -18px -18px 36px #374ca1,
            18px 18px 36px #4d6ce3;
    }

    .logo {
        height: 40px;
        color: rgb(66, 44, 212);
    }

    .logo h4 {
        display: flex;
        justify-content: center;
    }

    .miniBox input {
        color: white;
    }

    .text-white {
        color: white;
    }
    </style>
</head>

<body>
    <div class="container my-3">

        <div id="showAlert"></div>
    </div>
    <div class="heading my-3 text-white">
        <h2>COMPLAINT MANAGEMENT SYSTEM</h2>
    </div>
    <div class="container box">
        <div class="logo text-white">
            <h4>CREATE ACCOUNT</h4>
        </div>
        <form>

            <div class="row">
                <div class="col-6">
                    <div class="miniBox">
                        <div class="mb-3">
                            <label for="f_name" class="text-white form-label"><i
                                    class="fa-solid fa-user text-white mx-2"></i>Enter First Name</label>
                            <input type="text" value="Kush Kumar" class="form-control text-dark" id="f_name"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="text-white form-label"><i
                                    class="fa-solid fa-building text-white mx-2"></i>Enter your Company
                                name</label>
                            <input type="text" value="noName" class="form-control text-dark " id="companyName">
                        </div>

                        <div class="mb-3">
                            <label for="databaseName" class="text-white form-label"><i
                                    class="fa-solid fa-database text-white mx-2"></i>Enter Database name</label>
                            <input type="text" value="acc" class="form-control text-dark" id="databaseName">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="miniBox">
                        <div class="mb-3">
                            <label for="l_name" class="text-white form-label"><i
                                    class="fa-solid fa-user text-white mx-2"></i>Enter Last Name </label>
                            <input type="text" value="Choudhary" class="form-control text-dark " id="l_name"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="text-white form-label"><i
                                    class="fa-brands fa-chrome text-white mx-2"></i>Enter Your URL</label>
                            <input type="text" value="localhost" class="form-control text-dark " id="url"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="databaseUsername" class="text-white form-label"><i
                                    class="fa-solid fa-user text-white mx-2"></i>Enter Database
                                Username</label>
                            <input type="text" value="root" class="form-control text-dark " id="databaseUsername"
                                aria-describedby="emailHelp">
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="miniBox">
                        <div class="mb-3">
                            <label for="databasePassword" class="text-white form-label"> <i
                                    class="fa-solid fa-lock text-white mx-2"></i>Enter Database
                                Password</label>
                            <input type="text" class="form-control text-dark " value="" id="databasePassword">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="text-white form-label"><i
                                    class="fa-solid fa-person-half-dress mx-2 text-white"></i></i>Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            <!-- <input type="text" value="localhost" class="form-control text-dark " id="gender"
                                aria-describedby="emailHelp"> -->
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="miniBox">
                        <div class="mb-3">
                            <label for="phoneNumber" class="text-white form-label"> <i
                                    class="fa-solid fa-phone text-white mx-2"></i>Enter your Phone
                                Number</label>
                            <input type="text" class="form-control text-dark " value="9608812837" id="phoneNumber">
                        </div>


                        <div class="mb-3">
                            <label for="databaseEmailId" class="text-white form-label">
                                <i class="fa-solid fa-envelope text-white mx-2"></i>Enter Your Email-id
                            </label>
                            <input type="text" class="form-control text-dark " value="kushc225@gmail.com"
                                id="databaseEmailId" aria-describedby="emailHelp">
                        </div>

                    </div>
                </div>
            </div>


        </form>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary mb-3 w-50 " onclick="submitSetupForm()">Submit</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    function submitSetupForm() {
        let f_name = $("#f_name").val();
        let l_name = $("#l_name").val();
        let gender = $("#gender").val();
        let url = $("#url").val();
        let companyName = $("#companyName").val();
        let databaseName = $("#databaseName").val();
        let databaseUsername = $("#databaseUsername").val();
        let phoneNumber = $("#phoneNumber").val();
        let databasePassword = $("#databasePassword").val();
        let databaseEmailId = $("#databaseEmailId").val();
        // console.log(username + " " + url + " " + companyName + " " + databaseName + " " + databaseUsername + " " +
        //     phoneNumber + " " + databasePassword + " " + databaseEmailId);

        $.ajax({
            url: "setup/setUp-ajax.php",
            type: "POST",
            data: {
                f_name,
                l_name,
                gender,
                url,
                companyName,
                databaseName,
                databaseUsername,
                phoneNumber,
                databasePassword,
                databaseEmailId
            },
            success: function(data) {
                // alert(data);
                // console.log(data);
                window.location.replace("http://localhost/index/com/login.php");
            }
        })
    }
    </script>

</body>

</html>