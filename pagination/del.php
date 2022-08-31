<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
  </head>
  <style>
      #void{
          overflow:scroll;
          height: 100px;
      }
  </style>
  <body>
      <div class="container">
          <select type="text" id="inputValue" value="10" class="form-control">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
          </select>
          <button class="btn btn-primary" onclick="fun()" id="loadData">Click</button>
      </div>
      <div id="showData">

      </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </body>
  <script>
      let getId=1;
    $(document).on('click','.page',function(){
        let getId = $(this).attr("id");
        let limit = document.getElementById("inputValue").value;
        console.log(getId);
        $.ajax({
            url:"getData.php",
            type:"POST",
            data:{getId:getId,limit:limit},
            success:function(data){
                $("#showData").html(data);
            }
        })
    })
    function allContent(){
        console.log(getId);
        let limit = document.getElementById("inputValue").value;

        $.ajax({
            url:"getData.php",
            type:"POST",
            data:{getId:getId,limit:limit},
            success:function(data){
                $("#showData").html(data);
            }
        })
    }
    allContent();
    function fun(){
        let limit = document.getElementById("inputValue").value;
        console.log(limit);
        $.ajax({
            url:"getData.php",
            type:"POST",
            data:{getId:getId,limit:limit},
            success:function(data){
                $("#showData").html(data);
            }
        })
    }
   </script>
</html>

