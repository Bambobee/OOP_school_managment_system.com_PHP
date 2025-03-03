<?php
$this->view('includes/header'); ?>

<div class="container-fluid">
    <form method="post">
        <div class="mx-auto shadow rounded p-4 " style="margin-top: 120px; width: 100%; max-width: 340px">
            <img src="<?= ASSETS; ?>/img/logo.png" class="border border-primary d-block mx-auto rounded-circle"
                width=" 100px" alt="">
            <h3 class="text-center mb-3">Login</h3>
               <?php 
            if(count($errors) > 0) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> 
              <?php foreach($errors as $error):?>
               <br> <?=$error?>
              <?php endforeach;?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <input  value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" class="mb-3 form-control" autofocus>
            <input  value="<?=get_var('password ')?>" type="password" name="password" placeholder="Password" class="mb-3 form-control">
            <button class="btn btn-primary">Login</button>
        </div>
    </form </div>

    <?php $this->view('includes/footer'); ?>