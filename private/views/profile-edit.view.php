<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


<div class="container-fluid p-3 shadow mx-auto" style="max-width: 1000px">
    <center>
        <h4>Edit Profile</h4>
    </center>
    <?php
                $image = get_image($row->image,$row->gender );
               
                ?>
    <?php if($row): ?>
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-4">
                <img src="<?=$image; ?>" class="border d-block mx-auto " alt="" style="width: 150px;">
                <br>
                <div class="text-center">
                    <?php if(Auth::access('reception') || Auth::i_own_content($row)): ?>
                    <a href="<?=ROOT?>/profile/edit/<?=$row->user_id?>">
                        <label for="image_browser" class="btn btn-sm btn-primary">
                            <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file"
                                name="image" style="display: none;">
                            Browse Image
                        </label>
                        <br>
                        <small class="file_info text-muted"></small>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-8 background-light p-2">

                <div class="mx-auto shadow rounded p-4 ">


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


                    <input type="firstname" value="<?=get_var('firstname',$row->firstname)?>" name="firstname"
                        placeholder="First name" class="mb-2 form-control">
                    <input type="lastname" value="<?=get_var('lastname',$row->lastname)?>" name="lastname"
                        placeholder="Last name" class="mb-2 form-control">
                    <input type="email" value="<?=get_var('email',$row->email)?>" name="email" placeholder="Email"
                        class="mb-2 form-control">

                    <select name="gender" class="mb-2 form-control">
                        <option <?=get_select('gender',$row->gender)?> value="<?=$row->gender ?>">
                            <?=ucwords($row->gender) ?></option>
                        <option <?=get_select('gender','male')?> value="male">Male</option>
                        <option <?=get_select('gender','female')?> value="female">Female</option>
                    </select>

                    <select name="rank" class="mb-2 form-control" name="rank">
                        <option <?=get_select('rank',$row->rank)?> value="<?=$row->rank ?>"><?=ucwords($row->rank)?>
                        </option>
                        <option <?=get_select('rank','student')?> value="student">Student</option>
                        <option <?=get_select('rank','reception')?> value="reception">Reception</option>
                        <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                        <option <?=get_select('rank','admin')?> value="admin">Admin</option>
                        <?php if(Auth::getRank() == 'super_admin'):?>
                        <option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
                        <?php endif; ?>
                    </select>

                    <input type="text" value="<?=get_var('password')?>" name="password" placeholder="Password"
                        class="mb-2 form-control">
                    <input type="text" value="<?=get_var('password2')?>" name="password2" placeholder="Retype Password"
                        class="mb-2 form-control">

                    <button class="btn btn-primary float-end">Save Changes</button>


                    <a href="<?=ROOT?>/profile/<?=$row->user_id?>">
                        <button type="button" class="btn btn-danger text-white">Bank to profile</button>
                    </a>
                </div>

            </div>
        </div>
    </form>

    <?php else:?>
    <center>
        <h4>That Profile was not found.</h4>
    </center>
    <?php endif;?>
</div>

<script>
function display_image_name(file_name) {
    document.querySelector(".file_info").innerHTML = '<b>Selected file:</b> <br>' + file_name;
}
</script>
<?php $this->view('includes/footer'); ?>