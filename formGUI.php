<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Form GUI</title>
</head>

<body>
        



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add User
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
      <div class="modal-header " style="background-color: #FF850A;">
        <h5 class="modal-title text-white"  id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container my-2 mx-2">
                <div class="row">
                    <div class="col ">
                        <label for="" class="form-label ">First Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="" class="form-label ">Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="" class="form-label ">Father Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col ">
                        <label for="" class="form-label ">Enorllment Number</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col ">
                        <label for="" class="form-label ">Course</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="" class="form-label ">Semester</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col ">
                        <label for="" class="form-label ">E-mail</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="" class="form-label ">Phone Number</label>
                        <input type="text" class="form-control">
                    </div>
                </div>


                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn text-white" style="background-color: #FF850A;">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>