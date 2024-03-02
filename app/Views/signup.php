<style>
            html, body{
            height:100%;
            width:100%;
            background:#27374D;
        }
        .container-fluid
        {
            justify-items:center;
            background:#27374D;
            flex-wrap: wrap;
            gap: 2rem;
            
        }
        .container-fluid p
        {
            display:flex;
            justify-items: center;
            font-size: 24px;
            color: white;
        }
        .container
        {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .container .row
        {
            background: #1f242d;
            border-radius: 2rem;
            text-align: center;
            border: 1rem solid #fff;
            flex: 0 2 35rem;
            padding: 3rem 0rem 5rem;
        }
        
        .container .row h2
        {
            color:#ffff;
        }
        
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Online Insure</title>
    <link rel="icon" href="<?=base_url()?>images/logo4_removebg.png" type="image/gif">
</head>
<body>
<div class="container-fluid">
    <a class="navbar-brand" href="#">
        
    <img src="<?php echo base_url() . 'images/logo4_removebg.png'; ?>" width="100px" height="100px" class="d-inline-block align-text-top">
    <p>Online Insure</p>
    </a>
  </div>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
            <img src="<?php echo base_url() . 'images/logo4_removebg.png'; ?>" class="card-img-top" alt="...">
                <h2>Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>