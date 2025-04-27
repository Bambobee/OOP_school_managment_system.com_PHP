<div class="card-group justify-content-center">
    <?php if(isset($test_row) && is_object($test_row)) : ?>
    <form method="post">
        <h3>A you sure you want to delete this Test permanently !</h3>
        <?php if(count($errors) > 0) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <?php foreach($errors as $error):?>
            <br> <?=$error?>
            <?php endforeach;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <label>Test name:</label>
        <input readonly type="text" value="<?= get_var('test', $test_row->test) ?>" class="form-control" name="test"
            placeholder="Test Title Name"> <br>
            <label>Test description:</label>
        <textarea readonly name="description" class="form-control" placeholder="Add a description for this test"><?= get_var('description', $test_row->description) ?></textarea>

 <br>
        <input type="submit" class="btn btn-danger float-end" value="Delete">
        <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
            <input type="button" class="btn btn-success text-white" value="Back">
        </a>
    </form>
    <?php else: ?>
    Sorry, that test was not found! <br><br>
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
        <input type="button" class="btn btn-success text-white" value="Back">
    </a>
    <?php endif; ?>
</div>