     <?php
    //  include_once '../database/connect.php';
    //     $mysqli = dbconnect();
    //    session_start();
     ?>

  <nav class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
    <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventory POS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="supplier.php">Manage Supplier</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php  ">Manage Inventory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkout.php">Check out</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transaction.php">Transaction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="generate_reports.php">Generate Report</a>
              </li>          
          </ul>
          <ul class="navbar-nav ml-auto mb-2 mb-md-0"> 
          <li class="nav-item">            
              <a class="nav-link active">  <?php
                  if(isset($_SESSION['fname'])){
                    echo "Welcome ". $_SESSION['fname'];
                  }
              ?></a>
            </li>         
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Sign out</a> 
            </li>
          </ul>        
      </div>
  </div>
</nav>
   
