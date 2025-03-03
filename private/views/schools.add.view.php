<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
<?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>
    <div class="card-group justify-content-center">

        <form method="post">
            <h3>Add New School</h3>
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
            <input autofocus type="text" value="<?= get_var('school') ?>" class="form-control" name="school"
                placeholder="school Name"> <br><br>
            <input type="submit" class="btn btn-primary float-end" value="Create">
            <a href="<?=ROOT?>/schools">
                <input type="button" class="btn btn-danger text-white" value="Cancel">
            </a>
        </form>

    </div>
</div>


<?php $this->view('includes/footer'); ?>