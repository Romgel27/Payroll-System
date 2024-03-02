
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/signin.css') ?>">
    <base href="/">
    <title>Online Insure</title>
    <link rel="icon" href="<?=base_url()?>images/logo4_removebg.png" type="image/gif">
  </head>
  <body>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="<?php echo base_url() . 'images/logo4_removebg.png'; ?>" width="120px" height="120px" class="d-inline-block align-text-top">
 
    </a>
  </div>
    <div class="container ">
        <div class="row justify-content-md-center">
            <div class="col-5">
            <img src="<?php echo base_url() . 'images/logo4_removebg.png'; ?>" class="card-img-top" alt="...">
                <h2>Online Insure</h2>
                <h2>Login</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control " >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
      
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Signin</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</html>