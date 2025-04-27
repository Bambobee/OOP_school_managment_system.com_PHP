<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


<div class="container-fluid p-3 shadow mx-auto" style="max-width: 1000px">
    <?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>

    <?php if($row): ?>
    <div class="row">
        <h4 class="text-center"><?=esc(ucwords($row->class));?></h4>

        <table class="table table-hover table-striped table-bordered">
         
            <tr>
                <th>Created by: </th>
                <td><?=esc($row->user->firstname);?> <?=esc($row->user->lastname);?></td>
            
                <th>Date Created: </th>
                <td><?=get_date($row->date);?></td>
            </tr>

        </table>
    </div>
    <br>
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?=$page_tab == 'lecturers' ? 'active' : ''; ?>" 
                    href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=lecturers">Lectuers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?=$page_tab == 'students' ? 'active' : ''; ?>"
                    href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=students">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?=$page_tab == 'tests' ? 'active' : ''; ?>"
                    href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">Test</a>
            </li>
        </ul>



        <?php

    switch ($page_tab){
        case 'lecturers':
            // $this->view('class-tab-lecturers',['row'=>$row]);
            include(views_path('class-tab-lecturers'));
            break;

        case'students':
            include(views_path('class-tab-students'));
            break;

        case 'tests':
            include(views_path('class-tab-tests'));
            break;

        case 'test-add':
            include(views_path('class-tab-test-add'));
            break;    
        case 'test-edit':
            include(views_path('class-tab-test-edit'));
            break; 
        case 'test-delete':
                include(views_path('class-tab-test-delete'));
                break; 
        case 'lecturer-add':
            include(views_path('class-tab-lecturer-add'));
            break;

        case 'lecturer-remove':
                include(views_path('class-tab-lecturer-remove'));
                break;

        case'student-add':
            include(views_path('class-tab-student-add'));
            break;

        case 'student-remove':
            include(views_path('class-tab-student-remove'));
            break;

        case 'tests-add':
            include(views_path('class-tab-test-add'));
            break;

        default:
            break;
    }

      ?>
    </div>
    <?php else:?>
    <center>
        <h4>That Class was not found.</h4>
    </center>
    <?php endif;?>
</div>

<?php $this->view('includes/footer'); ?>