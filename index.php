<?php
if (!file_exists("conn/conn.php")) {
    header("Location: system64_setup.php");
}
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: http://index/com/login.php");
}
include('includes/header.php');
include('includes/navbar.php');


function getPage()
{
    require 'conn/conn.php';
    $sql = "SELECT * FROM complaint";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $ans = ceil($num / $limit);
    return  $ans;
}
?>
<!-- style for pagination classes  -->
<style>
.box1 {
    display: flex;
    justify-content: center;

}

.smallBox {
    background-color: white;
    padding: 10px;

    border-radius: 50px;
    background: #ffffff;
    box-shadow: -20px 20px 60px #d9d9d9,
        20px -20px 60px #ffffff;

}

.sameP {
    border: none;
    background: none;
    color: #124bff;
    font-size: 20px;
}

.nextPrevBtn:hover {
    background: aqua;
    color: #fff;
    transition: 0.5s;
    border-radius: 5px;

}

.current {
    background: aqua;
    border-radius: 50%;
    font-size: 20px;
    color: white;
    font-weight: bold;
}


/* css for displaying table  of complaint or student list  */

.mainContainer {
    width: 100%;
}


/* css for table to show all the data  */

.tableClass {
    border-radius: 36px;
    background: linear-gradient(145deg, #f0f0f0, #cacaca);
    box-shadow: 7px 7px 24px #5a5a5a,
        -7px -7px 24px #ffffff;
}
</style>

<!-- style for pagination classes  -->



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> n</div> -->
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <h4>Total Complaint:
                                    <?php
                                    require 'conn/conn.php';
                                    $sql = "SELECT * FROM `complaint`";
                                    $result =  mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                    ?>

                                </h4>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'conn/conn.php';
                                $sql = "SELECT * FROM `complaint` WHERE `status` = 'Pending'";
                                $result =  mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                echo $num;
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rejected</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        require 'conn/conn.php';
                                        $sql = "SELECT * FROM `complaint` WHERE `status` = 'Rejected'";
                                        $result =  mysqli_query($conn, $sql);
                                        $num = mysqli_num_rows($result);
                                        echo $num;
                                        ?>


                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Resolved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'conn/conn.php';
                                $sql = "SELECT * FROM `complaint` WHERE `status` = 'Resolved'";
                                $result =  mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                echo $num;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


    <!-- ModalBox for Editing fill Modal Box -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="editUserProfile" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" data-bs-dismiss="modal" id="updateUserInformation"
                        class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- ModalBox for Insert Data  -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalData" class="modal-body">
                    <label for="e_no" class="form-label ">Enrollment Number</label>
                    <input type="text" class="form-control" id="e_no">
                    <br>
                    <label for="f_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="f_name">
                    <br>
                    <label for="l_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="l_name">
                    <br>
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" class="form-select">
                        <option value="M" selected>Male</option>
                        <option value="F">Female</option>
                    </select>
                    <br>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email">
                    <br>
                    <label for="dep" class="form-label">Department</label>
                    <select class="form-select" name="" id="dep">
                        <?php
                        require 'conn/conn.php';
                        $sql = "SELECT * FROM department";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value=' . $row['dep_name'] . '>' . $row['dep_name'] . '</option>';
                        ?>

                        <?php
                            }
                        }
                        ?>
                    </select>
                    <!-- <option value="student" selected>Student</option>
              <option value="staff">Staff</option>
              <option value="admin">Admin</option> -->

                    </select>
                    <br>
                    <label for="mobile_no" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_no">
                    <br>
                    <label for="pass" class="form-label">Password</label>
                    <input type="text" class="form-control" id="pass">
                    <br>
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address">


                    <label for="#role" class="form-label">Role</label>
                    <select id="role" class="form-select">
                        <option value="1">Admin</option>
                        <option value="2" selected>Department</option>
                        <option value="3">Student</option>
                        <option value="4">Helping Staff</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" data-bs-dismiss="modal" id="submitData" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>

    </div>



    <!-- complaint Model Open onclick [openComplaintBox With Default Complaint] -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register Your Complaint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="fillComplaintType">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="registerComplaint" data-bs-dismiss="modal"
                        class="btn btn-primary">Register Complain</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal box for Edit Complaint by the Admin only-->
    <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Complaint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editUserComplaint">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveAdminOverUserChanges" data-bs-dismiss="modal"
                        class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal for forwording complaint  -->
    <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward Complaint </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="forwardComplaint">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="sendMailToSF" data-bs-dismiss="modal"
                        class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>


    <?php
    if ($_SESSION['role'] == 1) {
    ?>
    <div class="container mainContainer">
        <div id="showAlert"></div>
        <select class="form-select w-25" style="display: inline;" id="filterResult" onchange="checkFilter()"
            style="margin-left: 20px;">
            <option value="all" selected>All</option>
            <option value="pending">Pending</option>
            <option value="resolved">Resolved</option>
            <option value="rejected">Rejected</option>
        </select>

        <select class="form-select w-25" style="display: none;" id="filterResult1" onchange="fun()"
            style="margin-left: 20px;">
            <option value="all" selected>All</option>
            <option value="1">Admin</option>
            <option value="2">Department</option>
            <option value="3">Student</option>
            <option value="4">Supporting Staff</option>
        </select>
        <div class="d-inline text-black mx-5">
            <label for="limit">Limit</label>
            <input type="number" min="1" id="limit" value="2">
        </div>
        <div class="showData my-3 d-flex justify-content-flex" id="showTable"></div>
        <div class="serialDelBtn">
            <div class="my-4 d-block " id="delelteAllCheckedRecord"><button class="btn text-white"
                    style="background:#124bff;">Del</button></div>
        </div>
        <div class="showData d-flex justify-content-flex" id="showPagination"></div>
    </div>
    <?php  } ?>
    <?php
    if ($_SESSION['role'] == 2) {
    ?>
    <div class="container-fluid">
        <a href="php/add-department.php" id="addUser" class="my-3 btn btn-success">Department Setting</a>
    </div>
    <?php  } ?>

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>




    <script>
    let limit = $("#limit").val();
    $("#limit").change(function() {
        limit = $("#limit").val();
        pageNumber = 1;
        FCpageNumber = 1;
        searchPageNumber = 1;
        userPageNumber = 1;
        allComplaint();
    });

    //                          ADMIN WORK ONLY, (OVER THE USERS)
    // loadTable
    function loadTable() {
        $.ajax({
            url: 'php/show-data.php',
            type: 'POST',
            success: function(data) {
                if (data == 0) {
                    alert("no data found");
                } else {
                    checkFilter1();
                }
            }

        })
    }



    //                                        EDIT USER INFORMATION 


    $(document).on('click', '.edit', function() {
        let getSno = $(this).data("eid");
        console.log(getSno);
        $.ajax({
            url: 'php/fill-model-box.php',
            type: 'POST',
            data: {
                getSno: getSno
            },
            success: function(data) {
                if (data == 0) {
                    alert("Sorry ");
                } else {
                    $("#editUserProfile").html(data);
                }
            }

        })

    })

    //        SUBMITTING UPDATED USER INFORMATION
    $('#updateUserInformation').on("click", function() {
        let sno = $("#sno").val();
        let e_no = $("#e_no").val();
        let f_name = $("#f_name").val();
        let l_name = $("#l_name").val();
        let gender = $("#gender").val();
        let mobile_no = $("#mobile_no").val();
        let email = $("#email").val();
        let role = $("#role").val();
        let dep = $("#dep").val();
        let address = $("#address").val();

        $.ajax({
            url: 'php/update-user-information.php',
            type: 'POST',
            data: {
                sno: sno,
                e_no: e_no,
                f_name: f_name,
                l_name: l_name,
                gender: gender,
                mobile_no: mobile_no,
                role: role,
                dep: dep,
                email: email,
                address: address
            },
            success: function(data) {
                fun();
                $("#showAlert").html(data);
            }
        })
    })

    //                        DELETE USER 
    $(document).on('click', '.del', function() {
        let sno = $(this).data("did");
        console.log(sno);
        $.ajax({
            url: 'php/del-user.php',
            type: 'POST',
            data: {
                sno: sno
            },
            success: function(data) {
                $("#showAlert").html(data);
                fun();
            }
        })

    })


    // Insert Data
    $("#submitData").on('click', function() {
        let e_no = $("#e_no").val();
        let f_name = $("#f_name").val();
        let l_name = $("#l_name").val();
        let gender = $("#gender").val();
        let mobile_no = $("#mobile_no").val();
        let email = $("#email").val();
        let role = $("#role").val();
        let dep = $("#dep").val();
        let address = $("#address").val();
        let pass = $("#pass").val();
        // alert(+e_no+" "+" "+f_name+" "+" "+l_name+" "+" "+gender+" "+" "+mobile_no+" "+" "+email+" "+" "+role+" "+" "+dep+" "+address+" "+pass);
        $.ajax({
            url: 'php/insert-data.php',
            type: 'POST',
            data: {
                e_no: e_no,
                f_name: f_name,
                l_name: l_name,
                gender: gender,
                mobile_no: mobile_no,
                role: role,
                dep: dep,
                email: email,
                address: address,
                pass: pass
            },
            success: function(data) {
                if (data == 1) {
                    loadTable();
                } else {
                    alert("Please Choose Correct Registration or Mobile Number");
                }
            }
        })

    })


    // Open Complaint Modal
    $(document).on("click", ".openComplaintBox", function() {
        let d_id = $(this).data("d_id");
        $.ajax({
            url: 'com-modal-data.php',
            type: 'POST',
            data: {
                d_id: d_id
            },
            success: function(data) {}
        })
    })




    //                              DEPARTMENT WORK


    let getComplaintType = "";
    let getTotalNumberOfDefaultOption = "";
    // Show Complains Option
    $(document).on('click', '.showComOption', function() {
        let d_id = $(this).data("d_id");
        getComplaintType = d_id;
        // alert(d_id);
        $.ajax({
            url: 'php/get-default-option.php',
            type: 'POST',
            data: {
                d_id: d_id
            },
            success: function(data) {
                $("#fillComplaintType").html(data);
                getTotalNumberOfDefaultOption = $("#getTotalNumberOfDefaultOption").val();
            }
        })
    })


    //                                      USER WORK 

    // Register Complaint

    $("#registerComplaint").on("click", function() {
        let userAllComplaintMerged = "";
        for (let i = 1; i <= getTotalNumberOfDefaultOption; i++) {

            if ($("#c" + i).is(':checked')) {
                userAllComplaintMerged += $("#c-" + i).val();
            }
        }
        if ($("#ss").is(':checked')) {
            userAllComplaintMerged += $("#userText").val();
        }
        //  alert(userAllComplaintMerged+" "+getComplaintType);
        $.ajax({
            url: 'php/complaint/save-complaint.php',
            type: 'POST',
            data: {
                userAllComplaintMerged: userAllComplaintMerged,
                getComplaintType: getComplaintType
            },
        })
        allComplaint();
    });



    //                ADMIN  ABOUT Complaint ----



    // Show All Complaint To the Users
    $("#showAllComplaint").on('click', function() {
        document.getElementById("filterResult1").style.display = "none";
        document.getElementById("filterResult").style.display = "inline";
        allComplaint()
    })





    // Edit Complaint By Admin
    $(document).on('click', '.editUserCom', function() {
        let edituserid = $(this).data("edituserid");
        // alert(edituserid);
        $.ajax({
            url: 'php/complaint/edit-complaint.php',
            type: 'POST',
            data: {
                edituserid: edituserid
            },
            success: function(data) {
                $("#editUserComplaint").html(data);
            }

        })

    })

    let editUserCom = "";
    let c_id = "";

    $(document).on("click", ".editUserCom", function() {
        editUserCom = $(this).data("edituserid");
        c_id = $(this).data("cid");
    })

    $("#saveAdminOverUserChanges").on('click', function() {
        let changeStatus = $("#changeStatus").val();

        let reasonForRejection = "";
        if (changeStatus == 'Rejected') {
            reasonForRejection = window.prompt("Kindly Provide The Reason of Rejection...!");
            if (reasonForRejection) {
                $.ajax({
                    url: 'php/complaint/rejected-complaint.php',
                    type: 'POST',
                    data: {
                        c_id: c_id,
                        reasonForRejection: reasonForRejection
                    },
                    success: function(data) {

                    }
                })
                $.ajax({
                    url: 'php/complaint/save-edited-complaint.php',
                    type: 'POST',
                    data: {
                        changeStatus: changeStatus,
                        sno: editUserCom
                    },
                    success: function(data) {
                        allComplaint();
                    }
                })

            }
        } else {
            $.ajax({
                url: 'php/complaint/save-edited-complaint.php',
                type: 'POST',
                data: {
                    changeStatus: changeStatus,
                    sno: editUserCom
                },
                success: function(data) {
                    allComplaint();
                }
            })

        }
        // alert(changeStatus);
    })

    function checkFilter1() {
        let filter = $("#filterResult1").val();
        // alert(filter);
        $.ajax({
            url: 'php/filter/filter-users.php',
            type: 'POST',
            data: {
                filter: filter
            },
            success: function(data) {
                $("#showTable").html(data);
            }
        });
    }


    //                        FORWARD COMPLAINT TO SUPPORT STAFF:    
    let comCate = "";
    let comId = "";
    $(document).on("click", ".assignTo", function() {
        comCate = $(this).data("comtype");
        comId = $(this).data("comid");
        //  console.log(comId);
        $.ajax({
            url: 'php/complaint/forword-complaint.php',
            type: 'POST',
            data: {
                comCate: comCate
            },
            success: function(data) {
                $("#forwardComplaint").html(data);
            }
        })
        // console.log(comCate)
    })

    //  Send Mail
    $("#sendMailToSF").on("click", function() {
        let e_no = $("#selectedPerson").val();
        // console.log(e_no);
        if (e_no === undefined) {
            alert("No Person is selected Yet...!");
        } else {
            $.ajax({
                url: 'php/send-mail/sendmail.php',
                type: 'POST',
                data: {
                    e_no: e_no,
                    comId: comId
                },
                success: function(data) {
                    $("#showAlert").html(data);
                }
            })

        }
    });

    //          show Forwarded Compliant
    let FCPageNumber = 1;

    $(document).on('click', "#showForwardedComplaintBtn", function() {
        FCPageNumber = 1;
        showForwardedComplaintList();
    })


    function showForwardedComplaintList() {
        limit = $("#limit").val();
        $.ajax({
            url: 'php/complaint/forward/forwarded-com-list.php',
            type: 'POST',
            data: {
                limit: limit,
                FCPageNumber: FCPageNumber
            },
            success: function(data) {
                $("#showTable").html(data);
            }
        })
        forwardedComplaintPagination();
    }

    function forwardedComplaintPagination() {
        limit = $("#limit").val();

        $.ajax({
            url: 'php/complaint/forward/forward-com-page.php',
            type: 'post',
            data: {
                limit: limit,
                FCPageNumber: FCPageNumber
            },
            success: function(data) {
                $("#showPagination").html(data);
            }
        })
    }

    function FCPrevAndNext(val) {
        if (val == '-1') {
            FCPageNumber--;
            if (FCPageNumber == 0) {
                FCPageNumber++;
                return;
            }
        } else {
            FCPageNumber++;
            let FCClickPoint = $(".FCClickPoint").val();
            if (FCPageNumber > FCClickPoint) {
                FCPageNumber--;
                return;
            }
        }
        showForwardedComplaintList()
    }


    $(document).on("click", ".FC", function() {
        FCPageNumber = $(this).attr('id');
        showForwardedComplaintList();
    })





    //            SEARCH FOR COMPLAINT OR USER
    //                       for all user      -> 1
    //                       for all complaint -> 2
    let searchFor = 2;
    let searchTerm = "";
    let searchPageNumber = 1;
    let selectOption = "all";

    function searchedResult() {
        selectOption = $("#filterResult").val();
        searchTerm = $("#searchTerm").val();
        $.ajax({
            url: 'php/search/searching.php',
            type: 'POST',
            data: {
                searchFor,
                searchTerm,
                searchPageNumber,
                limit,
                selectOption
            },
            success: function(data) {
                $("#showTable").html(data);
            }
        })
        searchedPagination();
    }



    $("#searchTerm").keyup(function() {
        console.log("keyup");
        searchPageNumber = 1;
        searchedResult();
    });


    $(document).on('click', '.searchPage', function() {
        searchPageNumber = $(this).attr('id');
        searchedResult();
    })

    function searchedPagination() {
        limit = $("#limit").val();
        $.ajax({
            url: 'php/search/search-page.php',
            type: 'POST',
            data: {
                searchTerm,
                searchFor,
                searchPageNumber,
                limit
            },
            success: function(data) {
                $("#showPagination").html(data);
            }
        })
    }

    $(document).on("click", '.searchPrevPage', function() {
        console.log("prev");
        searchPageNumber--;
        if (searchPageNumber == 0) {
            searchPageNumber = 1;
            return;
        }
        searchedResult();
    })
    $(document).on("click", '.searchNextPage', function() {
        console.log("next");
        searchPageNumber++;
        let searchedPageId = $("#searchedPageId").val();
        if (searchedPageId == searchPageNumber) {
            searchedPageId--;
            return;
        }
        searchedResult();
    })


    function check() {
        if (document.getElementById("userText").style.display == "none") {
            document.getElementById("userText").style.display = "inline-block";
        } else {
            document.getElementById("userText").style.display = "none";
        }
    }




    //                              Filter Complaint

    let pageNumber = 1;
    let status = "all";

    function checkFilter() {
        pageNumber = 1;
        status = $("#filterResult").val();
        allComplaint();

    }


    function allComplaint() {
        limit = $("#limit").val();
        // console.log(limit);

        searchFor = 2;
        $.ajax({
            url: 'php/complaint/pagination/fetch-data.php',
            type: 'post',
            data: {
                pageNumber: pageNumber,
                limit: limit,
                status: status
            },
            success: function(data) {
                $("#showTable").html(data);
            }
        })
        getAllPagination();
    }


    function getAllPagination() {
        $.ajax({
            url: 'php/complaint/pagination/fetch-page.php',
            type: 'POST',
            data: {
                pageNumber: pageNumber,
                limit: limit,
                status: status
            },
            success: function(data) {
                $("#showPagination").html(data);
            }
        })
    }

    $(document).on('click', '.page', function() {
        searchFor = 2;
        pageNumber = $(this).attr('id');
        allComplaint();

    })

    allComplaint();

    function prevAndNext(val) {
        searchFor = 2;
        if (val == '-1') {
            pageNumber--;
            if (pageNumber == 0) {
                pageNumber++;
                return;
            }
        } else {
            pageNumber++;
            let clickPoint = $(".userClickPoint").val();
            if (pageNumber > clickPoint) {
                pageNumber--;
                return;
            }
        }
        allComplaint();
    }


    //                      SHOW USER FILTER
    let userPageNumber = 1;
    let userType = 'all';

    $("#showUsersList").on("click", function() {
        searchFor = 1;
        document.getElementById("filterResult1").style.display = "inline";
        document.getElementById("filterResult").style.display = "none";
        getUserList();
    })

    function fun() {
        searchFor = 1;
        userPageNumber = 1;
        userType = $("#filterResult1").val();
        getUserList();
    }

    function getUserList() {
        limit = $("#limit").val();
        searchFor = 1;
        $.ajax({
            url: 'php/filter/filter-users.php',
            type: 'POST',
            data: {
                userPageNumber: userPageNumber,
                limit: limit,
                userType: userType
            },
            success: function(data) {
                $("#showTable").html(data);
            }
        })
        getUsersListPagination();
    }

    function getUsersListPagination() {
        limit = $("#limit").val();

        searchFor = 1;
        $.ajax({
            url: 'php/filter/filter-users-page.php',
            type: 'POST',
            data: {
                userPageNumber: userPageNumber,
                limit: limit,
                userType: userType
            },
            success: function(data) {
                $("#showPagination").html(data);
            }
        })
    }


    function userFilterPrevAndNext(val) {
        searchFor = 1;
        if (val == '-1') {
            userPageNumber--;
            if (userPageNumber == 0) {
                userPageNumber++;
                return;
            }
            getUserList();
        } else {
            let userClickPoint = $(".userClickPoint").val();
            // console.log(userClickPoint);
            userPageNumber++;
            if (userClickPoint < userPageNumber) {
                userPageNumber--;
                return;
            }
            getUserList();
        }
    }
    let arr = [];
    // $(document).on("click", ".deleteCheckedCB", function() {
    //     let sno = $(this).val();
    //     arr.push(sno);
    // })
    $(document).on("click", "#delelteAllCheckedRecord", function() {
        // $(":checkbox:checked").each(function(key) {
        //     let sno = $(this).val();
        //     // arr.push(sno)
        //     console.log(sno);
        // })
        // console.log(arr);

        $(":checkbox:checked").each(function(key) {
            console.log($(this).val());
        })

        // $.ajax({
        //     // url: '/com/php/complaint/del_SC.php',
        //     url: window.location.href + '/php/complaint/del_SC.php',
        //     type: 'POST',
        //     data: {
        //         arr
        //     },
        //     success: function(data) {
        //         // $("#showAlert").html(data);
        //         // alert(data);
        //         console.log(data);
        //     }
        // })
        arr = [];
        allComplaint();
    })
    $(document).on("click", ".userFilterPage", function() {
        userPageNumber = $(this).attr('id');
        getUserList();
    })
    </script>