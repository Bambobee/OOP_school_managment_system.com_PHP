<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


<div class="container-fluid p-3 shadow mx-auto" style="max-width: 1000px">
    <?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>

    <?php if($row): ?>
    <div class="row">
        <h4 class="text-center"><?=esc(ucwords($row->test));?></h4>

        <table class="table table-hover table-striped table-bordered">
         
            <tr>
                <th>Created by: </th>
                <td><?=esc($row->user->firstname);?> <?=esc($row->user->lastname);?></td>
            
                <th>Date Created: </th>
                <td><?=get_date($row->date);?></td>
                <td>
                <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i> View class</button>
            </a>
                </td>
            </tr>
            <?php $active = $row->disabled ? 'No' : 'Yes'; ?>
            <tr><td><b>Active: </b><?=$active; ?></td>
            <td colspan="5"><b>Test Description:</b> <br> <?=esc($row->description); ?></td></tr>

        </table>
    </div>
    
        <?php

    switch ($page_tab){
        case 'view':
            include(views_path('test-tab-view'));
            break;

        case 'add-subjective':
                include(views_path('test-tab-add-subjective'));
                break;    
        case 'add-multiple':
                include(views_path('test-tab-add-multiple'));
                break; 
        case 'add-objective':
                include(views_path('test-tab-add-objective'));
                break;                 

        case'add':
            include(views_path('test-tab-add'));
            break;

        case 'edit':
            include(views_path('test-tab-edit'));
            break;

        case 'delete':
            include(views_path('test-tab-test-delete'));
            break;    

        default:
            break;
    }

      ?>
    </div>
    <?php else:?>
    <center>
        <h4>That Test was not found.</h4>
    </center>
    <?php endif;?>
</div>

<?php $this->view('includes/footer'); ?>