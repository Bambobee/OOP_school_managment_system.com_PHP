
<div class="card-group justify-content-center">
    
    <table class="table table-striped table-hover">
        <tr>
            <th></th>
            <th>Test Name</th>
            <th>Created by</th>
            <th>Active</th>
            <th>Date</th>
        
        </tr>

        <?php if(isset($rows) && $rows):?>

        <?php foreach($rows as $row): ?>
        <tr>
            <td>
                <a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
                </a>
            </td>
            <td><?=$row->test ?></td>
            <td><?=$row->user->firstname ?> <?=$row->user->lastname ?></td>
            <?php $active = $row->disabled ? "No" : "Yes" ?>
            <td><?=$active ?></td>
            <td><?=get_date($row->date) ?></td>
           
        </tr>
        <?php endforeach; ?>
        <?php else:?>
       <tr><td colspan ="6"> <center>No Tests were found at this time.</center> </td></tr>
        <?php endif;?>
    </table>
</div>