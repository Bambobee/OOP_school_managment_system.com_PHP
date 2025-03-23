<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


<div class="container-fluid p-3 shadow mx-auto" style="max-width: 1000px">
    <?php $this->view('includes/crumbs',['crumbs' => $crumbs]) ?>
    <?php
                $image = get_image($row->image,$row->gender );
               
                ?>
    <?php if($row): ?>
    <div class="row">
        <div class="col-4">
            <img src="<?=$image; ?>" class="border border-primary d-block mx-auto rounded-circle"
                alt="" style="width: 150px;">
                <h3 class="text-center"><?=esc($row->firstname);?> <?=esc($row->lastname);?></h3>
        </div>
        <div class="col-8 background-light p-2">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th>First Name: </th>
                    <td><?=esc($row->firstname);?></td>
                </tr>
                <tr>
                    <th>Last Name: </th>
                    <td><?=esc($row->lastname);?></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><?=esc($row->email);?></td>
                </tr>
                <tr>
                    <th>Gender: </th>
                    <td><?=esc($row->gender);?></td>
                </tr>
                <tr>
                    <th>Date Created: </th>
                    <td><?=get_date($row->date);?></td>
                </tr>
                <tr>
                    <th>Role: </th>
                    <td><?=ucwords(str_replace("_"," ",$row->rank));?></td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?=$page_tab=='info' ? 'active' : '' ?>" aria-current="page" href="<?=ROOT ?>/profile/<?=$row->user_id?>">Basic Infor</a>
            </li>
           <?php if(Auth::access('lecturer') || Auth::i_own_content($row)): ?>
            <li class="nav-item">
                <a class="nav-link <?=$page_tab=='classes' ? 'active' : '' ?>" href="<?=ROOT ?>/profile/<?=$row->user_id?>?tab=classes">Classes </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=$page_tab=='tests' ? 'active' : '' ?>" href="<?=ROOT ?>/profile/<?=$row->user_id?>?tab=tests">Test</a>
            </li>
            <?php endif; ?>
            
        </ul>

        <?php

        switch ($page_tab){
            case 'info':
                include(views_path('profile-tab-info'));
                break;
            case 'classes':
                if(Auth::access('lecturer') || Auth::i_own_content($row)){
                    include(views_path('profile-tab-classes'));
                }else{
                    include(views_path('access_denied'));
                }
                
                break;
            case 'tests':
                if(Auth::access('lecturer') || Auth::i_own_content($row)){
                include(views_path('profile-tab-test'));
            }else{
                include(views_path('access_denied'));
            }
                break;
                
            default:
                break;    
        }
        ?>
        
    </div>
 <?php else:?>
 <center> <h4>That Profile was not found.</h4></center>
 <?php endif;?>
</div>

<?php $this->view('includes/footer'); ?>