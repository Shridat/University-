<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true ){
header('Location:login.php');
exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
       .button:hover { 
         background: #DFDFDE;
      }
    </style>
    <title>Access!</title>
  </head>
  <body>
    <?php 
    $id = $_GET["sid"];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 border-end" style="background:#F7F5F2;height:768px">
              <h4 class="text-center my-2">Dashboard</h4>
              <div class="list-group my-3">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                      <a type="button" class="list-group-item list-group-item-action accordion-button collapsed border-0 button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Attendance</a>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="year-list">
                      <a class="list-group-item list-group-item-action border-0 attendance" value="1">SEM 1</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 2</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 3</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 4</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 5</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 6</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 7</a>
                      <a class="list-group-item list-group-item-action border-0 attendance">SEM 8</a>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      <a type="button" id ="score" class="list-group-item list-group-item-action accordion-button collapsed border-0 button"  data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">Scorecard</a>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                      <div class="year-list">
                        <a class="list-group-item list-group-item-action border-0 score">SEM 1</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 2</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 3</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 4</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 5</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 6</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 7</a>
                        <a class="list-group-item list-group-item-action border-0 score">SEM 8</a>
                      </div>
                    </div>
                </div>
              </div> 
                <a type="button" id="submission" class="list-group-item list-group-item-action border-0 button">Submission</a>
                <a type="button" id ="score" class="list-group-item list-group-item-action border-0 button">Faculty</a>
                <a type="button" id ="score" class="list-group-item list-group-item-action border-0 button">Clubs</a>
                <a type="button" id ="score" class="list-group-item list-group-item-action border-0 button">Sports</a>
                <a type="button" id ="score" class="list-group-item list-group-item-action border-0 button">Events</a>
              </div>
            </div>
            <div class="col-9">
                <div id="loader" class="text-center my-3"style="display:none"> 
                  <div class="spinner-grow text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <div id="result" class="row row-cols-1 row-cols-md-3 g-4 my-3">
                 
                </div>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.attendance').click(function(){
              var val = $(this).text();
              console.log(val);
              $('#result').html('')
              $('#loader').fadeIn();
              $.ajax({
                url: "attendance.php",
                type: "POST",
                data:{sid:<?php echo $id; ?>,sem:val},
                /*beforeSend: function(){
                  $('#loader').show();
                },*/
                success: function(data){
                  $('#loader').hide();
                  $('#result').fadeIn(600);
                  $('#result').html(data);
                },
                /*complete: function(){
                  $('#loader').hide();
                }*/
              })
            })
            $('#submission').click(function(){
              $('#result').html('')
              //$('#loader').show();
              $.ajax({
                url:"submission.php",
                type:"post",
                beforeSend: function(){
                  $('#loader').show();
                },
                success: function(data){
                  $('#result').html(data,10000);
                },
                complete: function(){
                  $('#loader').hide();
                }
              })
            })
            $('.score').click(function(){
              $('#result').html('')
              var val = $(this).text();
              //$('#loader').show();
              $.ajax({
                url:"score.php",
                type:"POST",
                data:{sid:<?php echo $id; ?>,sem:val},
                success: function(data){
                  $('#result').html(data);
                },
              })
            })
        })
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>