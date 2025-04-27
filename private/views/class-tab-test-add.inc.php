<div class="card-group justify-content-center">

<form method="post">
    <h3>Add New Test</h3>
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
    <input autofocus type="text" value="<?= get_var('test') ?>" class="form-control" name="test"
        placeholder="Test Title Name"> <br>
        <textarea name="description" class="form-control" placeholder="Add a description for this test" id="">
        <?= get_var('description') ?>
        </textarea>
        <br>
    <input type="submit" class="btn btn-primary float-end" value="Create">
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
        <input type="button" class="btn btn-danger text-white" value="Cancel">
    </a>
</form>

</div>
</div>