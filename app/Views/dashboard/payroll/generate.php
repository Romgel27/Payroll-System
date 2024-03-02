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
<form id="payroll-form" method="post" action="<?= base_url('/dashboard/payroll/generate-pdf') ?>">
    <input type="hidden" id="netAmount-input" name="netAmount">
    <input type="hidden" id="tax-input" name="tax">
    <input type="hidden" id="totalAmount-input" name="totalAmount">
    <button type="submit" class="btn btn-primary">Generate PDF</button>
</form>