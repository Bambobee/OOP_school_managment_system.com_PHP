<h3>MY CLASSES</h3>
<nav class="navbar navbar-light bg-light">
    <form action="" class="form-inline">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="search" aria-label="Search">
        </div>
    </form>
</nav>

<?php  $rows = $student_classes; ?>
<?php
    include(views_path('classes'));
    ?>