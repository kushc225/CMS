<?php

if (!file_exists("conn/conn.php")) {
    header("Location: system64_setup.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'conn/conn.php';
    $e_no = mysqli_real_escape_string($conn, $_POST['e_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM `user_table` WHERE `e_no`='$e_no' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['e_no'] = $row['e_no'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['f_name'];

            header("Location:index.php");
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Invalid Enrollment Number and Password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
    <title>Login</title>

    <style>
    * {
        padding: 0;
        margin: 0;
    }

    #main {
        position: absolute;
        width: 668px;
        height: 100%;
        background-color: #0d6efd;
    }

    .col-4 {
        height: 400px;
    }

    .main2 {
        overflow: hidden;
        border-radius: 30px;
        position: fixed;
        width: 600px;
        background-color: rgb(255, 255, 255);
        height: 400px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: -16px 15px 23px 6px rgba(0, 0, 0, 0.58);
        -webkit-box-shadow: -16px 15px 23px 6px rgba(0, 0, 0, 0.58);
        -moz-box-shadow: -16px 15px 23px 6px rgba(0, 0, 0, 0.58);
    }

    .col-4 {
        color: white;
        background-color: #0d6efd;
        border-radius: none;
    }

    i::before {
        font-size: 115px;
        width: 35%;
        display: block;
        margin: auto;
        margin-top: 50px;
    }

    .change-text-design {
        color: #0d6efd;
        font-size: 30px;
        font-family: 'Rampart One', cursive;
    }

    h1 {
        margin-left: 26px;
    }

    .form-control {
        border: 0;
        border-bottom: 2px solid #0d6efd;
        background-color: white;
    }

    .form-control:focus {
        border-bottom: 2px solid #0d6efd;
        outline: 0;
    }

    input {
        border-bottom: 2px solid #0d6efd;
    }

    .mb-3 {
        border: none;
        margin-top: 40px;
        border-radius: 3px;
    }

    .btn {
        width: 100%;
        background-color: white;
        border: 2px solid #0d6efd;
        color: #0d6efd;
        border-radius: 65px;
    }

    .msg {
        display: inline-block;
        margin: 0 40px;
        width: 100vh;
    }

    a {
        color: #DC714C;
    }

    .btn:hover {
        color: white;
        background-color: #0d6efd;
        border: 1px solid #0d6efd;
        padding: 7px;
        transition: .3s all;
    }

    .center1 {
        margin-left: 30%;
    }

    .text-dark {
        font-weight: bold;
        font-size: 30px;
    }

    @media screen and (max-width: 992px) {
        .main2 {
            margin: auto 1%;
        }

        #main {
            background-color: #ffffff;
        }

        i {
            width: 69%;
        }

        .msg {
            margin: 0 20px;
        }
    }

    @media screen and (max-width: 585px) {
        html {
            font-size: 15px;
        }

        body {
            background-color: rgb(193, 193, 193);
        }

        #main {
            position: absolute;
            width: 0;
            height: 0;
            background-color: rgb(193, 193, 193);
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .main2 {
            display: block;
            margin: auto;
            width: 84%;
        }

        .col-4 {
            display: none;
        }

        .msg {
            margin-left: -21px;
            width: 100vh;
        }
    }

    @media screen and (max-width: 383px) {
        html {
            font-size: 13px;
        }

        #main {
            position: absolute;
            width: 0;
            height: 0;
            background-color: rgb(193, 193, 193);
        }

        h1 {
            color: #fff;
        }

        .main2 {
            width: 100%;
            color: rgb(0, 0, 0);
        }

        .msg {
            margin: auto;
            width: 100%;
        }
    }
    </style>
</head>

<body>

    <!-- open Modal for Forget Password  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #0d6efd;" id="exampleModalLabel">Forget Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="email" class="form-lable" style="color: #0d6efd;">Enter Your Valid E-mail Id.</label>
                    <input type="email" class="form-control shadow-none" id="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="sendMail" data-bs-dismiss="modal" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>



    <div id="main">
        <div class="container main2">
            <div class="makeCenter">
                <div id="showAlert"></div>
                <div class="row">
                    <div class="col-4">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="col-8">
                        <div class=" text-center change-text-design my-3">
                            Log In
                        </div>
                        <form action="login.php" id="prospects_form" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control shadow-none" name="e_no" id="e_no"
                                    placeholder="Enrollment No" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control shadow-none" name="password"
                                    placeholder="Password" id="password">
                            </div>
                            <button type="submit" id="login" class="btn btn-primary align-center my-3">Submit</button>
                            <div class="msg my-3">
                                <div class="forgot-password ">
                                    <a href="#" data-bs-toggle="modal" style="color: #0ab3ff;"
                                        data-bs-target="#exampleModal">Recover
                                        Password?</a>
                                </div>
                                <div class="my-2">
                                    <span>Don't have an account? <a href="#" style="color: #0d6efd;">Register Now !</a>
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
setInterval(() => {
    password
    let base = 668;
    let getPixel = 0;
    const mainScreenWidth = 1536;
    let currentScreenWidth = window.innerWidth;

    if (mainScreenWidth < currentScreenWidth) {
        getPixel = (currentScreenWidth - mainScreenWidth) / 2;
        getPixel += base;
    } else {
        getPixel = (mainScreenWidth - currentScreenWidth) / 2;
        getPixel -= base;
        getPixel = Math.abs(getPixel);
    }
    document.getElementById("main").style.width = getPixel + "px";
}, 1);

$("#sendMail").on('click', function() {
    let email = $("#email").val();
    $.ajax({
        url: 'php/forget/forget-pass.php',
        type: 'POST',
        data: {
            email: email
        },
        success: function(data) {
            if (data == 1) {
                $("#showAlert").html(data);
            } else {
                $("#showAlert").html(data);
            }
        }
    })
})
</script>

</html>