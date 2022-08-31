<?php 
  require '../conn/conn.php';
    if(isset($_REQUEST['addStudent'])){

      $f_name=mysqli_real_escape_string($conn,$_POST['f_name']);
      $l_name=mysqli_real_escape_string($conn,$_POST['l_name']);
      $gender=mysqli_real_escape_string($conn,$_POST['gender']);
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $mobile_no=mysqli_real_escape_string($conn,$_POST['mobileNo']);
      $address=mysqli_real_escape_string($conn,$_POST['address']);
      $e_no=mysqli_real_escape_string($conn,$_POST['eno']);
      $pass=mysqli_real_escape_string($conn,$_POST['password']);
      
      
      $sql="INSERT INTO `user_table` ( `f_name`, `l_name`, `gender`, `email`, `mobile_no`, `address`, `role`, `dep`, `dt`, `password`,`e_no`) VALUES ( '$f_name', '$l_name', '$gender', '$email', '$mobile_no', '$address', '3', '', current_timestamp(), '$pass','$e_no');";
      
      $result= mysqli_query($conn,$sql);
      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Student Added...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Failed To Add Student.
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Students </title>
</head>

<body>
  <form action="add-student.php" method="post">
  <div class="d-flex justify-content-center">
    <div class="container my-5 ">
        <div class="row">
            <div class="col-4">
                <label for="" class="form-lable">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="col-4">
                <label for="" class="form-lable">Last Name</label>
                <input type="text" name="l_name" class="form-control">
            </div>
        </div>

        <div class="row">
        <div class="col-4">
                <label for="" class="form-lable">Enrollment Number</label>
                <input type="text" name="eno" class="form-control">
            </div>
            <div class="col-4">
                <label for="" class="form-lable">Password</label>
                <input type="text" name="password" class="form-control">
            </div>
           
            
        </div>

        <div class="row">
            <div class="col-4">
                <label for="" class="form-lable">Mobile Number</label>
                <input type="text" name="mobileNo" class="form-control">
            </div>
            <div class="col-4">
                <label for="" class="form-lable">E-mail</label>
                <input type="text" name="email" class="form-control">
            </div>
           
        </div>

        <div class="row">
            <div class="col-4">
                <label for="" class="form-lable">Gender</label>
                <select name="gender" class="form-control">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="col-4">
                <label for="" class="form-lable">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
        </div>
        <button class="btn btn-dark my-5" name="addStudent" id="addStudent" >Add Student</button>
    </div>
    </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
      // function addStudent(){
        // let f_name = document.getElementById("f_name").value;
        // let l_name = document.getElementById("l_name").value;
        // let gender = document.getElementById("gender").value;
        // let email = document.getElementById("email").value;
        // let mobileNo = document.getElementById("mobileNo").value;
        // let address = document.getElementById("address").value;
        // let eno = document.getElementById("eno").value;
        // let password = document.getElementById("password").value;
      
        // $.ajax({
        //   url:'add-student.php',
        //   type:'POST',
        //   data:{
        //         f_name:f_name,
        //         l_name:l_name,
        //         gender:gender,
        //         email:email,
        //         mobileNo:mobileNo,
        //         address:address,
        //         eno:eno,
        //         password:password,            
        //   },
        //   success:function(data){
        //     $("#showAlert").html(data);
        //   }
        // })
      // console.log(f_name+" "+l_name+" "+gender+" "+email+" "+mobileNo+" "+address+" "+eno+" "+password);
      // }
    </script>

</body>

</html>