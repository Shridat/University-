<?php 
//echo 'Hello This is attendance page!';
include "connect.php";
$id = $_POST['sid']; 
$sem = $_POST['sem'];
/*echo $sem;
echo $id;*/
$sql = "select * from attendance where sem='$sem' AND sid = '$id'";
$result = mysqli_query($conn, $sql);
$sum = 0;
$num = mysqli_num_rows($result);
if($num>0){
  while($row = mysqli_fetch_assoc($result)){
    $sum = $sum + $row['percentage'];
    echo '<div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bold">Academic Year '.$row['year'].'</h5>
        <p class="text-muted fw-bold">Sem - '.$row['sem'].'</p>
        <h5 class="card-title">'.$row['month'].'</h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$row['percentage'].'%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="card-text">'.$row['percentage'].'</p>';
      if($row['percentage']<75){
          echo '<div class="alert alert-danger" role="alert">
          Ohho! Your attendance does not meet the requirements. Contact to subject teachers if u have any queries.
        </div>';
      }
      else{
        echo '<div class="alert alert-success" role="alert">
        Congratulations! You have completed required attendance. 
      </div>';
      }
      echo'</div>
    </div>
  </div>';
}
echo '<div class="card bg-dark text-white">
<div class="card-img-overlay">
  <h5 class="card-title">Overall Attendance</h5>
  <div class="progress">
    <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" style="width: '.$sum/$num.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <p class="card-text">'.$sum/$num.'</p>';
  if($sum/$num<75){
    echo '<div class="alert alert-danger" role="alert">
    Ohho! You are not eligible for submission. Contact to subject teacher.
  </div>';
  }
  else{
    echo '<div class="alert alert-success" role="alert">
     WOHO!You have completed required attendance.
  </div>';
  }
  echo'
</div>
</div>
';
}
else{
  echo 'No data found';
}

?>