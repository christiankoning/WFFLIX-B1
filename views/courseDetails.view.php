<?php
require 'views/partials/head.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <h1><?= $video['title'] ?></h1>
                <div class="ratio ratio-16x9">
                    <iframe allowfullscreen src="<?= $videoUrl ?>"></iframe>
                </div>
                <br />
                <p><?= $video['description'] ?></p>
                <br />
                <form method="post" action="<?=Request::buildUri( '/courses/start')?>">
                    <input type="hidden" name="courseId" value="<?= $video['categoryId'] ?>">
                    <input type="hidden" name="progress" value="<?= $progress ?>">
                    <button class="btn btn-primary" type="submit" <?=Auth::isAdmin() || Auth::isTeacher() || $progress > $courseSize ? 'disabled' : '' ?>><?=Auth::isAdmin() || Auth::isTeacher() || $progress > $courseSize ? 'Je hebt dit onderdeel al afgerond' : 'Onderdeel afronden' ?></button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>

