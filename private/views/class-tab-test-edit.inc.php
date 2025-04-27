<div class="card-group justify-content-center">
    <?php if(isset($test_row) && is_object($test_row)) : ?>
    <form method="post">
        <h3>Edit a Test</h3>
        <?php if(count($errors) > 0) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <?php foreach($errors as $error):?>
            <br> <?=$error?>
            <?php endforeach;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <input autofocus type="text" value="<?= get_var('test', $test_row->test) ?>" class="form-control" name="test"
            placeholder="Test Title Name"> <br>
        <textarea name="description" class="form-control" placeholder="Add a description for this test"><?= get_var('description', $test_row->description) ?></textarea>

        <?php
        $disabled = get_var('disabled', $test_row->disabled);
        ?>
        <input type="radio" name="disabled" value="0" <?= $disabled == 0 ? 'checked' : '' ?>> Active |
        <input type="radio" name="disabled" value="1" <?= $disabled == 1 ? 'checked' : '' ?>> Disabled
        <br><br>
        <input type="submit" class="btn btn-primary float-end" value="Save">
        <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
            <input type="button" class="btn btn-danger text-white" value="Back">
        </a>
    </form>
    <?php else: ?>
    Sorry, that test was not found! <br><br>
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
        <input type="button" class="btn btn-danger text-white" value="Back">
    </a>
    <?php endif; ?>
</div>