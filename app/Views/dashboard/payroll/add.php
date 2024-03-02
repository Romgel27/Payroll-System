<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/dashboard.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    


<!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <title>Online Insure</title>
    <link rel="icon" href="<?=base_url()?>images/logo4_removebg.png" type="image/gif">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <img src="<?php echo base_url() . 'images/logo4_removebg.png'; ?>" width="80px" height="80px" class="d-inline-block align-text-top">
        <a class="navbar-brand" href="#"> Online Insure Payroll System </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url('/dashboard/home')?>"><i class='bx bx-home'></i>Home</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>-->
            <li class="nav-item dropdown" id= "salesDrp">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-user'></i>
                    SalesRep
                    </a>
                  <ul class="dropdown-menu "data-bs-theme="dark">
                    <li><a class="dropdown-item" href=""> <?= session()->get('name') ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Set Commission Percentage</a></li>
                    <li><a class="dropdown-item" href="#">Tax Rate</a></li>
                    <li><a class="dropdown-item" href="#">Bonuses</a></li>
                </ul>
            </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/dashboard/SalesRep/list')?>"><i class='bx bx-list-ul' ></i>Sales Representative List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/dashboard/payroll/add')?>"><i class='bx bx-edit-alt' ></i>Create Payroll</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class='bx bxs-file-pdf' ></i>PDFs</a>
                    </li>
            </ul>
            <div class="icons">
                <div class="user-wrapper">
                    <i class="bx bx-user-circle" onclick="menuToggle();"></i>
                    <div>
                    <h4>Hi, <?= session()->get('name') ?></h4>
                        <div class="menu">
                            <h3>Online <br><span> Insure </span></h3>
                    <ul>
                        <li><span class="bx bx-log-out-circle"></span><a href="<?= base_url('logout')?>">LogOut</a></li>
                    </ul>
                    </div>
                    </div>
                </div>                  
        </div>
    </div>
</nav>
<main>
<section class="content">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Payroll</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Adviser</label>
                        <select id="adviser" class="form-control custom-select" name="users">
                            <option selected disabled>Select Adviser</option>
                            <?php foreach ($sales_representatives as $user):?>
                                <option><?= esc($user['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">From Date</label>
                        <input type="date" id="startDate" class="form-control" name="fromdate">
                    </div>

                    <div class="form-group">
                        <label for="endDate">To Date</label>
                        <input type="date" id="datepicker" class="form-control" name="todate">
                    </div>
                    <div class="form-group">
                        <label for="inputBonuses">Bonuses</label>
                        <select id="inputBonuses" class="form-control" name="bonus">
                            <?php if (isset($bonus)): ?>
                                <option value="<?= $bonus['id']; ?>"><?= $bonus['bonus']; ?></option>
                            <?php else: ?>
                                <option value="" disabled>No Bonus Available</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Number of Client</label>
                        <input type="text" id="inputProjectLeader" class="form-control" name="clientNum">
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Client Name</label>
                        <input type="text" id="inputClientCompany" class="form-control" name="client">
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">OnlineInsure Commission</label>
                        <input type="text" id="commission" class="form-control" name="commission">
                    </div>

                    <!-- Payment Calculation -->
                    <div class="form-group">
                        <label for="inputMultiplier">Multiplier</label>
                        <input type="text" id="multiplier" class="form-control" name="multiplier" value="1">
                    </div>
                    <div class="form-group">
                        <label for="paymentAmount">Payment Amount</label>
                        <input type="text" id="paymentAmount" class="form-control" name="paymentAmount">
                    </div>

                    <!-- Display the calculated results -->
                    <div class="result-group">
                        <p>Net Amount: <span id="netAmount">$0.00</span></p>
                        <p>Tax: <span id="tax">$0.00</span></p>
                        <p>Total Amount: <span id="totalAmount">$0.00</span></p>
                    </div>
                    
                    <div class="d-grid">
                    <a href="#" class="btn btn-primary" id="generate-pdf-btn" onclick="calculatePayment()">Create Payroll</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div>
            <!-- Display the calculated results -->
        </div>
    </div>
</section>
</main>


</body>
<script>
function calculatePayment() {
    // Get values from the form
    let paymentAmount = parseFloat(document.getElementById('paymentAmount').value) || 0;
    let commissionRate = parseFloat(document.getElementById('commission').value) || 0;
    let taxRate = parseFloat(document.getElementById('inputBonuses').value) || 0;
    let multiplier = parseFloat(document.getElementById('multiplier').value) || 1;

    // Calculate net amount
    let commissionAmount = paymentAmount * commissionRate / 100;
    let netAmount = (paymentAmount - commissionAmount).toFixed(2);

    // Calculate tax
    let tax = (netAmount * taxRate / 100).toFixed(2);

    // Calculate total payment amount
    let totalAmount = (netAmount - tax).toFixed(2);

    // Update the result fields
    document.getElementById('netAmount').innerText = '$' + netAmount;
    document.getElementById('tax').innerText = '$' + tax;
    document.getElementById('totalAmount').innerText = '$' + totalAmount;

    // Update the form fields
    document.getElementById('netAmount-input').value = netAmount;
    document.getElementById('tax-input').value = tax;
    document.getElementById('totalAmount-input').value = totalAmount;

    let formData = {
    commission: commissionRate,
    taxRate: taxRate,
    multiplier: multiplier,
    paymentAmount: paymentAmount
};

// Send the data to the server using AJAX
function generatePdf() {
  // Send a request to the server to generate the PDF
  fetch('/mainController/generatePdf', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      commission: commissionRate,
      taxRate: taxRate,
      multiplier: multiplier,
      paymentAmount: paymentAmount
    }),
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.blob();
  })
  .then(blob => {
    // Create a download link and trigger the download
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = url;
    a.download = 'payroll.pdf';
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
  })
  .catch(error => {
    console.error('Error:', error);
  });
}
}
</script>


<script>
        function menuToggle()
            {
                const toggleMenu = document.querySelector(".menu");
                toggleMenu.classList.toggle("active")
            }
            function submenuToggle()
        {
            const toggleMenu = document.querySelector(".sub-menu");
            toggleMenu.classList.toggle("active")
        }
</script>
<script>
    function updateEndDate() {
        // Get the selected start date
        const startDate = document.getElementById('startDate').value;

        // Set the minimum value for the end date to the selected start date
        document.getElementById('endDate').min = startDate;

        // Reset the end date value if it's less than the selected start date
        if (document.getElementById('endDate').value < startDate) {
            document.getElementById('endDate').value = startDate;
        }
    }
</script>
