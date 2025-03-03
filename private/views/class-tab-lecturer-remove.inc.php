<form method="post" class="form mx-auto" style="width: 100%; max-width: 400px;"> <br>
    <h4>Remove   Lecturer</h4>

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

    <input value="<?=get_var('name') ?>" autofocus type="text" class="form-control" name="name"
        placeholder="Lecturer name"> <br>
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=lecturers">
        <button type="button" class="btn btn-danger ">Cancel</button>
    </a>
    <button class="btn btn-primary float-end" name="search">Search</button>
    <div class="clearfix"></div>
</form>
<br>
<form method="post">
<div class="card-group justify-content-center">


        <?php if(isset($results) && $results): ?>
        <?php foreach ($results as $row): ?>

        <?php include(views_path('user'))?>

        <?php endforeach;?>
        <?php else:?>
        <?php if(count($_POST) > 0):?>
        <center>
            <hr>
            <h4>
                No lecturer was found at this time
            </h4>
        </center>
        <?php endif;?>
        <?php endif;?>
    
</div>
</form>