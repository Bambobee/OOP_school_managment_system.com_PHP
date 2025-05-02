
<nav class="navbar">
<center><h5>Test Questions</h5>
<p><b>Total Questions</b> : <?=$total_questions; ?></p>
</center>
    <!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-bars"></i>Add
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addsubjective/<?=$row->test_id?>">Add Multiple Choice Question</a></li>
    <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addsubjective/<?=$row->test_id?>?type=objective">Add Objective Question</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addsubjective/<?=$row->test_id?>">Add Subjective Question</a></li>
  </ul>
</div>
</nav>

<hr>

<?php if(isset($questions) && is_array($questions)):?>
  <?php $num = ($total_questions + 1) ?>
  <?php foreach($questions as $quest): $num--?>
      <div class="card mb-4 shadow">
        <div class="card-header">
         <span class="bg-primary p-1 text-white rounded"> Question #<?=$num; ?></span> 
         <span class="p-2 badge bg-primary float-end rounded"><?= date("F jS, Y H:i:s a ", strtotime($quest->date)) ?></span>
        </div>
        <div class="card-body ">
          <h5 class="card-title"><?= esc($quest->question) ?></h5>
          <?php if(file_exists($quest->image)): ?>
          <img src="<?=ROOT ?>/<?=$quest->image ?>" style="width: 50%" alt="">
          <?php endif; ?>
          <p class="card-text"><?= esc($quest->comment) ?></p>
          <?php if($quest->question_type == 'objective'):?>
          <p class="card-text"><b>Answer: </b><?= esc($quest->answer) ?></p>
          <?php endif; ?>
          <p class="card-text float-end">
            <button class="btn btn-sm btn-info text-white pe-1"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger text-white pe-1"><i class="fa fa-trash-alt "></i></button>
          </p>
        </div>
        
      </div>
  <?php endforeach; ?>
<?php endif; ?>