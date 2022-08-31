<?php 
    require '../conn/conn.php';


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Show Data</title>
    <style>
        #showPage{
            height: 100px;
            overflow: scroll;
        }
    </style>
  </head>
  <body>
      <div id="showData"></div>
      <div id="showPage"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
         let limit = 10;
        function getData(){
           
            let pageNumber = 1;

            $.ajax({
                url: 'fetch-data.php',
                type:'POST',
                data:{limit:limit,pageNumber:pageNumber},
                success:function(data){
                    $("#showData").html(data);
                }
            })
        }
        getData();
        
        function fetchPagination(){
            $.ajax({
                url: 'fetch-page.php',
                type:'POST',
                data:{limit:limit},
                success:function(data){
                    $("#showPage").html(data);
                }
            })
        }
        fetchPagination();

        $(document).on('click','.page',function(){
            let getId = $(this).attr('id');
            console.log(getId);
            let pageNumber = Number(getId);
            $.ajax({
                url: 'fetch-data.php',
                type:'POST',
                data:{limit:limit,pageNumber:pageNumber},
                success:function(data){
                    $("#showData").html(data);
                }
            })

        })
    </script>
  </body>
</html>