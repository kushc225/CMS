
<?php 
session_start();
if(!isset($_SESSION['role'])){
if($_SESSION['role']=="3"){
        header("Location: ../login.php");
}
header("Location: ../login.php");
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Add Departemnt</title>
  </head>
  <body>

<!-- Modal  -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
        <button type="button" class="btn-close bt" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <input type="text" class="form-control" placeholder="Add Department Name" id="newDepartment">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bt" data-bs-dismiss="modal">Close</button>
        <button type="button" id="insertData" data-bs-dismiss="modal" class="btn btn-primary bt">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- click on (add Defalult complaint) Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <input type="text" value="" class="form-control" id="defaultComplaint" placeholder="Add Default Complaint">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="submitDefault" data-bs-dismiss="modal" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>



      <div class="container my-5">
     <?php if($_SESSION['role']=='1'){ ?>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal4" class="btn btn-dark text-light">Add Department</button>
        <?php } ?>
                <div id="tableData">
                </div>    
                <div class="my-4" id="showDefaultValue">

                </div>      
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
  <script>
// loadTable
    function loadTable(){
        $.ajax({
            url:'dep/show-data.php',
            type:'POST',
            success:function(data){
                $("#tableData").html(data);
            }
        })
    }
    loadTable();
// Insert New DepartMent
$("#insertData").on("click",function(){
  let newDepart=$("#newDepartment").val();
  // $("#newDepartment").val("");
  $.ajax({
    // url:'dep/insert-data.php',
    url:'dep/add-department-data.php',

    type:'POST',
    data:{newDepart:newDepart},
    success:function(data){
      loadTable();
      // alert(data);
    }
  })
    
})


let d_id="";

// Add Default open Modal
 $(document).on('click','.addDefault',function(){
     d_id=$(this).data("aid");
})


  $("#submitDefault").on('click',function(){
    let defaultComplaint=$("#defaultComplaint").val();
    // alert(d_id+defaultComplaint);
    $.ajax({
      url:'dep/add-default-com.php',
      type:'POST',
      data:{
        d_id:d_id,
        defaultCom:defaultComplaint
      },success:function(data){

      }
    })
    })



// Load Default Data
    $(document).on("click",".showDefalutComplaintList",function(){
      let d_id=$(this).data("sid");
      // let dep_name=
      // alert(d_id);
      $.ajax({
        url:'dep/show-default-complaint.php',
        type:'POST',
        data:{d_id:d_id},
        success:function(data){
          $("#showDefaultValue").html(data);
        }
      })

    })

// Delete Default Data
    $(document).on("click",".del",function(){
      let sno=$(this).data("did");
      $.ajax({
        url:'default/del.php',
        type:'POST',
        data:{sno:sno},
        success:function(data){
          location.reload();
        }
      })
     
    });

// Delete Department 
$(document).on("click",".del_dep",function(e){
       let sno=$(this).data("del_dep");
       let d_id=$(this).data("default_id");
      //  alert(sno+" "+d_id);
      $.ajax({
        url:'dep/del-department.php',
        type:'POST',
        data:{sno:sno,d_id:d_id},
        success:function(data){
          // alert(data);
          // loadTable();
          location.reload();
        }
      })
    
     
    });




  </script>
</html>