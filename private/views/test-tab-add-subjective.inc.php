<center>
    <h5>Add Subjective Questions</h5>
</center>

<form method="post" enctype="multipart/form-data">
    <?php if(count($errors) > 0) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>
        <?php foreach($errors as $error):?>
        <br> <?=$error?>
        <?php endforeach;?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <label>Question:</label>
    <textarea autofocus name="question" class="form-control" id="" placeholder="Type your question here">
    <?=get_var('comment') ?>
    </textarea>
    <div class="input-group mb-3 pt-4">
    <label for="" class="input-group-text">Comment(optional)</label>
        <input type="text" name="comment" value="<?=get_var('comment') ?>" class="form-control" placeholder="comment">
    </div>
    <div class="input-group mb-3 ">
        <label for="" class="input-group-text"><i class="fa fa-image"></i> image(optional)</label>
        <input type="file" name="image" class="form-control">
    </div>
    <?php if(isset($_GET['type']) && $_GET['type'] == "objective") : ?>
    <div class="input-group mb-3 ">
        <label for="" class="input-group-text">Answer</label>
        <input type="text" name="answer" value="<?=get_var('answer') ?>" class="form-control" placeholder="Enter the correct answer here ">
    </div>
    <?php endif; ?>
    <a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-right"></i>Back</button>
    </a>
    <button class="btn btn-danger float-end">Save Question</button>
</form>