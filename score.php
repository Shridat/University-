<?php
include "connect.php";
$id = $_POST['sid'];
$sem = $_POST['sem'];
$sql = "select * from marks where sem='$sem' and sid='$id'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num>0){
  
    echo '<h3 class="text-center my-3"> Final Scorecard is ready!!!</h3>
    <table class="table table-dark table-hover my-2">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Marks</th>
        <th scope="col">Remark</th>
        <th scope="col">Teacher</th>
        <th scope="col">Year</th>
      </tr>
    </thead>
    <tbody>';
    $sr=1;
    $sum = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $tid=$row['tid'];
        /*$sql1 = "select * from teachers where tid='$tid'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);*/
        echo '
    
      <tr>
        <td>'.$sr.'</td>
        <td>'.$row['sub'].'</td>
        <td>'.$row['marks'].'</td>
        <td>'.$row['status'].'</td>
        <td>lol</td>
        <td>'.$row['year'].'</td>
      </tr>
    ';
    $sr = $sr+1;
    $sum = $sum+$row['marks'];
    }
    $avg = round(($sum/825)*100,2);
    echo '</tbody>
    <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td>Total</td>
      <td>'.$sum.'/1250</td>
      <td>AVG</td>
      <td>'.$avg.'</td>
    </tr>
  </tfoot>
    </table>';
    if($avg>75){
      echo '<div class="container">
      <div class="alert alert-success" role="alert">
        Congratulations!!! You have secured <b>Distinction</b> in exam.
      </div>
    </div>';
      
    }
    else if($avg<75 && $avg>=65){
      echo  '<div class="container">
      <div class="alert alert-success" role="alert">
        Congratulations!!! You have secured <b>First Class</b> in exam.
      </div>
    </div>';
    }
    else if($avg<65 && $avg>=50){
      echo '<div class="container">
      <div class="alert alert-success" role="alert">
        Congratulations!!! You have secured <b>Second Class</b> in exam.
      </div>
    </div>';
    }
    else if($avg<50 && $avg>=40){
      echo '<div class="container">
      <div class="alert alert-success" role="alert">
        Congratulations! You have <b>Passed</b> the exam.
      </div>
    </div>';
    }
    else{
      echo '<div class="container">
      <div class="alert alert-danger" role="alert">
        Sorry!!! You have <b>Failed</b> in exam.
      </div>
    </div>';
    }
}
else{
    echo 'No data found';
}

?> 



