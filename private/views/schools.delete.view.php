<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
<?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>
    
    <?php if($row) :?>
       <div class="card-group justify-content-center">
        <form method="post">
            <h3>Are sure you want to delete ?!</h3>

            <input disabled autofocus type="text" value="<?= get_var('school',$row[0]->school) ?>" class="form-control" name="school"
                placeholder="school Name"> <br><br>
                <input type="hidden" name="id">
            <input type="submit" class="btn btn-danger float-end" value="Delete">
            <a href="<?=ROOT?>/schools">
                <input type="button" class="btn btn-success text-white" value="Cancel">
            </a>
        </form>
                </div>
        <?php else: ?>
            <div style="text-align: center;">
            <h3>
            That School was not found!
            </h3> <br><br>
            <a href="<?=ROOT?>/schools">
                <input type="button" class="btn btn-danger btn-sm text-white" value="Cancel">
            </a>
            </div>
        <?php endif; ?>
    
</div>


<?php $this->view('includes/footer'); ?>