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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
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
<?php if (session()->getFlashdata('success')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success')?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-user-plus' ></i>Add New Sales Rep
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Sales Representatives</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('dashboard/SalesRep/list') ?>" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID</label>
            <input type="text" class="form-control" name="ID"  disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Commission Rate</label>
            <input type="text" class="form-control" name="commission">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tax Rate</label>
            <input type="text" class="form-control" name="taxrate">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bonus</label>
            <input type="text" class="form-control" name="bonus">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<table class="table table-striped" id="myTable">
  <thead>
    <tr class="table table-secondary">
      <th scope="col">SalesRep_ID</th>
      <th scope="col">Name</th>
      <th scope="col">Commision Percentage</th>
      <th scope="col">Tax Rate</th>
      <th scope ="col">Bonus</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sales_representatives as $SalesRep):?>
    <tr class="table table-secondary">
      <td><?= $SalesRep['id']; ?></td>
      <td><?=$SalesRep['name'];?></td>
      <td><?=$SalesRep['commission_percentage'];?></td>
      <td><?=$SalesRep['tax_rate'];?></td>
      <td><?=$SalesRep['bonuses'];?></td>
      
      <td>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit1">Edit
    </button>
    <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" > 
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sales Representatives</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/SalesRep/list/<?=$SalesRep['id'];?>" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID</label>
            <input type="text" class="form-control" name="id"  disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name" value="<?= $SalesRep['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Commission Rate</label>
            <input type="text" class="form-control" name="commission" value="<?= $SalesRep['commission_percentage']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tax Rate</label>
            <input type="text" class="form-control" name="taxrate" value="<?= $SalesRep['tax_rate']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bonus</label>
            <input type="text" class="form-control" name="bonus" value="<?=$SalesRep['bonuses'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
      </button>
        <a href="/dashboard/SalesRep/delete/<?= $SalesRep['id']; ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</main>


</body>
<script>
let table = new DataTable('#myTable');
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
