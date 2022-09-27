<?php
require 'views/partials/head.partial.php';
?>
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col-2"></div>
                <div class="col-8 mx-auto d-flex justify-content-center text-wrap text-center"><h1
                            class="h1"><?= $category['name'] ?></h1></div>
                <div class="col-2"></div>
            </div>
            <div class="row mx-auto mb-2">
                <h3 class="text-wrap text-center"">Progressie cursus: </h3>
            </div>
            <?php
            if (!Auth::isAdmin() && !Auth::isTeacher()) {
                ?>
                <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar"
                         style="width: <?= $progress == 0 ? '0' : $progress / count($courses) * 100 ?>%;"
                         aria-valuenow=" */<?= $progress == 0 ? '0' : $progress / count($courses) * 100 ?>"
                         aria-valuemin="0"
                         aria-valuemax="100"> <?= $progress == 0 ? '0' : $progress / count($courses) * 100 ?>%
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php
                if ($noCourses) {
                    echo '<div class="alert alert-danger mx-auto"><em>Geen Cursussen.</em></div>';
                } else {
                    ?>
                    <?php
                    foreach ($courses as $course) {
                        require 'views/partials/course.partial.php';
                        $courseSize = $courseSize + 1;
                    }
                    ?>
                    <?php
                }
                ?>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" <?= !Auth::isAdmin() && !Auth::isTeacher() ? '' : 'disabled' ?>>

                Stop cursus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-primary">Weet je zeker dat je deze cursus wilt stoppen? Al je progressie
                                verdwijnt dan die je op dit moment hebt gemaakt!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren
                            </button>
                            <form method="post" action="<?= Request::buildUri('/courses/start') ?>">
                                <input type="hidden" name="courseId" value="<?= $category['id'] ?>"/>
                                <input type="hidden" name="stopCourse" value="1"/>
                                <button class="btn btn-primary" type="submit">Stop Cursus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'views/partials/foot.partial.php';
?>