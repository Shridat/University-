<?php 
include "connect.php";
$sql = "select * from submission ";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num>0){
    while($row=mysqli_fetch_assoc($result)){
        echo '<div>
        <h3 class="text-center fw-bold">Your Submission Checklist</h3>
        <div class="row">
            <div class="col">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h5 class="card-title">'.$row['sub'].'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'.$row['title'].'</h6>
                    <p class="card-text">'.$row['des'].'</p>
                    <h6>Posted on '.date("d-m-Y",strtotime($row['issued'])).'</h6>
                    <h6>Submit on '.date("d-m-Y",strtotime($row['deadline'])).'</h6>
                    <a href="#" class="card-link">Contact</a>
                    <a href="#" class="card-link">Student Help</a>
                </div>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                </span>
            </div>
            </div>
        </div>
    </div>';

        
    } 
}
else{
    echo "No data available";
}

?>