<?php 
include_once '../database/connect.php';
    $mysqli = dbconnect();
   session_start();
   $user_id = $_SESSION['user_id'];
    if(!isset($_SESSION['user_id'])){
      header("Location: ../index.php");
      exit();
    }    
    include_once '../includes/header.php';
    include_once '../classes/supplier.php';
    include_once '../classes/measurement.php';
    include_once '../classes/product.php';
 ?>
    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                </div>
                <card-body>
                <?php
                    if(isset($_GET['transact_report'])){
                        $user_id = $_GET['user_id'];
                        $result = fetch_paid_transaction_report($mysqli,$user_id);
                        
                        
                    }
                ?>
                    <h2 class="card-title" style="text-align:center">Generate Report</h2>
                        <div class="container">
                            <div class="col-md-6">
                            <button class="btn btn-primary">Inventory Report</button>
                            <a class="btn btn-primary" href="transact_report.php?transact_report=1&user_id=<?php echo $user_id ?>">Transaction Report</a>
                            </div>
                        </div>
                </card-body>
            </div>
        </div>
    </div>

<?php
    include_once '../includes/footer.php';
?>