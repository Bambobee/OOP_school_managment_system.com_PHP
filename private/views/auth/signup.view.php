<?php
$this->view('includes/header'); ?>

<div class="container-fluid">

    <form method="post">
        <div class="mx-auto shadow rounded p-4 " style="margin-top: 30px; width: 100%; max-width: 340px">
            <img src="<?= ASSETS; ?>/img/logo.png" class="border border-primary d-block mx-auto rounded-circle"
                width=" 100px" alt="">
            <h3 class="text-center mb-2">Sign Up</h3>

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


            <input type="firstname" value="<?=get_var('firstname')?>" name="firstname" placeholder="First name"
                class="mb-2 form-control">
            <input type="lastname" value="<?=get_var('lastname')?>" name="lastname" placeholder="Last name"
                class="mb-2 form-control">
            <input type="email" value="<?=get_var('email')?>" name="email" placeholder="Email"
                class="mb-2 form-control">

            <select name="gender" class="mb-2 form-control">
                <option <?=get_select('gender','')?> value="">--Select a Gender--</option>
                <option <?=get_select('gender','male')?> value="male">Male</option>
                <option <?=get_select('gender','female')?> value="female">Female</option>
            </select>
            <?php if($mode == 'students'):?>
                <input type="hidden" class="mb-2 form-control"  value="student" name="rank">
                <?php else:?>
            <select name="rank" class="mb-2 form-control" name="rank">
                <option <?=get_select('rank','')?> value="">--Select a Rank--</option>
                <option <?=get_select('rank','student')?> value="student">Student</option>
                <option <?=get_select('rank','reception')?> value="reception">Reception</option>
                <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                <option <?=get_select('rank','admin')?> value="admin">Admin</option>
                <?php if(Auth::getRank() == 'super_admin'):?>
                <option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
                <?php endif; ?>
            </select>
            <?php endif;?>

            <input type="text" value="<?=get_var('password')?>" name="password" placeholder="Password"
                class="mb-2 form-control">
            <input type="text" value="<?=get_var('password2')?>" name="password2" placeholder="Retype Password"
                class="mb-2 form-control">

            <button class="btn btn-primary float-end">Sign Up</button>

            <?php if($mode == 'students'):?>
            <a href="<?=ROOT?>/students">
                <button type="button" class="btn btn-danger text-white">Cancel</button>
            </a>
            <?php else:?>
            <a href="<?=ROOT?>/users">
                <button type="button" class="btn btn-danger text-white">Cancel</button>
            </a>
            <?php endif;?>
        </div>
    </form>
</div>

<?php $this->view('includes/footer'); ?>