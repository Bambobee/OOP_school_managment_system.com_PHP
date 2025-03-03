<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
<?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>
    
    <?php if($row) :?>
       <div class="card-group justify-content-center">
        <form method="post">
            <h3>Edit Class</h3>
            
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
            <input autofocus type="text" value="<?= get_var('class',$row[0]->class) ?>" class="form-control" name="class"
                placeholder="Class Name"> <br><br>
            <input type="submit" class="btn btn-primary float-end" value="Save">
            <a href="<?=ROOT?>/classes">
                <input type="button" class="btn btn-danger text-white" value="Cancel">
            </a>
        </form>
                </div>
        <?php else: ?>
            <div style="text-align: center;">
            <h3>
            That class was not found!
            </h3> <br><br>
            <a href="<?=ROOT?>/classes">
                <input type="button" class="btn btn-danger btn-sm text-white" value="Cancel">
            </a>
            </div>
        <?php endif; ?>
    
</div>


<?php $this->view('includes/footer'); ?>